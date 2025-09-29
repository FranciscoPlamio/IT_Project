<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Form1_01_Controller;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\EmailController;
use App\Http\Middleware\BlockMobileDevices;

Route::get('/', function () {
     return view('welcome');
});

// Forms list page
Route::get('/forms-list', function () {
    return view('FormsList');
})->name('forms.list')->middleware('email.verified');

// Forms showcase gallery
Route::get('/Displayforms', function () {
    return view('Displayforms');
})->name('forms.display')->middleware('email.verified');

// Simple GCash payment demo page
Route::get('/payment/gcash', function () {
    return view('payment.gcash');
})->name('payment.gcash');

// Email Authentication routes
Route::get('/email-auth', [EmailController::class, 'showEmailAuth'])->name('email-auth');
Route::post('/email-auth', [EmailController::class, 'sendAuthEmail'])->name('email-auth.submit');
Route::get('/email-auth/verify/{token}', [EmailController::class, 'verifyEmail'])->name('email-auth.verify');
Route::get('/email-auth/verify-script/{token}', [EmailController::class, 'verifyEmailScript'])->name('email-auth.verify-script');
Route::get('/email-auth/status', [EmailController::class, 'checkEmailStatus'])->name('email-auth.status');
Route::post('/email-auth/clear', [EmailController::class, 'clearEmailVerification'])->name('email-auth.clear');

Route::prefix('forms')->name('forms.')->middleware('email.verified')->group(function () {
    
    // GET routes to render form views
    Route::get('1-01', fn () => view('clientside.forms.Form1-01'))->name('1-01');
    Route::get('1-01/edit', [Form1_01_Controller::class, 'edit'])->name('1-01.edit');
    Route::get('1-01/validation', [Form1_01_Controller::class, 'showValidation'])->name('1-01.validation');

    Route::get('1-02', fn () => view('clientside.forms.Form1-02'))->name('1-02');
    Route::get('1-03', fn () => view('clientside.forms.Form1-03'))->name('1-03');
    Route::get('1-09', fn () => view('clientside.forms.Form1-09'))->name('1-09');
    Route::get('1-11', fn () => view('clientside.forms.Form1-11'))->name('1-11');
    Route::get('1-13', fn () => view('clientside.forms.Form1-13'))->name('1-13');
    Route::get('1-14', fn () => view('clientside.forms.Form1-14'))->name('1-14');
    Route::get('1-16', fn () => view('clientside.forms.Form1-16'))->name('1-16');
    Route::get('1-18', fn () => view('clientside.forms.Form1-18'))->name('1-18');
    Route::get('1-19', fn () => view('clientside.forms.Form1-19'))->name('1-19');
    Route::get('1-20', fn () => view('clientside.forms.Form1-20'))->name('1-20');
    Route::get('1-21', fn () => view('clientside.forms.Form1-21'))->name('1-21');
    Route::get('1-22', fn () => view('clientside.forms.Form1-22'))->name('1-22');
    Route::get('1-24', fn () => view('clientside.forms.Form1-24'))->name('1-24');
    Route::get('1-25', fn () => view('clientside.forms.Form1-25'))->name('1-25');
    Route::get('1-25/text-message', fn () => view('clientside.forms.Form1-25(TextMessage)'))->name('1-25-text-message');

    Route::post('1-01', [Form1_01_Controller::class, 'storeAll'])->name('1-01.submit');

    Route::post('1-02', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-02 received',
            'data' => $request->all(),
        ]);
    })->name('1-02.submit');

    Route::post('1-03', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-03 received',
            'data' => $request->all(),
        ]);
    })->name('1-03.submit');

    Route::post('1-09', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-09 received',
            'data' => $request->all(),
        ]);
    })->name('1-09.submit');

    Route::post('1-11', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-11 received',
            'data' => $request->all(),
        ]);
    })->name('1-11.submit');

    Route::post('1-13', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-13 received',
            'data' => $request->all(),
        ]);
    })->name('1-13.submit');

    Route::post('1-14', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-14 received',
            'data' => $request->all(),
        ]);
    })->name('1-14.submit');

    Route::post('1-16', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-16 received',
            'data' => $request->all(),
        ]);
    })->name('1-16.submit');

    Route::post('1-18', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-18 received',
            'data' => $request->all(),
        ]);
    })->name('1-18.submit');

    Route::post('1-19', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-19 received',
            'data' => $request->all(),
        ]);
    })->name('1-19.submit');

    Route::post('1-20', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-20 received',
            'data' => $request->all(),
        ]);
    })->name('1-20.submit');

    Route::post('1-21', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-21 received',
            'data' => $request->all(),
        ]);
    })->name('1-21.submit');

    Route::post('1-22', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-22 received',
            'data' => $request->all(),
        ]);
    })->name('1-22.submit');

    Route::post('1-24', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-24 received',
            'data' => $request->all(),
        ]);
    })->name('1-24.submit');

    Route::post('1-25', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-25 received',
            'data' => $request->all(),
        ]);
    })->name('1-25.submit');

    Route::post('1-25/text-message', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-25 (Text Message) received',
            'data' => $request->all(),
        ]);
    })->name('1-25-text-message.submit');
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