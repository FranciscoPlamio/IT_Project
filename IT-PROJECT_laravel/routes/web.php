<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FormsController;
use App\Http\Middleware\BlockMobileDevices;

Route::get('/', function () {
    return view('welcome');
});

// Forms list page
Route::get('/forms-list', [FormsController::class, 'index'])->name('forms.list')->middleware('email.verified');

// Forms showcase gallery
Route::get('/Displayforms', function () {
    return view('Displayforms');
})->name('forms.display');

// Payment method selection page
Route::get('/payment/method', function () {
    return view('payment.payment-method');
})->name('payment.method');

// Simple GCash payment demo page
Route::get('/payment/gcash', function () {
    return view('payment.gcash');
})->name('payment.gcash');

// Cash payment confirmation page
Route::get('/payment/cash', function () {
    return view('payment.cash');
})->name('payment.cash');

// Transaction details page
Route::get('/payment/transaction', function () {
    return view('payment.transaction');
})->name('payment.transaction');

// Email Authentication routes
Route::get('/email-auth', [EmailController::class, 'showEmailAuth'])->name('email-auth');
Route::post('/email-auth', [EmailController::class, 'sendAuthEmail'])->name('email-auth.submit');
Route::get('/email-auth/verify/{token}', [EmailController::class, 'verifyEmail'])->name('email-auth.verify');
Route::get('/email-auth/verify-script/{token}', [EmailController::class, 'verifyEmailScript'])->name('email-auth.verify-script');
Route::get('/email-auth/status', [EmailController::class, 'checkEmailStatus'])->name('email-auth.status');
Route::post('/email-auth/clear', [EmailController::class, 'clearEmailVerification'])->name('email-auth.clear');

Route::prefix('forms')->name('forms.')->middleware('email.verified')->group(function () {

    // GET routes to render form views

    Route::get('1-25/text-message', fn() => view('clientside.forms.Form1-25(TextMessage)'))->name('1-25-text-message');
    Route::get('{formType}', [FormsController::class, 'show'])->name('show');
    Route::get('{formType}/validation', [FormsController::class, 'showValidation'])->name('validation');
    Route::get('{formType}/edit', [FormsController::class, 'edit'])->name('edit');

    Route::post('{formType}/preview', [FormsController::class, 'preview'])->name('preview');
    Route::post('{formType}/submit', [FormsController::class, 'storeAll'])->name('submit');
});

// Adminside Pages
// Show login page (GET)
Route::get('/adminside', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

// Handle login (POST) → same page (index.blade.php)
Route::post('/adminside', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// Dashboard (after login)
Route::get('/adminside/dashboard', [AdminAuthController::class, 'dashboard'])->name('adminside.dashboard');

// Logout
Route::post('/adminside/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Sign Up (temporary redirect)


// Default route (optional) (Uncomment to make the default url to adminside only 1 can be used) 
// Route::get('/', function () {
//     return redirect()->route('adminside.index');
// });

// Default route (optional) (Uncomment to make the default url to homepage only 1 can be used)
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/adminside/cert-request', function () {
    return view('adminside.cert-request');
})->name('adminside.cert-request');

Route::get('/adminside/req-management', function () {
    return view('adminside.req-management');
})->name('adminside.req-management');

Route::get('/adminside/bill-pay', function () {
    return view('adminside.bill-pay');
})->name('adminside.bill-pay');

Route::prefix('adminside')
    ->middleware(\App\Http\Middleware\BlockMobileDevices::class)
    ->group(function () {
        Route::get('/', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('adminside.dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });
