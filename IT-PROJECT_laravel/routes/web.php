<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

// Default index route
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

// Requirements page
Route::get('/requirements', function () {
    return view('requirements');
})->name('requirements');

//Services page
Route::get('/services', function () {
    return view('services');
})->name('services');


// Email Authentication routes
Route::get('/email-auth', [EmailController::class, 'showEmailAuth'])->name('email-auth');
Route::post('/email-auth', [EmailController::class, 'sendAuthEmail'])->name('email-auth.submit');
Route::get('/email-auth/verify/{token}', [EmailController::class, 'verifyEmail'])->name('email-auth.verify');
Route::get('/email-auth/verify-script/{token}', [EmailController::class, 'verifyEmailScript'])->name('email-auth.verify-script');
Route::get('/email-auth/status', [EmailController::class, 'checkEmailStatus'])->name('email-auth.status');
Route::post('/email-auth/clear', [EmailController::class, 'clearEmailVerification'])->name('email-auth.clear');


// Serve Philippine address data JSON files
Route::get('/philippine_provinces_cities_municipalities_and_barangays_2019v2.json', function () {
    $filePath = base_path('philippine_provinces_cities_municipalities_and_barangays_2019v2.json');

    if (!file_exists($filePath)) {
        abort(404, 'Province data file not found');
    }

    return response()->file($filePath, [
        'Content-Type' => 'application/json',
        'Cache-Control' => 'public, max-age=3600', // Cache for 1 hour
    ]);
})->name('address.province-data');

Route::get('/ph-zipcodes.json', function () {
    $filePath = base_path('ph-zipcodes.json');

    if (!file_exists($filePath)) {
        abort(404, 'Zip code data file not found');
    }

    return response()->file($filePath, [
        'Content-Type' => 'application/json',
        'Cache-Control' => 'public, max-age=3600', // Cache for 1 hour
    ]);
})->name('address.zipcode-data');

Route::get('/nationalities.json', function () {
    $filePath = base_path('nationalities.json');

    if (!file_exists($filePath)) {
        abort(404, 'Nationalities data file not found');
    }

    return response()->file($filePath, [
        'Content-Type' => 'application/json',
        'Cache-Control' => 'public, max-age=3600', // Cache for 1 hour
    ]);
})->name('nationalities.data');
