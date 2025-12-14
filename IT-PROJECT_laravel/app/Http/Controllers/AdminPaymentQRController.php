<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPaymentQRController extends Controller
{
    /**
     * Get payment QR code from storage
     * Returns the file path if exists, null otherwise
     */
    private function getPaymentQR()
    {
        $files = Storage::disk('local')->files('payment-QR');

        // Sort files by modification time (newest first)
        usort($files, function ($a, $b) {
            return Storage::disk('local')->lastModified($b) <=> Storage::disk('local')->lastModified($a);
        });

        // Return the most recent file (or null if no files)
        return !empty($files) ? $files[0] : null;
    }

    /**
     * Get payment QR code for transaction display
     * Returns public URL for the image
     */
    public function getPaymentQRUrl()
    {
        $file = $this->getPaymentQR();

        if (!$file) {
            // Return default image if no QR code uploaded
            return asset('images/Gcash-BMA-QRcode.jpg');
        }

        // Return route to view the file
        return route('admin.viewFile', ['path' => $file]);
    }

    /**
     * Display payment QR management page
     */
    public function index()
    {
        $file = $this->getPaymentQR();
        $fileCount = $file ? 1 : 0;
        return view('adminside.Payment-QR', compact('file', 'fileCount'));
    }

    /**
     * Store new payment QR code or replace existing one
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'replace_path' => 'nullable|string',
        ]);

        // Check if this is a replace operation
        $replacePath = $request->input('replace_path');

        if ($replacePath) {
            // Replace existing file
            return $this->replaceQR($request, $replacePath);
        }

        // Handle new upload
        return $this->uploadQR($request);
    }

    /**
     * Upload a new payment QR code
     */
    private function uploadQR(Request $request)
    {
        // Check if a QR code already exists (limit of 1)
        $existingFile = $this->getPaymentQR();
        if ($existingFile) {
            return redirect()->back()->with('error', 'Maximum of 1 QR code allowed. Please delete or replace the existing QR code.');
        }

        if (!$request->hasFile('image')) {
            return redirect()->back()->with('error', 'No image file provided.');
        }

        $image = $request->file('image');

        // Generate unique filename with timestamp
        $filename = time() . '_' . $image->getClientOriginalName();
        $directory = 'payment-QR';

        try {
            // Store the new file
            $storedPath = $image->storeAs($directory, $filename, 'local');

            if (!$storedPath || !Storage::disk('local')->exists($storedPath)) {
                return redirect()->back()->with('error', 'Failed to store the new image.');
            }

            return redirect()->back()->with(
                'success',
                "QR code uploaded successfully: $filename"
            );
        } catch (\Exception $e) {
            return redirect()->back()->with(
                'error',
                'Error uploading image: ' . $e->getMessage()
            );
        }
    }

    /**
     * Replace an existing payment QR code
     * Replaces the file while maintaining the original filename
     */
    private function replaceQR(Request $request, $oldPath)
    {
        if (!Storage::disk('local')->exists($oldPath)) {
            return redirect()->back()->with('error', 'QR code to replace not found.');
        }

        if (!$request->hasFile('image')) {
            return redirect()->back()->with('error', 'No image file provided.');
        }

        $image = $request->file('image');
        $oldFilename = basename($oldPath);

        // Get the base name without extension
        $baseName = pathinfo($oldFilename, PATHINFO_FILENAME);

        // Get extension from the new uploaded file
        $newExtension = $image->getClientOriginalExtension();

        // Create new filename with original base name and new extension
        $newFilename = $baseName . '.' . strtolower($newExtension);
        $directory = 'payment-QR';

        try {
            // Delete the old file first (in case extension is different)
            Storage::disk('local')->delete($oldPath);

            // Store the new file with the same base name but new extension
            $storedPath = $image->storeAs($directory, $newFilename, 'local');

            if (!$storedPath || !Storage::disk('local')->exists($storedPath)) {
                return redirect()->back()->with('error', 'Failed to store the new image.');
            }

            return redirect()->back()->with(
                'success',
                "QR code replaced successfully: $newFilename"
            );
        } catch (\Exception $e) {
            return redirect()->back()->with(
                'error',
                'Error replacing image: ' . $e->getMessage()
            );
        }
    }

    /**
     * Delete a payment QR code
     */
    public function destroy(Request $request)
    {
        $path = $request->input('path');

        if (Storage::disk('local')->exists($path)) {
            Storage::disk('local')->delete($path);
            return redirect()->back()->with('success', 'QR code deleted successfully.');
        }

        return redirect()->back()->with('error', 'QR code not found.');
    }
}
