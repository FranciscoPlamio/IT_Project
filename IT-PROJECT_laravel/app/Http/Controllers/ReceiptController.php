<?php

namespace App\Http\Controllers;

use App\Models\Forms\FormsTransactions;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // or use mPDF if you prefer
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ReceiptController extends Controller
{

    public function generatePermitReceipt($form)
    {
        $receipt = [
            'or_number' => $form->or->or_no ?? 'NTC-' . now()->format('Y') . '-P001',
            'or_date' => isset($form->or->or_date)
                ? Carbon::parse($form->or->or_date)->format('F d, Y')
                : now()->format('F d, Y'),
            'cash_received_from' => $form->payer_name ?? 'Juan Dela Cruz',
            'address' => $form->payer_address ?? 'QC, Philippines',
            'transaction_type' => 'permit',
            'form_type' => $form->form_type ?? null,
            'payment_method' => strtoupper($form->payment_method ?? 'Cash'),
            'collecting_officer' => $form->or->collecting_officer ?? 'N/A',
            'ntc_region' => $form->ntc_region ?? 'Central Office',
            'items' => [],
            'total_amount' => 0,
            'remarks' => $form->remarks ?? null,
        ];

        // Example permit fees
        $items = [
            ['description' => 'Permit Fee', 'amount' => 200],
            ['description' => 'Documentary Stamp Tax (DST)', 'amount' => 30],
        ];

        $receipt['items'] = $items;
        $receipt['total_amount'] = array_sum(array_map(fn($i) => $i['amount'], $items));

        $pdf = Pdf::loadView('templates.ntc-official-receipt', ['data' => $receipt]);
        return $pdf->stream('permit-receipt.pdf');
    }

    public function generateExamReceipt($form)
    {
        $receipt = [
            'or_number' => $form->or->or_no ?? 'NTC-' . now()->format('Y') . '-E001',
            'or_date' => isset($form->or->or_date)
                ? Carbon::parse($form->or->or_date)->format('F d, Y')
                : now()->format('F d, Y'),
            'cash_received_from' => $form->payer_name ?? 'Juan Dela Cruz',
            'address' => $form->payer_address ?? 'QC, Philippines',
            'transaction_type' => 'exam',
            'form_type' => $form->form_type ?? null,
            'payment_method' => strtoupper($form->payment_method ?? 'Cash'),
            'collecting_officer' => $form->or->collecting_officer ?? 'N/A',
            'ntc_region' => $form->ntc_region ?? 'Central Office',
            'items' => [],
            'total_amount' => 0,
        ];

        $items = [
            ['description' => 'Exam Fee', 'amount' => 150],
            ['description' => 'Documentary Stamp Tax (DST)', 'amount' => 30],
        ];

        $receipt['items'] = $items;
        $receipt['total_amount'] = array_sum(array_map(fn($i) => $i['amount'], $items));

        $pdf = Pdf::loadView('templates.ntc-official-receipt', ['data' => $receipt]);
        return $pdf->stream('exam-receipt.pdf');
    }
    public function generateCertificateReceipt($form, $transaction)
    {
        $items = [];
        $perYearRoc = 0;
        // Fee table (same as in Blade)
        $feeTable = [
            '1RTG' => ['ff' => 0, 'af' => 0, 'sem' => 0, 'roc' => 180, 'dst' => 30],
            '2RTG' => ['ff' => 0, 'af' => 0, 'sem' => 0, 'roc' => 120, 'dst' => 30],
            '3RTG' => ['ff' => 0, 'af' => 0, 'sem' => 0, 'roc' => 60,  'dst' => 30],
            '1PHN' => ['ff' => 0, 'af' => 0, 'sem' => 0, 'roc' => 120, 'dst' => 30],
            '2PHN' => ['ff' => 0, 'af' => 0, 'sem' => 0, 'roc' => 100, 'dst' => 30],
            '3PHN' => ['ff' => 0, 'af' => 0, 'sem' => 0, 'roc' => 60,  'dst' => 30],
            'TP RROC-AIRCRAFT' => ['ff' => 0, 'af' => 0, 'sem' => 0, 'roc' => 100, 'dst' => 30],
            'SROP' => ['ff' => 0, 'af' => 20, 'sem' => 60, 'roc' => 60,  'dst' => 30],
            'GROC' => ['ff' => 10, 'af' => 20, 'sem' => 60, 'roc' => 60,  'dst' => 30],
            'RROC-RLM' => ['ff' => 10, 'af' => 20, 'sem' => 60, 'roc' => 60,  'dst' => 30],
        ];
        // Handle certificate fees
        if ($form->application_type === 'modification') {
            $items[] = [
                'description' => 'Modification Fee (MOD)',
                'unit_price' => 120,
                'amount' => 120
            ];
            $items[] = [
                'description' => 'Documentary Stamp Tax (DST)',
                'unit_price' => 30,
                'amount' => 30
            ];
        } else {
            $certificate = strtoupper($form->certificate_type) ?? 'UNKNOWN';

            $years = $form->years ?? 1;
            $fees = $feeTable[$certificate] ?? ['ff' => 0, 'af' => 0, 'sem' => 0, 'roc' => 0, 'dst' => 0];

            $perYearRoc = $fees['roc'];

            // ROC × Years
            $items[] = [
                'description' => "Certificate Fee (ROC × $years years) [$certificate]",
                'unit_price' => $fees['roc'] * $years,
                'amount' => $fees['roc'] * $years
            ];

            // Optional fees
            foreach (['ff', 'af', 'sem'] as $feeKey) {
                if ($fees[$feeKey] > 0) {
                    $items[] = [
                        'description' => strtoupper($feeKey) . ' Fee',
                        'unit_price' => $fees[$feeKey],
                        'amount' => $fees[$feeKey]
                    ];
                }
            }

            // DST
            $items[] = [
                'description' => 'Documentary Stamp Tax (DST)',
                'unit_price' => $fees['dst'],
                'amount' => $fees['dst']
            ];
        }

        $totalAmount = array_sum(array_map(fn($i) => $i['amount'], $items));

        // Construct address string
        $addressParts = [
            $form->unit ?? '',
            $form->street ?? '',
            $form->barangay ?? '',
            $form->city ?? '',
            $form->province ?? ''
        ];
        $address = implode(', ', array_filter($addressParts));

        $receipt = [
            'or_number' => $form->or['or_no'] ?? 'NTC-' . now()->format('Y') . '-C001',
            'or_date' => isset($form->or['or_date']) ? \Carbon\Carbon::parse($form->or['or_date'])->format('F d, Y') : now()->format('F d, Y'),
            'cash_received_from' => trim($form->last_name . ', ' . $form->first_name),
            'address' => $address ?: 'QC, Philippines',
            'certificate_type' => $form->certificate_type ?? $form->application_type ?? 'Certificate',
            'transaction_type' => $form->application_type ?? 'certificate',
            'payment_method' => strtoupper($transaction->payment_method ?? 'Cash'),
            'collecting_officer' => $form->or['collecting_officer'] ?? 'N/A',
            'ntc_region' => $form->ntc_region ?? 'NTC – CAR (Baguio)',
            'items' => $items,
            'total_amount' => $totalAmount,
            'remarks' => $form->remarks ?? null,
            'per_year_roc' => $perYearRoc,
            'years' => $years,
            'application_type' => $form->application_type,
        ];

        $pdf = Pdf::loadView('templates.or-certificate-receipt', ['data' => $receipt]);
        // // For testing: stream the PDF in browser
        // return $pdf->stream('official_receipt.pdf');

        // Define path
        $folderPath = "forms/{$form->form_token}";
        $fileName = 'official_receipt_' . time()  . '.pdf';
        $fullPath = $folderPath . '/' . $fileName;

        // Make folder using Storage facade
        if (!Storage::exists($folderPath)) {
            Storage::makeDirectory($folderPath);
        }

        // Save PDF to storage/app/private/forms/{formToken}/...
        Storage::put($fullPath, $pdf->output());

        // Return path (optional) if you want to redirect
        return $fullPath;
    }


    public function generateReceipt()
    {
        $receipt = [
            'or_number' => 'NTC-2025-00123',
            'or_date' => now()->format('F d, Y'),
            'cash_received_from' => 'Juan Dela Cruz',
            'address' => 'QC, Philippines',
            'transaction_type' => 'permit',  // optional
            'form_type' => '1-03',           // optional
            'payment_method' => 'GCash',
            'collecting_officer' => 'Maria Santos',
            'ntc_region' => 'Region IV',
            'items' => [
                [
                    'description' => 'Purchase Permit Fee (FB Units)',
                    'qty' => 2,
                    'unit_price' => 50,
                    'amount' => 100
                ],
                [
                    'description' => 'Documentary Stamp Tax (DST)',
                    'qty' => 1,
                    'unit_price' => 30,
                    'amount' => 30
                ],
            ],
            // Calculate total dynamically
            'total_amount' => 0,
            'remarks' => 'Payment for FB units'  // optional
        ];

        // Calculate total_amount automatically
        $receipt['total_amount'] = array_sum(array_map(fn($item) => $item['amount'], $receipt['items']));

        // Pass as $data to match the Blade template
        $pdf = Pdf::loadView('templates.ntc-official-receipt', ['data' => $receipt]);
        return $pdf->stream('ntc-receipt.pdf');
    }


    public function generateReceiptFromDB(Request $request)
    {
        // 1. Validate request inputs
        $request->validate([
            'transaction_id' => 'required|integer',
        ]);

        // 2. Fetch from database
        $transaction = FormsTransactions::find($request->transaction_id);

        if (!$transaction) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        // 3. Build the array for the Blade file
        $receipt = [
            'or_no'             => $transaction->or_no,
            'or_date'           => $transaction->or_date,
            'payer_name'        => $transaction->payer_name,
            'payer_address'     => $transaction->payer_address,
            'permit_type'       => $transaction->permit_type,
            'radio_service'     => $transaction->radio_service,
            'payment_method'    => $transaction->payment_method,
            'collecting_officer' => $transaction->collecting_officer,
            'ntc_region'        => $transaction->ntc_region,
            'fees'              => $transaction->fees,   // JSON column
            'total'             => $transaction->total,
        ];

        // 4. Generate PDF
        $pdf = Pdf::loadView('templates.ntc-official-receipt', compact('receipt'));

        // 5. Return PDF in Postman
        return $pdf->stream('ntc-receipt.pdf', [
            'Content-Type' => 'application/pdf'
        ]);
    }
}
