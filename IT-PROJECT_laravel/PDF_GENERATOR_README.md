# Dynamic PDF Generator for NTC Forms

This system allows you to dynamically fill PDF templates with user form data using FPDF and FPDI libraries.

## Features

-   **Template-based PDF generation**: Uses existing PDF forms as templates
-   **Dynamic field mapping**: Automatically fills form fields based on coordinate mapping
-   **Multiple form support**: Supports all NTC form types (1-01 through 1-25)
-   **Laravel integration**: Seamlessly integrates with Laravel's routing and session management
-   **Download functionality**: Provides direct download links for generated PDFs

## Architecture

### Core Components

1. **PDFGenerator Service** (`app/Services/PDFGenerator.php`)

    - Main service class for PDF generation
    - Handles template loading and field filling
    - Manages coordinate mapping

2. **PDFCoordinateMaps Service** (`app/Services/PDFCoordinateMaps.php`)

    - Contains coordinate mappings for all form types
    - Defines X,Y positions for each form field
    - Easy to maintain and extend

3. **FormsController** (`app/Http/Controllers/FormsController.php`)
    - Contains `generateTemplatePDF()` method
    - Handles authentication and validation
    - Manages PDF download responses

## Usage

### Basic Usage

```php
use App\Services\PDFGenerator;

$pdfGenerator = new PDFGenerator();

// Method 1: Generate PDF with direct form data
$pdf = $pdfGenerator->generatePDF($formData, '1-01');
$pdf->Output('D', 'filename.pdf'); // Download

// Method 2: Generate PDF using form token (recommended)
$pdf = $pdfGenerator->generatePDFFromToken('1-01', $formToken);
$pdf->Output('D', 'filename.pdf'); // Download
```

### In Laravel Controller

```php
public function generateTemplatePDF(Request $request, $formType)
{
    $token = $request->query('token');
    $pdfGenerator = new PDFGenerator();

    // Check if form data exists for token
    if (!$pdfGenerator->formDataExists($formType, $token)) {
        return response()->json(['error' => 'Form data not found'], 404);
    }

    // Generate PDF using token (automatically retrieves data from session)
    $pdf = $pdfGenerator->generatePDFFromToken($formType, $token);
    $pdf->Output('D', "NTC_Form_{$formType}.pdf");
}
```

### Frontend Integration

The system includes a download button in `Form1-01.blade.php`:

```javascript
// Download PDF button functionality
const downloadPDFBtn = document.getElementById("downloadPDFBtn");
downloadPDFBtn.addEventListener("click", function () {
    const formToken = document.querySelector('input[name="form_token"]').value;
    const downloadUrl = `{{ route('forms.template-pdf', ['formType' => $formType]) }}?token=${formToken}`;

    const link = document.createElement("a");
    link.href = downloadUrl;
    link.click();
});
```

## Configuration

### Template Files

Place your PDF templates in `public/forms/` directory:

-   `Form-No.-NTC-1-01.pdf`
-   `Form-No.-NTC-1-02.pdf`
-   `Form-No.-NTC-1-03.pdf`
-   etc.

### Coordinate Mapping

Edit `app/Services/PDFCoordinateMaps.php` to adjust field positions:

```php
private static function getForm101Coordinates()
{
    return [
        'first_name' => [45, 95],    // X=45, Y=95
        'last_name' => [195, 95],    // X=195, Y=95
        'email' => [195, 170],       // X=195, Y=170
        // ... more fields
    ];
}
```

### Adding New Form Types

1. Add template file to `public/forms/`
2. Add coordinate mapping in `PDFCoordinateMaps.php`
3. Add template mapping in `PDFGenerator.php`

## Testing

### Test Scripts

Run the included test scripts:

```bash
cd IT-PROJECT_laravel

# Test basic PDF generation
php test_pdf_generation.php

# Test token-based PDF generation
php test_pdf_token.php
```

These will:

-   Test PDF generation with sample data
-   Test form token functionality
-   Create test PDF files
-   Verify template loading and session data retrieval

### Manual Testing

1. Fill out Form 1-01 in the browser
2. Click "Download PDF" button
3. Verify the PDF is generated with correct data

## Routes

-   `GET /forms/{formType}/template-pdf` - Generate and download PDF

## Dependencies

-   `setasign/fpdf` - PDF generation
-   `setasign/fpdi` - PDF template import
-   Laravel 12.x

## Troubleshooting

### Common Issues

1. **Template not found**

    - Ensure PDF template exists in `public/forms/`
    - Check filename matches the mapping in `getTemplateFile()`

2. **Fields not positioned correctly**

    - Adjust coordinates in `PDFCoordinateMaps.php`
    - Use PDF viewer to measure exact positions

3. **Text not appearing**
    - Check if field name matches form data keys
    - Verify coordinates are within PDF boundaries
    - Ensure font is set correctly

### Debug Mode

Enable debug mode in `PDFGenerator.php`:

```php
// Add this before generating PDF
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(255, 0, 0); // Red text for debugging
```

## File Structure

```
IT-PROJECT_laravel/
├── app/Services/
│   ├── PDFGenerator.php
│   └── PDFCoordinateMaps.php
├── app/Http/Controllers/
│   └── FormsController.php
├── public/forms/
│   ├── Form-No.-NTC-1-01.pdf
│   ├── Form-No.-NTC-1-02.pdf
│   └── ...
├── resources/views/clientside/forms/
│   └── Form1-01.blade.php
├── routes/
│   └── web.php
└── test_pdf_generation.php
```

## Future Enhancements

-   [ ] Add support for multi-page forms
-   [ ] Implement field validation before PDF generation
-   [ ] Add support for image fields
-   [ ] Create admin interface for coordinate management
-   [ ] Add batch PDF generation
-   [ ] Implement PDF preview functionality
