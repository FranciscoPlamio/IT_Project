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
    }
}
