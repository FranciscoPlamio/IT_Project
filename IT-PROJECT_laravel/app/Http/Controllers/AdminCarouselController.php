<?php

namespace App\Http\Controllers;

use App\Models\QrCodeLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCarouselController extends Controller
{
    /**
     * Get all carousel slides from storage
     * Returns sorted array of file paths
     */
    private function getCarouselSlides()
    {
        $files = Storage::disk('public')->files('carousel-slides');

        // Sort files alphabetically by filename
        sort($files);

        return $files;
    }

    /**
     * Get carousel slides for homepage display
     * Returns public URLs for images (no authentication required)
     * This function is used by the homepage route
     */
    public function getHomepageSlides()
    {
        $files = $this->getCarouselSlides();

        // Convert file paths to public URLs
        $urls = [];
        foreach ($files as $file) {
            // Convert storage path to public URL
            // File path is like "carousel-slides/banner_1.png"
            // Convert to "storage/carousel-slides/banner_1.png" for asset()
            $urls[] = asset('storage/' . $file);
        }

        return $urls;
    }

    /**
     * Display carousel management page
     */
    public function index()
    {
        $files = $this->getCarouselSlides();
        return view('adminside.carousel', compact('files'));
    }

    /**
     * Store new carousel slide or replace existing one
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'replace_path' => 'nullable|string',
        ]);

        $replacePath = $request->input('replace_path');

        if ($replacePath) {
            $result = $this->replaceQR($request, $replacePath);

            // Log the replacement
            QrCodeLog::create([
                'admin_id' => Auth::id(),
                'action' => 'replaced',
                'file_name' => basename($replacePath),
            ]);

            return $result;
        }

        // Handle new upload
        $result = $this->uploadSlide($request);

        // Log the new upload
        QrCodeLog::create([
            'admin_id' => Auth::id(),
            'action' => 'uploaded',
            'file_name' => $request->file('image')->getClientOriginalName(),
        ]);

        return $result;
    }

    /**
     * Upload a new carousel slide
     */
    private function uploadSlide(Request $request)
    {
        // Check current file count
        $files = $this->getCarouselSlides();
        if (count($files) >= 5) {
            return redirect()->back()->with('error', 'Maximum of 5 images allowed. Please delete or replace an existing image.');
        }

        if (!$request->hasFile('image')) {
            return redirect()->back()->with('error', 'No image file provided.');
        }

        $image = $request->file('image');

        // Generate unique filename with timestamp
        $filename = time() . '_' . $image->getClientOriginalName();
        $directory = 'carousel-slides';

        try {
            // Store the new file
            $storedPath = $image->storeAs($directory, $filename, 'public');

            if (!$storedPath || !Storage::disk('public')->exists($storedPath)) {
                return redirect()->back()->with('error', 'Failed to store the new image.');
            }

            return redirect()->back()->with(
                'success',
                "Image uploaded successfully: $filename"
            );
        } catch (\Exception $e) {
            return redirect()->back()->with(
                'error',
                'Error uploading image: ' . $e->getMessage()
            );
        }
    }

    /**
     * Replace an existing carousel slide
     * Replaces the file while maintaining the original filename
     */
    private function replaceSlide(Request $request, $oldPath)
    {
        if (!Storage::disk('public')->exists($oldPath)) {
            return redirect()->back()->with('error', 'Image to replace not found.');
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
        $directory = 'carousel-slides';

        try {
            // Delete the old file first (in case extension is different)
            Storage::disk('public')->delete($oldPath);

            // Store the new file with the same base name but new extension
            $storedPath = $image->storeAs($directory, $newFilename, 'public');

            if (!$storedPath || !Storage::disk('public')->exists($storedPath)) {
                return redirect()->back()->with('error', 'Failed to store the new image.');
            }

            return redirect()->back()->with(
                'success',
                "Image replaced successfully: $newFilename"
            );
        } catch (\Exception $e) {
            return redirect()->back()->with(
                'error',
                'Error replacing image: ' . $e->getMessage()
            );
        }
    }


    /**
     * Delete a carousel slide
     */
    public function destroy(Request $request)
    {
        $path = $request->input('path');

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return redirect()->back()->with('success', 'Image deleted successfully.');
        }

        return redirect()->back()->with('error', 'Image not found.');
    }
}
