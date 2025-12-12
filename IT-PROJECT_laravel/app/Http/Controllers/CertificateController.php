<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // or use mPDF if you prefer

class CertificateController extends Controller
{
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
        return view('templates.certificate', compact('certificate'));
        $pdf = Pdf::loadView('templates.certificate', compact('certificate'))
            ->setPaper('A5', 'portrait');

        return $pdf->stream('ntc-certificate.pdf');
    }
}
