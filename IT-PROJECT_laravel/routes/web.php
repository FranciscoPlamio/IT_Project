<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\BlockMobileDevices;

// Default index route
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

// Forms list page
Route::get('/forms-list', [FormsController::class, 'index'])->name('forms.list')->middleware('email.verified');

// Forms showcase gallery
Route::get('/display-forms', [FormsController::class, 'index2'])->name('display.forms');
Route::get('{formType}/information', [FormsController::class, 'showFormInformation'])->name('showFormInformation');

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
Route::get('/payment/transaction', function (Request $request) {
    $paymentMethod = $request->get('payment_method', 'cash');
    return view('payment.transaction', compact('paymentMethod'));
})->name('payment.transaction');

// Requirements page
Route::get('/requirements', function () {
    return view('requirements');
})->name('requirements');


// Transactions
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index')->middleware('email.verified');
Route::get('/transactions/search', [TransactionController::class, 'search'])->name('transactions.finder')->middleware('email.verified');
Route::delete('/transactions', [TransactionController::class, 'destroy'])->name('transactions.delete')->middleware('email.verified');
Route::post('/transactions/complete', [TransactionController::class, 'complete'])->name('transactions.complete')->middleware('email.verified');
Route::post('/transactions/submit-gcash-proof-payment', [TransactionController::class, 'submitGcashProofPayment'])->name('transactions.submit.gcash.proof')->middleware('email.verified');
Route::get('/transactions/status', [TransactionController::class, 'checkStatus'])->name('transactions.status')->middleware('email.verified');


// Email Authentication routes
Route::get('/email-auth', [EmailController::class, 'showEmailAuth'])->name('email-auth');
Route::post('/email-auth', [EmailController::class, 'sendAuthEmail'])->name('email-auth.submit');
Route::get('/email-auth/verify/{token}', [EmailController::class, 'verifyEmail'])->name('email-auth.verify');
Route::get('/email-auth/verify-script/{token}', [EmailController::class, 'verifyEmailScript'])->name('email-auth.verify-script');
Route::get('/email-auth/status', [EmailController::class, 'checkEmailStatus'])->name('email-auth.status');
Route::post('/email-auth/clear', [EmailController::class, 'clearEmailVerification'])->name('email-auth.clear');

Route::prefix('forms')->name('forms.')->middleware('email.verified')->group(function () {

    // GET routes to render form views
    Route::get('{formType}', [FormsController::class, 'show'])->name('show');

    Route::get('{formType}/validation', [FormsController::class, 'showValidation'])->name('validation');
    Route::get('{formType}/preview', [FormsController::class, 'showPreview'])->name('preview');
    Route::get('{formType}/edit', [FormsController::class, 'edit'])->name('edit');
    Route::get('{formType}/pdf', [FormsController::class, 'generatePDF'])->name('pdf');
    Route::get('{formType}/template-pdf', [FormsController::class, 'generateTemplatePDF'])->name('template-pdf');

    Route::post('{formType}/preview', [FormsController::class, 'preview'])->name('preview');
    Route::post('{formType}/submit', [FormsController::class, 'storeAll'])->name('submit');
    Route::post('/cancel', [FormsController::class, 'cancel'])->name('cancel');
});

// Adminside Pages
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    // Dashboard (after login)
    Route::get('dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
    Route::get('cert-request', [AdminAuthController::class, 'certRequest'])->name('cert-request');

    Route::get('req-management', [AdminAuthController::class, 'requestManagement'])->name('req-management');
    Route::get('req-management/{formToken}', [AdminAuthController::class, 'showRequestAttachments'])->name('req.attachments');
    Route::post('req-management/save-remarks/{formId}/', [AdminAuthController::class, 'saveRemarks'])->name('remarks.save');
    Route::get('view-file', [AdminAuthController::class, 'viewFile'])->name('viewFile');

    Route::get('req-history', [AdminAuthController::class, 'requestHistory'])->name('req-history');

    Route::post('update-status', [AdminAuthController::class, 'updateStatus'])->name('admin.updateStatus');
    Route::post('forms/{formId}/approve', [AdminAuthController::class, 'approveForm']);
    Route::get('get-form-data', [AdminAuthController::class, 'getFormData'])->name('admin.getFormData');
    Route::get('download-form', [AdminAuthController::class, 'downloadFormPDF'])->name('admin.downloadForm');
    Route::get('admission-slip', [AdminAuthController::class, 'admissionSlip'])->name('admission-slip');
    Route::post('admission-slip', [AdminAuthController::class, 'admissionSlipSubmit'])->name('admission-slip.submit');


    Route::get('bill-pay', [AdminAuthController::class, 'billPay'])->name('bill-pay');

    Route::get('form-fees', [AdminAuthController::class, 'formFees'])->name('form-fees');
    Route::get('declaration', [AdminAuthController::class, 'declaration'])->name('declaration');
    Route::post('declaration', [AdminAuthController::class, 'declarationSubmit'])->name('declaration.submit');
});


// Show login page (GET)
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

// Handle login (POST) → same page (index.blade.php)
Route::post('/adminside', [AdminAuthController::class, 'login'])->name('admin.login.submit');


// Logout
Route::post('/adminside/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Sign Up (temporary redirect)


// Default route (optional) (Uncomment to make the default url to adminside only 1 can be used) 
// Route::get('/', function () {
//     return redirect()->route('adminside.index');
// });


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



Route::post('/adminside/set-paid', [AdminAuthController::class, 'setPaid'])->name('adminside.setPaid');
Route::post('/adminside/set-amount', [AdminAuthController::class, 'setAmount'])->name('adminside.setAmount');

Route::prefix('adminside')
    ->middleware(\App\Http\Middleware\BlockMobileDevices::class)
    ->group(function () {
        Route::get('/', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('adminside.dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });
