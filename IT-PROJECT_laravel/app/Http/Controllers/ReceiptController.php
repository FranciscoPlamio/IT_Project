<?php

namespace App\Http\Controllers;

use App\Models\Forms\FormsTransactions;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // or use mPDF if you prefer
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ReceiptController extends Controller
{

    // public function generatePermitReceipt($form)
    // {
    //     $receipt = [
    //         'or_number' => $form->or->or_no ?? 'NTC-' . now()->format('Y') . '-P001',
    //         'or_date' => isset($form->or->or_date)
    //             ? Carbon::parse($form->or->or_date)->format('F d, Y')
    //             : now()->format('F d, Y'),
    //         'cash_received_from' => $form->payer_name ?? 'Juan Dela Cruz',
    //         'address' => $form->payer_address ?? 'QC, Philippines',
    //         'transaction_type' => 'permit',
    //         'form_type' => $form->form_type ?? null,
    //         'payment_method' => strtoupper($form->payment_method ?? 'Cash'),
    //         'collecting_officer' => $form->or->collecting_officer ?? 'N/A',
    //         'ntc_region' => $form->ntc_region ?? 'Central Office',
    //         'items' => [],
    //         'total_amount' => 0,
    //         'remarks' => $form->remarks ?? null,
    //     ];

    //     // Example permit fees
    //     $items = [
    //         ['description' => 'Permit Fee', 'amount' => 200],
    //         ['description' => 'Documentary Stamp Tax (DST)', 'amount' => 30],
    //     ];

    //     $receipt['items'] = $items;
    //     $receipt['total_amount'] = array_sum(array_map(fn($i) => $i['amount'], $items));

    //     $pdf = Pdf::loadView('templates.ntc-official-receipt', ['data' => $receipt]);
    //     return $pdf->stream('permit-receipt.pdf');
    // }

    public function generateExamReceipt($form, $transaction)

    {
        // Get the exam payment amount from DB
        $examAmount = $transaction->payment_amount ?? 0; // fallback to 0 if null

        // Construct address string
        $addressParts = [
            $form->unit ?? '',
            $form->street ?? '',
            $form->barangay ?? '',
            $form->city ?? '',
            $form->province ?? ''
        ];
        $address = implode(', ', array_filter($addressParts));
        $middleInitial = isset($form->middle_name) && !empty($form->middle_name)
            ? strtoupper(substr($form->middle_name, 0, 1)) . '.'
            : '';
        // Simplified receipt for exam
        $receipt = [
            'or_number' => $form->or['or_no'] ?? 'NTC-' . now()->format('Y') . '-E001',
            'or_date' => isset($form->or['or_date'])
                ? \Carbon\Carbon::parse($form->or['or_date'])->format('F d, Y')
                : now()->format('F d, Y'),
            'cash_received_from' => trim(
                ($form->first_name ?? '') . ' ' .
                    (isset($form->middle_name) && !empty($form->middle_name)
                        ? strtoupper(substr($form->middle_name, 0, 1)) . '.'
                        : '') . ' ' .
                    ($form->last_name ?? '')
            ),
            'address' => $address ?: 'QC, Philippines',
            'transaction_type' => 'exam',
            'form_type' => $form->form_type ?? '1-01',
            'payment_method' => strtoupper($transaction->payment_method ?? 'Cash'),
            'collecting_officer' => $form->or['collecting_officer'] ?? 'N/A',
            'ntc_region' => $form->ntc_region ?? 'NTC – CAR (Baguio)',
            'exam_amount' => $examAmount, // only this is needed
            'remarks' => $form->remarks ?? null,
        ];

        $pdf = Pdf::loadView('templates.exam-receipt', ['data' => $receipt]);
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
    public function generateCertificateReceipt($form, $transaction)
    {
        $items = [];
        $perYearRoc = 0;
        $years = $form->years ?? 1;

        /**
         * ============================================================
         * FEE TABLE (Matches Blade Fee Component)
         * ============================================================
         */
        $feeTable = [
            // --- FORM 1-03 ---
            'atroc' => ['ff' => 0, 'cpf' => 0, 'lf' => 60, 'roc' => 30, 'dst' => 30],
            'at-lifetime' => ['ff' => 60, 'cpf' => 0, 'lf' => 50, 'roc' => 0, 'dst' => 30],
            'at-club-rsl-simplex' => ['ff' => 180, 'cpf' => 600, 'lf' => 700, 'roc' => 0, 'dst' => 30],
            'at-club-rsl-repeater' => ['ff' => 180, 'cpf' => 600, 'lf' => 1320, 'roc' => 0, 'dst' => 30],
            'atrsl-class_A' => ['ff' => 60, 'cpf' => 0, 'lf' => 120, 'roc' => 60, 'dst' => 30],
            'atrsl-class_B' => ['ff' => 60, 'cpf' => 0, 'lf' => 132, 'roc' => 60, 'dst' => 30],
            'atrsl-class_C' => ['ff' => 60, 'cpf' => 0, 'lf' => 144, 'roc' => 60, 'dst' => 30],
            'atrsl-class_D' => ['ff' => 60, 'cpf' => 0, 'lf' => 144, 'roc' => 60, 'dst' => 30],
            'temp-a' => ['ff' => 60, 'cpf' => 0, 'lf' => 120, 'roc' => 60, 'dst' => 30],
            'temp-b' => ['ff' => 60, 'cpf' => 0, 'lf' => 132, 'roc' => 60, 'dst' => 30],
            'temp-c' => ['ff' => 60, 'cpf' => 0, 'lf' => 144, 'roc' => 60, 'dst' => 30],
            'special-event-call' => ['sp' => 120, 'dst' => 30],
            'vanity-call' => ['sp' => 1000, 'dst' => 30],

            // --- FORM 1-02 (Radio Operator Certificates) ---
            '1rtg' => ['ff' => 0, 'af' => 0, 'sem' => 0, 'roc' => 180, 'dst' => 30],
            '2rtg' => ['ff' => 0, 'af' => 0, 'sem' => 0, 'roc' => 120, 'dst' => 30],
            '3rtg' => ['ff' => 0, 'af' => 0, 'sem' => 0, 'roc' => 60, 'dst' => 30],
            '1phn' => ['ff' => 0, 'af' => 0, 'sem' => 0, 'roc' => 120, 'dst' => 30],
            '2phn' => ['ff' => 0, 'af' => 0, 'sem' => 0, 'roc' => 100, 'dst' => 30],
            '3phn' => ['ff' => 0, 'af' => 0, 'sem' => 0, 'roc' => 60, 'dst' => 30],
            'tp rroc-aircraft' => ['ff' => 0, 'af' => 0, 'sem' => 0, 'roc' => 100, 'dst' => 30],
            'srop' => ['ff' => 0, 'af' => 20, 'sem' => 60, 'roc' => 60, 'dst' => 30],
            'groc' => ['ff' => 10, 'af' => 20, 'sem' => 60, 'roc' => 60, 'dst' => 30],
            'rroc-rlm' => ['ff' => 10, 'af' => 20, 'sem' => 60, 'roc' => 60, 'dst' => 30],
        ];

        // --- Map certificate codes to readable names ---
        $certificateNames = [
            // FORM 1-02
            '1RTG' => 'First-class Radiotelegraph Operator Certificate',
            '2RTG' => 'Second-class Radiotelegraph Operator Certificate',
            '3RTG' => 'Third-class Radiotelegraph Operator Certificate',
            '1PHN' => 'First-class Radiotelephone Operator Certificate',
            '2PHN' => 'Second-class Radiotelephone Operator Certificate',
            '3PHN' => 'Third-class Radiotelephone Operator Certificate',
            'SROP' => 'Ship Radiotelegraph Operator Certificate',
            'GROC' => 'General Radiotelegraph Operator Certificate',
            'RROC-AIRCRAFT' => 'Restricted Radiotelegraph Operator Certificate – Aircraft',
            'RROC-RLM' => 'Restricted Radiotelegraph Operator Certificate – Land Mobile',

            // FORM 1-03
            'ATROC' => 'Amateur Radio Operator Certificate',
            'AT-LIFETIME' => 'Amateur Radio Operator Certificate – Lifetime',
            'AT-CLUB-RSL' => 'Amateur Club Radio Station License',
            'TEMP-A' => 'Temporary Amateur Radio Station Permit – Type A',
            'TEMP-B' => 'Temporary Amateur Radio Station Permit – Type B',
            'TEMP-C' => 'Temporary Amateur Radio Station Permit – Type C',
            'SPECIAL-EVENT-CALL' => 'Special Event Call Sign',
            'VANITY-CALL' => 'Vanity Call Sign',
        ];

        $rawCertificate = strtoupper($form->certificate_type ?? $form->category ?? 'UNKNOWN');
        $certificate = $certificateNames[$rawCertificate] ?? ucwords(str_replace(['-', '_'], ' ', $rawCertificate));

        // --- Determine Fee Key ---
        $key = strtolower($form->category ?? $rawCertificate);

        // Special handling for ATRSL classes
        if (Str::contains($rawCertificate, 'ATRSL')) {
            $stationClass = strtoupper(substr(strtolower($form->station_class ?? 'class_a'), strpos($form->station_class ?? '', '_') + 1));
            $key = 'atrsl-class_' . $stationClass;
        }

        // TEMPORARY-FOREIGN handling
        if ($rawCertificate === 'TEMPORARY-FOREIGN') {
            $stationClass = strtoupper(substr(strtolower($form->station_class ?? 'class_a'), strpos($form->station_class ?? '', '_') + 1));
            $key = 'temp-' . strtolower($stationClass);
        }

        $fees = $feeTable[$key] ?? ['ff' => 0, 'cpf' => 0, 'lf' => 0, 'roc' => 0, 'dst' => 0];

        // --- Add Fees to Items ---
        if (isset($fees['ff']) && $fees['ff'] > 0) $items[] = ['description' => 'Filing Fee (FF)', 'unit_price' => $fees['ff'], 'amount' => $fees['ff']];
        if (isset($fees['cpf']) && $fees['cpf'] > 0) $items[] = ['description' => 'Construction Permit Fee (CPF)', 'unit_price' => $fees['cpf'], 'amount' => $fees['cpf']];
        if (isset($fees['lf']) && $fees['lf'] > 0) {
            $amount = $fees['lf'] * $years;
            $items[] = ['description' => "License Fee (LF × $years years)", 'unit_price' => $fees['lf'], 'amount' => $amount];
        }
        if (isset($fees['roc']) && $fees['roc'] > 0) {
            $amount = $fees['roc'] * $years;
            $perYearRoc = $fees['roc'];
            $items[] = ['description' => "Certificate Fee (ROC × $years years)", 'unit_price' => $fees['roc'], 'amount' => $amount];
        }
        if (isset($fees['sp']) && $fees['sp'] > 0) $items[] = ['description' => 'Special Permit Fee (SP)', 'unit_price' => $fees['sp'], 'amount' => $fees['sp']];
        if (isset($fees['dst']) && $fees['dst'] > 0) $items[] = ['description' => 'Documentary Stamp Tax (DST)', 'unit_price' => $fees['dst'], 'amount' => $fees['dst']];

        // --- Total ---
        $totalAmount = array_sum(array_map(fn($i) => $i['amount'], $items));

        // --- Build Address ---
        $address = implode(', ', array_filter([$form->unit, $form->street, $form->barangay, $form->city, $form->province]));

        // --- Receipt Payload ---
        $receipt = [
            'or_number' => $form->or['or_no'] ?? 'NTC-' . now()->format('Y') . '-C001',
            'or_date' => isset($form->or['or_date']) ? Carbon::parse($form->or['or_date'])->format('F d, Y') : now()->format('F d, Y'),
            'cash_received_from' => trim(
                ($form->first_name ?? '') . ' ' .
                    (!empty($form->middle_name) ? strtoupper(substr($form->middle_name, 0, 1)) . '. ' : '') .
                    ($form->last_name ?? '')
            ),
            'address' => $address ?: 'QC, Philippines',
            'certificate_type' => $certificate,
            'transaction_type' => $form->application_type,
            'payment_method' => strtoupper($transaction->payment_method ?? 'CASH'),
            'collecting_officer' => $form->or['collecting_officer'] ?? 'N/A',
            'ntc_region' => $form->ntc_region ?? 'NTC – CAR (Baguio)',
            'items' => $items,
            'total_amount' => $totalAmount,
            'per_year_roc' => $perYearRoc,
            'years' => $years,
            'application_type' => $form->application_type,
            'station_class' => $form->station_class ?? '',
        ];


        // --- Generate PDF ---
        $pdf = Pdf::loadView('templates.or-certificate-receipt', ['data' => $receipt]);
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


    public function generatePermitReceipt($form, $transaction)
    {
        // Collect all units from the form
        $units = [
            'RT (Radio Telephone)' => $form['rt_units'] ?? 0,
            'FX (Fixed)' => $form['fx_units'] ?? 0,
            'FB (Land Base)' => $form['fb_units'] ?? 0,
            'ML (Mobile Land)' => $form['ml_units'] ?? 0,
            'P (Portable/Handheld)' => $form['p_units'] ?? 0,
        ];

        // Only include units with value > 0
        $filteredUnits = array_filter($units, fn($count) => $count > 0);
        $totalUnits = array_sum($filteredUnits);

        // Determine per-unit fee based on intended use
        $intendedUse = $form['intended_use'] ?? 'new_radio_station';
        $feeTable = [
            'purchase' => 50,
            'possess' => 50,
            'sell_transfer' => 50,
            'dst' => 30,
        ];

        if (in_array($intendedUse, ['new_radio_station', 'change_equipment', 'additional_equipment'])) {
            $perUnitFee = $feeTable['purchase'];
            $label = 'Purchase Permit Fee';
        } elseif ($intendedUse === 'storage') {
            $perUnitFee = $feeTable['possess'];
            $label = 'Possess Permit Fee';
        } elseif ($intendedUse === 'sell_transfer') {
            $perUnitFee = $feeTable['sell_transfer'];
            $label = 'Sell/Transfer Permit Fee';
        } else {
            $perUnitFee = 0;
            $label = 'Permit Fee';
        }

        // Prepare items array: **each unit type individually**
        $items = [];
        foreach ($filteredUnits as $unitName => $qty) {
            $amount = $perUnitFee * $qty;
            $items[] = [
                'description' => $unitName . " Permit Fee",
                'qty' => $qty,
                'unit_price' => $perUnitFee,
                'amount' => $amount,
            ];
        }

        // Add DST as a separate line
        $dst = $feeTable['dst'];
        $items[] = [
            'description' => 'Documentary Stamp Tax (DST)',
            'qty' => 1,
            'unit_price' => $dst,
            'amount' => $dst,
        ];

        // Calculate total
        $totalAmount = array_sum(array_column($items, 'amount'));

        // Build address
        $address = implode(', ', array_filter([$form->unit, $form->street, $form->barangay, $form->city, $form->province]));

        // Prepare data for Blade template
        $data = [
            'ntc_region' => 'NTC – CAR (Baguio)',
            'or_number' => $form->or['or_no'] ?? 'NTC-' . now()->format('Y') . '-C001',
            'or_date' => isset($form->or['or_date']) ? Carbon::parse($form->or['or_date'])->format('F d, Y') : now()->format('F d, Y'),
            'cash_received_from' => trim(
                ($form->first_name ?? '') . ' ' .
                    (!empty($form->middle_name) ? strtoupper(substr($form->middle_name, 0, 1)) . '. ' : '') .
                    ($form->last_name ?? '')
            ),
            'address' => $address ?? 'N/A',
            'transaction_type' => 'Permit',
            'form_type' => ucfirst(str_replace('_', ' ', $intendedUse)),
            'items' => $items,
            'total_amount' => $totalAmount,
            'payment_method' => $transaction->payment_method ?? 'Cash',
            'collecting_officer' => $form->or['collecting_officer'] ?? 'N/A',
            'remarks' => $transaction->remarks ?? null,
            'permit_type' => $form->permit_type ?? null
        ];

        // Generate PDF using Blade
        $pdf = Pdf::loadView('templates.permit-receipt', ['data' => $data]);
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
