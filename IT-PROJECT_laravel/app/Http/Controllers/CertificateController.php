<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    // Display verification form
    public function showVerifyPage(Request $request)
    {
        $certificate = null;
        $pdfUrl = null;

        if ($request->has('certificate_no')) {
            $certificateNo = $request->query('certificate_no');
            $certificate = Certificate::where('certificate_no', $certificateNo)->first();

            if ($certificate) {
                $pdfUrl = $certificate->pdf_path ? Storage::url($certificate->pdf_path) : null;
            } else {
                return redirect()->route('admin.certificates.verify')
                    ->withErrors(['certificate_no' => 'Certificate not found']);
            }
        }

        return view('adminside.verify', compact('certificate', 'pdfUrl'));
    }


    // Handle verification
    public function verifySubmit(Request $request)
    {
        $request->validate([
            'certificate_no' => 'required|string',
        ]);

        $certificate = Certificate::where('certificate_no', $request->certificate_no)->first();

        if (!$certificate) {
            return back()->withErrors(['Certificate not found.']);
        }

        if ($certificate->status !== 'active') {
            return back()->withErrors(['Certificate is ' . $certificate->status . '.']);
        }

        // Optional: generate a link to the PDF
        $pdfPath = "certificates/{$certificate->certificate_no}.pdf";

        $pdfUrl = Storage::exists($pdfPath)
            ? route('admin.certificates.view', ['certificate_no' => $certificate->certificate_no])
            : null;

        return view('adminside.verify', [
            'certificate' => $certificate,
            'pdfUrl' => $pdfUrl,
        ]);
    }

    public function viewCertificate($certificate_no)
    {
        $certificate = Certificate::where('certificate_no', $certificate_no)->firstOrFail();
        $pdfPath = "certificates/{$certificate->certificate_no}.pdf";

        abort_unless(Storage::exists($pdfPath), 404);

        return response()->file(
            storage_path("app/private/{$pdfPath}"),
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $certificate_no . '.pdf"',
            ]
        );
    }


    // Optional: allow admin to download/view certificate
    public function downloadCertificate($certificate_no)
    {
        $certificate = Certificate::where('certificate_no', $certificate_no)->firstOrFail();
        $pdfPath = "certificates/{$certificate->certificate_no}.pdf";

        if (!Storage::exists($pdfPath)) {
            abort(404, 'Certificate file not found.');
        }

        return response()->download(storage_path("app/{$pdfPath}"), "{$certificate_no}.pdf");
    }

    public function extractCertificateNumber($certificateId)
    {
        $certificate = Certificate::find($certificateId);
        if (!$certificate) {
            return back()->withErrors(['Certificate not found']);
        }

        // Get file path
        $filePath = storage_path('app/private/' . $certificate->pdf_path);

        $text = '';

        if (str_ends_with($filePath, '.pdf')) {
            // Option 1: PDF Parser for PDF files
            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile($filePath);
            $text = $pdf->getText();
        } else {
            // Option 2: OCR for image files (jpg, png, etc.)
            $text = (new TesseractOCR($filePath))
                ->lang('eng')
                ->run();
        }

        // Extract certificate number using regex
        // Example: certificate format "ATROC-123456" or "1RTG-7890"
        preg_match('/[A-Z0-9]+-\d+/', $text, $matches);
        $certificateNo = $matches[0] ?? null;

        if (!$certificateNo) {
            return back()->withErrors(['Unable to detect certificate number.']);
        }

        // Save extracted certificate number to DB
        $certificate->certificate_no = $certificateNo;
        $certificate->save();

        return back()->with('success', "Certificate number extracted: {$certificateNo}");
    }
}
