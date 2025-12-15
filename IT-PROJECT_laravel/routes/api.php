<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\ValidationController;

// Test route (no CSRF required)
Route::post('/forms/test/save', [FormsController::class, 'testSaveForm']);

// Real-time validation routes
Route::prefix('validate')->group(function () {
    // Validate a single field
    Route::post('/field', [ValidationController::class, 'validateField']);
    
    // Validate multiple fields at once
    Route::post('/fields', [ValidationController::class, 'validateFields']);
    
    // Get client-side validation rules for a form
    Route::get('/rules', [ValidationController::class, 'getClientRules']);
});
