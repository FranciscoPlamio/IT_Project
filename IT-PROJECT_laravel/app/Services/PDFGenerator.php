<?php

namespace App\Services;

use FPDF;
use setasign\Fpdi\Fpdi;
use Exception;

class PDFGenerator
{
    private $templatesPath;
    private $coordinateMaps;

    public function __construct()
    {
        $this->templatesPath = public_path('forms/');
        $this->coordinateMaps = $this->getCoordinateMaps();
    }

    /**
     * Generate PDF with form data
     */
    public function generatePDF($formData, $formType)
    {
        try {
            // Get template filename based on form type
            $templateFile = $this->getTemplateFile($formType);
            if (!$templateFile) {
                throw new Exception("Template not found for form type: {$formType}");
            }

            // Get coordinate map for this form type
            $coordinates = $this->coordinateMaps[$formType] ?? [];
            if (empty($coordinates)) {
                throw new Exception("Coordinate map not found for form type: {$formType}");
            }

            // Create FPDI instance
            $pdf = new Fpdi();
            $pdf->setSourceFile($this->templatesPath . $templateFile);
            $pdf->AddPage();
            $pdf->useTemplate($pdf->importPage(1));

            // Set font
            $pdf->SetFont('Arial', '', 10);

            // Fill form fields
            $this->fillFormFields($pdf, $formData, $coordinates);

            return $pdf;
        } catch (Exception $e) {
            throw new Exception("PDF generation failed: " . $e->getMessage());
        }
    }

    /**
     * Generate PDF using form token to retrieve data from session
     */
    public function generatePDFFromToken($formType, $formToken)
    {
        try {
            // Retrieve form data from session using token
            $formData = session('form_' . $formType . '_' . $formToken);
            if (!$formData) {
                throw new Exception("Form data not found for token: {$formToken}");
            }

            // Generate PDF with retrieved data
            return $this->generatePDF($formData, $formType);
        } catch (Exception $e) {
            throw new Exception("PDF generation from token failed: " . $e->getMessage());
        }
    }

    /**
     * Fill form fields with data
     */
    private function fillFormFields($pdf, $formData, $coordinates)
    {
        foreach ($coordinates as $fieldName => $coords) {
            if (isset($formData[$fieldName]) && !empty($formData[$fieldName])) {
                $value = $this->formatFieldValue($formData[$fieldName], $fieldName);

                // Set position and write text
                $pdf->SetXY($coords[0], $coords[1]);
                $pdf->Write(0, $value);
            }
        }
    }

    /**
     * Format field value based on field type
     */
    private function formatFieldValue($value, $fieldName)
    {
        // Format specific fields
        switch ($fieldName) {
            case 'date_of_birth':
            case 'date_accomplished':
            case 'or_date':
            case 'admission_date':
                return date('m/d/Y', strtotime($value));

            case 'exam_type':
                return $this->formatExamType($value);

            case 'needs':
                return $value == '1' ? 'Yes' : 'No';

            default:
                return strtoupper($value);
        }
    }

    /**
     * Format exam type for display
     */
    private function formatExamType($examType)
    {
        $examTypes = [
            '1rtg_e1256_code25' => '1RTG - Elements 1, 2, 5, 6 & Code (25/20 wpm)',
            '1rtg_code25' => '1RTG - Code (25/20 wpm)',
            '2rtg_e1256_code16' => '2RTG - Elements 1, 2, 5, 6 & Code (16 wpm)',
            '2rtg_code16' => '2RTG - Code (16wpm)',
            '3rtg_e125_code16' => '3RTG - Elements 1, 2, 5 & Code (16 wpm)',
            '3rtg_code16' => '3RTG - Code (16wpm)',
            'class_a_e8910_code5' => 'Class A - Elements 8, 9, 10 & Code (5 wpm)',
            'class_a_code5_only' => 'Class A - Code (5 wpm) Only',
            'class_b_e567' => 'Class B - Elements 5, 6 & 7',
            'class_b_e2' => 'Class B - Element 2',
            'class_c_e234' => 'Class C - Elements 2, 3 & 4',
            'class_d_e2' => 'Class D - Element 2',
            '1phn_e1234' => '1PHN - Elements 1, 2, 3 & 4',
            '2phn_e123' => '2PHN - Elements 1, 2 & 3',
            '3phn_e12' => '3PHN - Elements 1 & 2',
            'rroc_aircraft_e1' => 'RROC - Aircraft - Element 1',
        ];

        return $examTypes[$examType] ?? $examType;
    }

    /**
     * Get template filename based on form type
     */
    private function getTemplateFile($formType)
    {
        $templateMap = [
            '1-01' => 'Form-No.-NTC-1-01.pdf',
            '1-02' => 'Form-No.-NTC-1-02.pdf',
            '1-03' => 'Form-No.-NTC-1-03.pdf',
            '1-09' => 'Form-No.-NTC-1-09.pdf',
            '1-11' => 'Form-No.-NTC-1-11.pdf',
            '1-13' => 'Form-No.-NTC-1-13.pdf',
            '1-14' => 'Form-No.-NTC-1-14.pdf',
            '1-16' => 'Form-No.-NTC-1-16.pdf',
            '1-18' => 'Form-No.-NTC-1-18.pdf',
            '1-19' => 'Form-No.-NTC-1-19.pdf',
            '1-20' => 'Form-No.-NTC-1-20.pdf',
            '1-21' => 'Form-No.-NTC-1-21.pdf',
            '1-22' => 'Form-No.-NTC-1-22.pdf',
            '1-24' => 'Form-No.-NTC-1-24.pdf',
            '1-25' => 'Form-No.-NTC-1-25.pdf',
        ];

        return $templateMap[$formType] ?? null;
    }

    /**
     * Get coordinate maps for all form types
     */
    private function getCoordinateMaps()
    {
        return PDFCoordinateMaps::getAllMaps();
    }

    /**
     * Get available form types
     */
    public function getAvailableFormTypes()
    {
        return array_keys($this->coordinateMaps);
    }

    /**
     * Check if template exists
     */
    public function templateExists($formType)
    {
        $templateFile = $this->getTemplateFile($formType);
        return $templateFile && file_exists($this->templatesPath . $templateFile);
    }

    /**
     * Check if form data exists for given token
     */
    public function formDataExists($formType, $formToken)
    {
        $formData = session('form_' . $formType . '_' . $formToken);
        return !empty($formData);
    }

    /**
     * Get form data by token
     */
    public function getFormDataByToken($formType, $formToken)
    {
        return session('form_' . $formType . '_' . $formToken);
    }
}
