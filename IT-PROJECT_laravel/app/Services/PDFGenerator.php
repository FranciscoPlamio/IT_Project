<?php

namespace App\Services;

use Exception;
use FPDF;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;

class PDFGenerator
{
    private $templatesPath;
    private $coordinateMaps;
    private $fieldWidthConstraints = [
        'course_taken' => 77.72, // width in mm available on the template
        'mailing_address' => 103.29,
        'mailing_address_line2' => 103.29,
        'or_date' => 16.13,
        'needs_details' => 119.76,
    ];

    private $fieldFontSizes = [
        'needs_details' => 7, // dedicated font size for needs_details
    ];

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
            // Ensure supplemental data (OR, admission slip) are surfaced with top-level keys
            $formData = $this->normalizeFormData($formData);

            // Create FPDI instance
            $pdf = new Fpdi();
            $pdf->setSourceFile($this->templatesPath . $templateFile);
            $pdf->AddPage();
            $pdf->useTemplate($pdf->importPage(1));

            // Set font
            $pdf->SetFont('Arial', '', 10);
            // Fill form fields
            $this->fillFormFields($pdf, $formData, $coordinates);
            // Embed attachment images (e.g., ID pictures)
            $this->embedAttachmentImages($pdf, $formData, $coordinates);

            return $pdf;
        } catch (Exception $e) {
            throw new Exception("PDF generation failed: " . $e->getMessage());
        }
    }

    /**
     * Generate PDF using form token to retrieve data from session or database
     */
    public function generatePDFFromToken($formType, $formToken)
    {
        try {
            // Retrieve form data from session using token
            $formData = session('form_' . $formType . '_' . $formToken);

            // If not in session, try database
            if (!$formData) {
                $formModel = \App\Helpers\FormManager::getFormModel('form' . $formType);
                $dbForm = $formModel::where('form_token', $formToken)->first();

                if (!$dbForm) {
                    throw new Exception("Form data not found for token: {$formToken}");
                }

                // Convert model to array
                $formData = $dbForm->toArray();
            }

            // Generate PDF with retrieved data
            return $this->generatePDF($formData, $formType);
        } catch (Exception $e) {
            throw new Exception("PDF generation from token failed: " . $e->getMessage());
        }
    }

    /**
     * Surface nested supplemental data (admission slip / OR) as top-level keys
     */
    private function normalizeFormData($formData)
    {
        if ($formData instanceof \Illuminate\Support\Collection) {
            $formData = $formData->toArray();
        }

        if (!is_array($formData)) {
            return [];
        }

        $normalized = $formData;

        if (!empty($formData['admission_slip']) && is_array($formData['admission_slip'])) {
            foreach ($formData['admission_slip'] as $key => $value) {
                if (!array_key_exists($key, $normalized) || $normalized[$key] === null || $normalized[$key] === '') {
                    $normalized[$key] = $value;
                }
            }
        }

        if (!empty($formData['or']) && is_array($formData['or'])) {
            foreach ($formData['or'] as $key => $value) {
                if (!array_key_exists($key, $normalized) || $normalized[$key] === null || $normalized[$key] === '') {
                    $normalized[$key] = $value;
                }
            }
        }

        if (!empty($formData['exam_type'])) {
            $normalized['admission_exam_type'] = $this->formatExamType($formData['exam_type']);
        }

        return $normalized;
    }

    /**
     * Fill form fields with data
     */
    private function fillFormFields($pdf, $formData, $coordinates)
    {
        // Special handling for exam_type: mark a check mark at the specific option position if provided
        if (!empty($formData['exam_type'])) {
            $examTypeKey = $formData['exam_type'];
            if (!empty($coordinates['exam_type_positions']) && is_array($coordinates['exam_type_positions'])) {
                $positions = $coordinates['exam_type_positions'];
                if (!empty($positions[$examTypeKey]) && is_array($positions[$examTypeKey])) {
                    $pos = $positions[$examTypeKey];
                    // Place a check mark on the checkbox/radio location
                    $pdf->SetFont('ZapfDingbats', '', 12);
                    $pdf->SetXY($pos[0], $pos[1]);
                    $pdf->Write(0, '4');
                    // restore default font for subsequent fields
                    $pdf->SetFont('Arial', '', 10);
                } elseif (!empty($coordinates['exam_type']) && is_array($coordinates['exam_type'])) {
                    // Fallback to generic exam_type position when specific not found
                    $fallback = $coordinates['exam_type'];
                    $pdf->SetFont('ZapfDingbats', '', 12);
                    $pdf->SetXY($fallback[0], $fallback[1]);
                    $pdf->Write(0, '4');
                    $pdf->SetFont('Arial', '', 10);
                }
            } elseif (!empty($coordinates['exam_type']) && is_array($coordinates['exam_type'])) {
                // If no map exists, just place a check mark at the generic exam_type position
                $pdf->SetFont('ZapfDingbats', '', 12);
                $pdf->SetXY($coordinates['exam_type'][0], $coordinates['exam_type'][1]);
                $pdf->Write(0, '4');
                $pdf->SetFont('Arial', '', 10);
            }
        }

        // Special handling for sex: place check mark at the appropriate position
        if (!empty($formData['sex'])) {
            $sexValue = strtolower(trim((string)$formData['sex']));
            // Prefer specific positions mapping when available
            if (!empty($coordinates['sex_positions']) && is_array($coordinates['sex_positions'])) {
                $map = $coordinates['sex_positions'];
                $target = null;
                if ($sexValue === 'male' && !empty($map['male'])) {
                    $target = $map['male'];
                } elseif ($sexValue === 'female' && !empty($map['female'])) {
                    $target = $map['female'];
                }
                if ($target && is_array($target)) {
                    $pdf->SetFont('ZapfDingbats', '', 12);
                    $pdf->SetXY($target[0], $target[1]);
                    $pdf->Write(0, '4');
                    $pdf->SetFont('Arial', '', 10);
                }
            } elseif (!empty($coordinates['sex']) && is_array($coordinates['sex'])) {
                // Fallback to legacy single coordinate (assumed male)
                $sexCoords = $coordinates['sex'];
                $pdf->SetFont('ZapfDingbats', '', 12);
                $pdf->SetXY($sexCoords[0], $sexCoords[1]);
                $pdf->Write(0, '4');
                $pdf->SetFont('Arial', '', 10);
            }
        }

        // Special handling for needs: place check mark at YES/NO based on value
        if (array_key_exists('needs', $formData)) {
            $rawNeeds = $formData['needs'];
            // Normalize to lowercase yes/no for coordinate map lookup
            $needsValue = null;
            if (is_bool($rawNeeds)) {
                $needsValue = $rawNeeds ? 'yes' : 'no';
            } else {
                $val = strtolower(trim((string)$rawNeeds));
                if ($val === '1' || $val === 'true' || $val === 'yes' || $val === 'Yes') {
                    $needsValue = 'yes';
                } elseif ($val === '0' || $val === 'false' || $val === 'no' || $val === 'No') {
                    $needsValue = 'no';
                }
            }

            // Process both 'yes' and 'no' values
            if ($needsValue !== null) {
                if (!empty($coordinates['needs_positions']) && is_array($coordinates['needs_positions'])) {
                    $map = $coordinates['needs_positions'];
                    if (!empty($map[$needsValue]) && is_array($map[$needsValue])) {
                        $pos = $map[$needsValue];
                        $pdf->SetFont('ZapfDingbats', '', 12);
                        $pdf->SetXY($pos[0], $pos[1]);
                        $pdf->Write(0, '4');
                        $pdf->SetFont('Arial', '', 10);
                    }
                } elseif (!empty($coordinates['needs']) && is_array($coordinates['needs'])) {
                    // Fallback to single position
                    $fallback = $coordinates['needs'];
                    $pdf->SetFont('ZapfDingbats', '', 12);
                    $pdf->SetXY($fallback[0], $fallback[1]);
                    $pdf->Write(0, '4');
                    $pdf->SetFont('Arial', '', 10);
                }
            }
        }

        // Render remaining fields normally (skip exam_type, sex, and needs to avoid duplicate text)
        foreach ($coordinates as $fieldName => $coords) {
            if ($fieldName === 'mailing_address') {
                $this->writeMailingAddress(
                    $pdf,
                    $coords,
                    $coordinates,
                    $formData[$fieldName],
                    $formData['mailing_address_line2'] ?? null
                );
                continue;
            }

            if ($fieldName === 'or_date') {
                $this->writeOrDate(
                    $pdf,
                    $coords,
                    $coordinates,
                    $formData[$fieldName] ?? null
                );
                continue;
            }

            $isAttachmentSlot = strpos($fieldName, 'id_picture_slot') === 0;
            if (
                $fieldName === 'exam_type' || $fieldName === 'exam_type_positions' ||
                $fieldName === 'sex' || $fieldName === 'sex_positions' ||
                $fieldName === 'needs' || $fieldName === 'needs_positions' ||
                $fieldName === 'mailing_address_line2' ||
                $fieldName === 'or_year_suffix' ||
                $isAttachmentSlot
            ) {
                continue;
            }
            // Auto-copy date_of_exam to date_of_exam_line2 if line2 doesn't exist
            if ($fieldName === 'date_of_exam_line2' && !array_key_exists('date_of_exam_line2', $formData) && array_key_exists('date_of_exam', $formData)) {
                $formData['date_of_exam_line2'] = $formData['date_of_exam'];
            }

            // Check if field exists and has a value (including boolean false and empty strings that should be displayed)
            if (array_key_exists($fieldName, $formData) && $formData[$fieldName] !== null) {
                if (is_array($formData[$fieldName])) {
                    continue;
                }
                // Skip empty strings unless they're explicitly needed
                if ($formData[$fieldName] === '' && !in_array($fieldName, ['unit', 'street', 'barangay', 'city', 'province', 'zip_code'])) {
                    continue;
                }
                $value = $this->formatFieldValue($formData[$fieldName], $fieldName);
                if (isset($this->fieldWidthConstraints[$fieldName])) {
                    // Use dedicated font size if specified, otherwise default to 10pt
                    $defaultFontSize = $this->fieldFontSizes[$fieldName] ?? 10;
                    $this->writeFittedText(
                        $pdf,
                        $coords[0],
                        $coords[1],
                        $this->fieldWidthConstraints[$fieldName],
                        $value,
                        $defaultFontSize,
                        6,
                        0.5,
                        $fieldName,
                        $coordinates
                    );
                } else {
                    $pdf->SetFont('Arial', '', 10);
                    $pdf->SetXY($coords[0], $coords[1]);
                    $pdf->Write(0, $value);
                }
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
            case 'dob':
            case 'date_of_birth':
            case 'date_accomplished':
            case 'admission_date':
            case 'date_of_exam':
            case 'date_of_exam_line2':
                // Handle various date formats: Carbon instances, DateTime objects, MongoDB dates, and strings
                try {
                    if ($value instanceof \DateTimeInterface) {
                        // Handles Carbon, DateTime, and MongoDB\BSON\UTCDateTime (which implements DateTimeInterface)
                        return $value->format('m/d/Y');
                    } elseif (is_string($value) && !empty($value)) {
                        return date('m/d/Y', strtotime($value));
                    } elseif (is_numeric($value)) {
                        // Handle Unix timestamps
                        return date('m/d/Y', (int)$value);
                    }
                } catch (\Exception $e) {
                    // Fallback to string representation if date parsing fails
                    return is_string($value) ? strtoupper($value) : '';
                }
                return '';

            case 'exam_type':
                return $this->formatExamType($value);

            case 'admission_exam_type':
                return is_string($value) ? $value : $this->formatExamType($value);

            case 'needs':
                // This shouldn't be called since needs is handled separately, but just in case
                if (is_bool($value)) {
                    return $value ? 'YES' : 'NO';
                }
                return strtoupper($value);

            case 'course_taken':
                return $this->formatCourseTaken($value);

            case 'or_date':
                return $this->formatOrDate($value);

            default:
                // Handle boolean values
                if (is_bool($value)) {
                    return $value ? 'YES' : 'NO';
                }
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
     * Convert course names into acronyms/short forms for PDF space constraints
     */
    private function formatCourseTaken($course)
    {
        if (!is_string($course) || $course === '') {
            return '';
        }

        $normalized = trim($course);

        $map = [
            'Commercial Pilot' => 'CP',
            'Student Pilot' => 'SP',
            'General Radio Communication Operator (GRCO)' => 'GRCO',
            'Industrial Electronics Technician Course (IETC)' => 'IETC',
            'Communications Technician Course (CTC)' => 'CTC',
            'Bachelor of Science in Avionics Technology (BS AVTECH)' => 'BS AVTECH',
            'Bachelor of Science in Electronics and Communications Engineering / Bachelor of Science in Electronics Engineering (BS ECE)' => 'BS ECE',
            'Radio Enthusiast' => 'RE',
            'Registered ECE or Commercial Operator' => 'R-ECE/CO',
            'Licensed Amateur (for upgrading)' => 'LA',
            'Other' => 'OTHER',
        ];

        return $map[$normalized] ?? strtoupper($normalized);
    }

    private function formatOrDate($value)
    {
        try {
            if ($value instanceof \DateTimeInterface) {
                $dt = $value;
            } elseif (is_numeric($value)) {
                $dt = (new \DateTime())->setTimestamp((int)$value);
            } elseif (is_string($value) && $value !== '') {
                $dt = new \DateTime($value);
            } else {
                return '';
            }
        } catch (\Exception $e) {
            return is_string($value) ? strtoupper($value) : '';
        }

        return $dt->format('m/d');
    }

    /**
     * Embed uploaded attachment images (currently ID picture) onto the PDF
     */
    private function embedAttachmentImages($pdf, $formData, $coordinates)
    {
        if (empty($formData['form_token'])) {
            return;
        }

        $slots = $this->collectIdPictureSlots($coordinates);
        if (empty($slots)) {
            return;
        }

        $attachmentPath = $this->findLatestAttachmentPath($formData['form_token'], 'id_picture');
        if (!$attachmentPath) {
            return;
        }

        $absolutePath = Storage::path($attachmentPath);
        if (!file_exists($absolutePath)) {
            return;
        }

        foreach ($slots as $slot) {
            $position = $slot['position'];
            $dimensions = $slot['size'];

            $x = $position[0] ?? 0;
            $y = $position[1] ?? 0;
            $width = $dimensions[0] ?? 25.40;
            $height = $dimensions[1] ?? 25.40;

            try {
                $pdf->Image($absolutePath, $x, $y, $width, $height);
            } catch (\Throwable $e) {
                // Skip embedding if FPDF throws an error (e.g., unsupported format)
                continue;
            }
        }
    }

    /**
     * Locate the latest uploaded attachment for a given form token + field key
     */
    private function findLatestAttachmentPath($formToken, $fieldKey)
    {
        $folder = "forms/{$formToken}";
        if (!Storage::exists($folder)) {
            return null;
        }

        $files = Storage::files($folder);
        $candidates = [];

        foreach ($files as $file) {
            $base = basename($file);
            if (strpos($base, "{$fieldKey}_") === 0) {
                $candidates[] = $file;
            }
        }

        if (empty($candidates)) {
            return null;
        }

        usort($candidates, function ($a, $b) {
            return Storage::lastModified($a) <=> Storage::lastModified($b);
        });

        return array_pop($candidates);
    }

    /**
     * Collect all id picture slot definitions from the coordinate map
     */
    private function collectIdPictureSlots($coordinates)
    {
        $slots = [];

        foreach ($coordinates as $key => $value) {
            if (strpos($key, 'id_picture_slot') === 0 && strpos($key, 'size') === false) {
                if (!is_array($value) || count($value) < 2) {
                    continue;
                }

                $sizeKey = $key . '_size';
                $size = $coordinates[$sizeKey] ?? [25.40, 25.40];
                if (!is_array($size) || count($size) < 2) {
                    $size = [25.40, 25.40];
                }

                $slots[] = [
                    'position' => $value,
                    'size' => $size,
                ];
            }
        }

        return $slots;
    }

    /**
     * Write text that shrinks to fit within a max width (fallback to wrapping)
     */
    private function writeFittedText($pdf, $x, $y, $maxWidth, $text, $defaultFontSize = 10, $minFontSize = 6, $fontStep = 0.5, $fieldName = null, $coordinates = [])
    {
        $currentSize = $defaultFontSize;
        $pdf->SetFont('Arial', '', $currentSize);
        $textWidth = $pdf->GetStringWidth($text);

        while ($textWidth > $maxWidth && $currentSize > $minFontSize) {
            $currentSize -= $fontStep;
            $pdf->SetFont('Arial', '', $currentSize);
            $textWidth = $pdf->GetStringWidth($text);
        }

        $pdf->SetXY($x, $y);

        if ($textWidth <= $maxWidth) {
            $pdf->Write(0, $text);
        } else {
            $pdf->MultiCell($maxWidth, 4, $text, 0, 'L');
        }

        // restore default font size for subsequent operations
        $pdf->SetFont('Arial', '', $defaultFontSize);
    }

    /**
     * Custom handling for mailing address with overflow to second line
     */
    private function writeMailingAddress($pdf, $line1Coords, $coordinates, $line1Value, $existingLine2 = null)
    {
        if ($line1Value === null || $line1Value === '') {
            return;
        }

        $maxWidth = $this->fieldWidthConstraints['mailing_address'];
        $line1Text = $this->formatFieldValue($line1Value, 'mailing_address');
        $line2Text = null;

        if ($existingLine2 !== null && $existingLine2 !== '') {
            $line2Text = $this->formatFieldValue($existingLine2, 'mailing_address_line2');
        }

        if ($line2Text === null) {
            $pdf->SetFont('Arial', '', 10);
            $line1Width = $pdf->GetStringWidth($line1Text);
            if ($line1Width > $maxWidth && !empty($coordinates['mailing_address_line2'])) {
                [$firstLine, $overflow] = $this->splitTextByWidth($pdf, $line1Text, $maxWidth);
                if ($firstLine !== '') {
                    $line1Text = $firstLine;
                }
                if ($overflow !== '') {
                    $line2Text = $overflow;
                }
            }
        }

        $this->writeFittedText(
            $pdf,
            $line1Coords[0],
            $line1Coords[1],
            $maxWidth,
            $line1Text,
            10,
            6,
            0.5,
            'mailing_address',
            $coordinates
        );

        if ($line2Text !== null && !empty($coordinates['mailing_address_line2'])) {
            $line2Coords = $coordinates['mailing_address_line2'];
            $this->writeFittedText(
                $pdf,
                $line2Coords[0],
                $line2Coords[1],
                $this->fieldWidthConstraints['mailing_address_line2'],
                $line2Text,
                10,
                6,
                0.5,
                'mailing_address_line2',
                $coordinates
            );
        }
    }

    /**
     * Split text into the largest portion that fits within width and the remainder
     */
    private function splitTextByWidth($pdf, $text, $maxWidth)
    {
        $words = preg_split('/\s+/', trim($text));
        if (empty($words)) {
            return ['', ''];
        }

        $pdf->SetFont('Arial', '', 10);
        $line = '';
        $consumed = 0;

        foreach ($words as $index => $word) {
            $candidate = $line === '' ? $word : $line . ' ' . $word;
            if ($pdf->GetStringWidth($candidate) <= $maxWidth) {
                $line = $candidate;
                $consumed = $index + 1;
            } else {
                break;
            }
        }

        if ($line === '') {
            return [$text, ''];
        }

        $remainderWords = array_slice($words, $consumed);
        $remainder = trim(implode(' ', $remainderWords));

        return [$line, $remainder];
    }

    private function writeOrDate($pdf, $coords, $coordinates, $rawValue)
    {
        if ($rawValue === null || $rawValue === '') {
            return;
        }

        $display = $this->formatFieldValue($rawValue, 'or_date');
        $this->writeFittedText(
            $pdf,
            $coords[0],
            $coords[1],
            $this->fieldWidthConstraints['or_date'],
            $display
        );

        if (!empty($coordinates['or_year_suffix'])) {
            $suffix = $this->extractYearSuffixFromValue($rawValue);
            if ($suffix !== null) {
                $suffixCoords = $coordinates['or_year_suffix'];
                $this->writeYearSuffix($pdf, $suffixCoords[0], $suffixCoords[1], $suffix);
            }
        }
    }

    private function extractYearSuffixFromValue($value)
    {
        try {
            if ($value instanceof \DateTimeInterface) {
                $dt = $value;
            } elseif (is_numeric($value)) {
                $dt = (new \DateTime())->setTimestamp((int)$value);
            } elseif (is_string($value) && $value !== '') {
                $dt = new \DateTime($value);
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }

        return $dt->format('y');
    }

    // private function extractYearSuffix($text)
    // {
    //     if (empty($text)) {
    //         return null;
    //     }

    //     if (preg_match('/(\d{4})$/', $text, $matches)) {
    //         return substr($matches[1], -2);
    //     }

    //     if (preg_match('/\b(\d{2})\b/', $text, $matches)) {
    //         return $matches[1];
    //     }

    //     return null;
    // }

    private function writeYearSuffix($pdf, $x, $y, $suffix)
    {
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetXY($x, $y);
        $pdf->Write(0, $suffix);
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
     * Check if form data exists for given token (checks session and database)
     */
    public function formDataExists($formType, $formToken)
    {
        // Check session first
        $formData = session('form_' . $formType . '_' . $formToken);
        if (!empty($formData)) {
            return true;
        }

        // Check database
        try {
            $formModel = \App\Helpers\FormManager::getFormModel('form' . $formType);
            $dbForm = $formModel::where('form_token', $formToken)->first();
            return !empty($dbForm);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get form data by token (checks session and database)
     */
    public function getFormDataByToken($formType, $formToken)
    {
        // Check session first
        $formData = session('form_' . $formType . '_' . $formToken);
        if (!empty($formData)) {
            return $formData;
        }

        // Check database
        try {
            $formModel = \App\Helpers\FormManager::getFormModel('form' . $formType);
            $dbForm = $formModel::where('form_token', $formToken)->first();
            return $dbForm ? $dbForm->toArray() : null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
