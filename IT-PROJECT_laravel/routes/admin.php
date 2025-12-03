<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


// Adminside Pages
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    // Dashboard 
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('cert-request', [AdminController::class, 'certRequest'])->name('cert-request');

    //Request management
    Route::get('req-management', [AdminController::class, 'requestManagement'])->name('req-management');
    Route::get('req-management/{formToken}', [AdminController::class, 'showRequestAttachments'])->name('req.attachments');
    Route::post('req-management/save-remarks/{formId}/', [AdminController::class, 'saveRemarks'])->name('remarks.save');
    Route::get('view-file', [AdminController::class, 'viewFile'])->name('viewFile');
    Route::post('update-status', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
    Route::post('forms/{formId}/approve', [AdminController::class, 'approveForm']);

    //Request history page
    Route::get('req-history', [AdminController::class, 'requestHistory'])->name('req-history');


    //Admission slip
    Route::get('admission-slip', [AdminController::class, 'admissionSlip'])->name('admission-slip');
    Route::post('admission-slip', [AdminController::class, 'admissionSlipSubmit'])->name('admission-slip.submit');

    // Declaration
    Route::get('declaration', [AdminController::class, 'declaration'])->name('declaration');
    Route::post('declaration', [AdminController::class, 'declarationSubmit'])->name('declaration.submit');

    Route::get('bill-pay', [AdminController::class, 'billPay'])->name('bill-pay');
    Route::get('form-fees', [AdminController::class, 'formFees'])->name('form-fees');
    Route::get('get-form-data', [AdminController::class, 'getFormData'])->name('admin.getFormData');
    Route::get('download-form', [AdminController::class, 'downloadFormPDF'])->name('admin.downloadForm');
    Route::get('test', [AdminController::class, 'test'])->name('test');
});


// Show login page (GET)
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');

// Handle login (POST) → same page (index.blade.php)
Route::post('/adminside', [AdminController::class, 'login'])->name('admin.login.submit');


// Logout
Route::post('/adminside/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::post('/adminside/set-paid', [AdminController::class, 'setPaid'])->name('adminside.setPaid');
Route::post('/adminside/set-amount', [AdminController::class, 'setAmount'])->name('adminside.setAmount');

Route::prefix('adminside')
    ->middleware(\App\Http\Middleware\BlockMobileDevices::class)
    ->group(function () {
        Route::get('/', [AdminController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('adminside.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
