<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormsController;

// Test route (no CSRF required)
Route::post('/forms/test/save', [FormsController::class, 'testSaveForm']);
