<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TemplatePreviewController extends Controller
{
    /**
     * Preview certificate template
     */
    public function previewCertificate()
    {
        $certificate = [
            'ntc_region' => 'NTC – CAR (Baguio)',
            'certificate_type' => '1RTG',
            'certificate_no' => 'NTC-2024-001234',
            'title' => 'Radio Operator Certificate',
            'radio_service' => 'Maritime Mobile Service',
            'name' => 'Juan Dela Cruz',
            'address' => '123 Main Street, Quezon City, Philippines',
            'dob' => 'January 15, 1990',
            'citizenship' => 'Filipino',
            'sex' => 'Male',
            'height' => '170',
            'weight' => '70',
            'date_issued' => 'January 15, 2024',
            'valid_until' => 'January 15, 2029',
            'officer_name' => 'John Doe',
            'officer_title' => 'Regional Director',
        ];

        $pdf = Pdf::loadView('templates.certificate', compact('certificate'))
            ->setPaper('A5', 'portrait');

        return $pdf->stream('certificate-preview.pdf');
    }

    /**
     * Preview ntc-permit template
     */
    public function previewNtcPermit()
    {
        $permit = [
            'applicant' => 'Juan Dela Cruz',
            'permit_type_display' => 'Amateur Radio Station License',
            'radio_service' => 'Amateur Radio Service',
            'application_type' => 'New Application',
            'intended_use' => 'Personal Communication',
            'issuance_date' => 'January 15, 2024',
            'units' => [
                'Class A' => 2,
                'Class B' => 1,
            ],
        ];

        $pdf = Pdf::loadView('templates.ntc-permit', compact('permit'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('ntc-permit-preview.pdf');
    }

    /**
     * Preview exam-receipt template
     */
    public function previewExamReceipt()
    {
        $data = [
            'ntc_region' => 'NTC – CAR (Baguio)',
            'or_number' => 'OR-2024-001234',
            'or_date' => 'January 15, 2024',
            'cash_received_from' => 'Juan Dela Cruz',
            'address' => '123 Main Street, Quezon City, Philippines',
            'exam_amount' => 500.00,
            'payment_method' => 'Cash',
            'collecting_officer' => 'Jane Smith',
        ];

        $pdf = Pdf::loadView('templates.exam-receipt', compact('data'));

        return $pdf->stream('exam-receipt-preview.pdf');
    }

    /**
     * Preview or-certificate-receipt template
     */
    public function previewOrCertificateReceipt()
    {
        $data = [
            'ntc_region' => 'NTC – CAR (Baguio)',
            'or_number' => 'OR-2024-001234',
            'or_date' => 'January 15, 2024',
            'cash_received_from' => 'Juan Dela Cruz',
            'address' => '123 Main Street, Quezon City, Philippines',
            'certificate_type' => '1RTG',
            'application_type' => 'New Application',
            'payment_method' => 'Cash',
            'collecting_officer' => 'Jane Smith',
            'items' => [
                ['description' => 'Filing Fee (FF)', 'amount' => 200.00],
                ['description' => 'Application Fee (AF)', 'amount' => 300.00],
                ['description' => 'Seminar Fee (SEM)', 'amount' => 500.00],
            ],
            'total_amount' => 1000.00,
        ];

        $pdf = Pdf::loadView('templates.or-certificate-receipt', compact('data'));

        return $pdf->stream('or-certificate-receipt-preview.pdf');
    }

    /**
     * Preview permit-receipt template
     */
    public function previewPermitReceipt()
    {
        $data = [
            'ntc_region' => 'Central Office',
            'or_number' => 'OR-2024-001234',
            'or_date' => 'January 15, 2024',
            'cash_received_from' => 'Juan Dela Cruz',
            'address' => '123 Main Street, Quezon City, Philippines',
            'transaction_type' => 'Permit',
            'permit_type' => 'at-rsl',
            'payment_method' => 'Cash',
            'collecting_officer' => 'Jane Smith',
            'items' => [
                [
                    'description' => 'Permit Fee',
                    'qty' => 1,
                    'unit_price' => 200.00,
                    'amount' => 200.00,
                ],
                [
                    'description' => 'Documentary Stamp Tax (DST)',
                    'qty' => 1,
                    'unit_price' => 30.00,
                    'amount' => 30.00,
                ],
            ],
            'total_amount' => 230.00,
        ];

        $pdf = Pdf::loadView('templates.permit-receipt', compact('data'));

        return $pdf->stream('permit-receipt-preview.pdf');
    }

    /**
     * Preview all templates index page
     */
    public function index()
    {
        return view('templates.preview-index');
    }
}

