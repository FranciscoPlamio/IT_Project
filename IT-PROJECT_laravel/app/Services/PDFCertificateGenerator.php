<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;

class PDFCertificateGenerator
{
    private $certificateTemplatePath;

    public function __construct()
    {
        $this->certificateTemplatePath = storage_path('app/private/Cert/Sample_Cert.pdf');
    }

    /**
     * Generate certificate PDF with form data
     */
    public function generateCertificate($formData, $formType)
    {
        try {
            // Check if template exists
            if (!file_exists($this->certificateTemplatePath)) {
                throw new Exception("Certificate template not found at: {$this->certificateTemplatePath}");
            }

            // Get coordinate map for certificate fields
            $coordinates = PDFCoordinateMaps::getCertificateCoordinates($formType);

            // Get certificate page size
            $pageSize = PDFCoordinateMaps::getCertificatePageSize();

            // Create FPDI instance with certificate page size
            $pdf = new Fpdi();
            $pdf->setSourceFile($this->certificateTemplatePath);

            // Add page with landscape orientation and certificate dimensions
            // Page size: 11.69 × 8.28 in (landscape), Page count: 1
            $pdf->AddPage($pageSize['orientation'], [$pageSize['width'], $pageSize['height']]);
            $pdf->useTemplate($pdf->importPage(1));

            // Set font
            $pdf->SetFont('Times', 'B', 50);

            // Fill certificate fields
            $this->fillCertificateFields($pdf, $formData, $coordinates);

            return $pdf;
        } catch (Exception $e) {
            throw new Exception("Certificate generation failed: " . $e->getMessage());
        }
    }

    /**
     * Fill certificate fields with data
     */
    private function fillCertificateFields($pdf, $formData, $coordinates)
    {
        // Get page width for centering
        $pageSize = PDFCoordinateMaps::getCertificatePageSize();
        $pageWidth = $pageSize['width'];

        // Write lastname (centered)
        if (!empty($formData['last_name']) && !empty($coordinates['last_name'])) {
            $pdf->SetXY(0, $coordinates['last_name'][1]);
            $pdf->Cell($pageWidth, 10, strtoupper($formData['last_name']), 0, 0, 'C');
        }

        // Write firstname (centered)
        if (!empty($formData['first_name']) && !empty($coordinates['first_name'])) {
            $pdf->SetXY(0, $coordinates['first_name'][1]);
            $pdf->Cell($pageWidth, 10, strtoupper($formData['first_name']), 0, 0, 'C');
        }

        // Write middle name if available (centered)
        if (!empty($formData['middle_name']) && !empty($coordinates['middle_name'])) {
            $pdf->SetXY(0, $coordinates['middle_name'][1]);
            $pdf->Cell($pageWidth, 10, strtoupper($formData['middle_name']), 0, 0, 'C');
        }

        // Write certificate type if available (centered)
        if (!empty($formData['certificate_type']) && !empty($coordinates['certificate_type'])) {
            $certificateTypeFormatted = $this->formatCertificateType($formData['certificate_type']);
            $pdf->SetXY(0, $coordinates['certificate_type'][1]);
            $pdf->Cell($pageWidth, 10, strtoupper($certificateTypeFormatted), 0, 0, 'C');
        }

        // Calculate and write issuance date (current date)
        if (!empty($coordinates['issuance_date'])) {
            $pdf->SetFont('Times', 'B', 25); // Change font size for dates (default was 50)
            $issuanceDate = date('F j, Y'); // e.g., "December 8, 2025"
            $pdf->SetXY($coordinates['issuance_date'][0], $coordinates['issuance_date'][1]);
            $pdf->Cell(0, 10, strtoupper($issuanceDate), 0, 0, 'L');

            // Add label below the date
            $pdf->SetFont('Times', 'I', 12); // Smaller font for label
            $pdf->SetXY($coordinates['issuance_date'][0], $coordinates['issuance_date'][1] + 8);
            $pdf->Cell(0, 10, 'DATE ISSUED', 0, 0, 'L');
        }

        // Calculate and write expiry date (issuance date + years)
        if (!empty($coordinates['expiry_date'])) {
            $pdf->SetFont('Times', 'B', 25); // Same font size as issuance date
            $years = isset($formData['years']) ? (int)$formData['years'] : 0;
            $expiryDate = date('F j, Y', strtotime("+{$years} years")); // e.g., "December 8, 2027"
            $pdf->SetXY($coordinates['expiry_date'][0], $coordinates['expiry_date'][1]);
            $pdf->Cell(0, 10, strtoupper($expiryDate), 0, 0, 'L');

            // Add label below the date
            $pdf->SetFont('Times', 'I', 12); // Smaller font for label
            $pdf->SetXY($coordinates['expiry_date'][0], $coordinates['expiry_date'][1] + 8);
            $pdf->Cell(0, 10, 'EXPIRY DATE', 0, 0, 'L');
        }
    }

    /**
     * Format certificate type for display
     */
    private function formatCertificateType($type)
    {
        $types = [
            '1rtg_e1256_code25' => '1RTG',
            '1rtg_code25' => '1RTG',
            '2rtg_e1256_code16' => '2RTG',
            '2rtg_code16' => '2RTG',
            '3rtg_e125_code16' => '3RTG',
            '3rtg_code16' => '3RTG',
            '1phn_e1234' => '1PHN',
            '2phn_e123' => '2PHN',
            '3phn_e12' => '3PHN',
        ];

        return $types[$type] ?? strtoupper(str_replace('_', ' ', $type));
    }
}
