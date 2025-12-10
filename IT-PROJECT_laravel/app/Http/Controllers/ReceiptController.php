<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // or use mPDF if you prefer

class ReceiptController extends Controller
{
    public function generateReceipt()
    {
        $receipt = [
            'or_no' => 'NTC-2025-00123',
            'or_date' => now()->format('F d, Y'),
            'payer_name' => 'Juan Dela Cruz',
            'payer_address' => 'QC, Philippines',
            'permit_type' => 'purchase',
            'radio_service' => 'amateur',
            'payment_method' => 'gcash',
            'collecting_officer' => 'Maria Santos',
            'ntc_region' => 'Region IV',
            'fees' => [
                [
                    'label' => 'Purchase Permit Fee (FB Units)',
                    'qty' => 2,
                    'unit_price' => 50,
                    'amount' => 100
                ],
                [
                    'label' => 'Documentary Stamp Tax (DST)',
                    'qty' => 1,
                    'unit_price' => 30,
                    'amount' => 30
                ],
            ],
            'total' => 130,
        ];

        $pdf = Pdf::loadView('templates.ntc-official-receipt', compact('receipt'));
        return $pdf->stream('ntc-receipt.pdf');
    }

    public function generateCertificate()
    {
        $certificate = [
            'ntc_region' => 'Quezon City',
            'certificate_type' => 'NEW',
            'certificate_no' => 'CAR20 00000',
            'title' => 'Restricted Radiotelephone Operator\'s Certificate',
            'radio_service' => 'LAND MOBILE',

            'name' => 'Juan Dela Cruz',
            'address' => 'Baguio City',

            'dob' => 'Jan 01, 1990',
            'citizenship' => 'Filipino',
            'sex' => 'M',
            'height' => '170',
            'weight' => '65',

            'date_issued' => 'Jan 01, 2025',
            'valid_until' => 'Jan 01, 2030',

            'officer_name' => 'DANTE M. VENGUA pcee, cese',
            'officer_title' => 'Officer In Charge',

            'serial_no' => '715751',
        ];

        $pdf = Pdf::loadView('templates.certificate', compact('certificate'))
            ->setPaper('A5', 'portrait');

        return $pdf->stream('ntc-certificate.pdf');
    }
}
