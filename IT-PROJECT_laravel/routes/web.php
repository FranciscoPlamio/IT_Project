<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('homepage');
});

// Forms list page
Route::get('/forms-list', function () {
    return view('FormsList');
})->name('forms.list');

// Email Authentication routes
Route::get('/email-auth', function () {
    return view('emailAuthentication');
})->name('email-auth');

Route::post('/email-auth', function (Request $request) {
    return response()->json([
        'message' => 'Email authentication received',
        'email' => $request->input('email'),
    ]);
})->name('email-auth.submit');

Route::prefix('forms')->name('forms.')->group(function () {
    // GET routes to render form views
    Route::get('1-01', fn () => view('clientside.forms.Form1-01'))->name('1-01');
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

    Route::post('1-01', function (Request $request) {
        return response()->json([
            'message' => 'Form 1-01 received',
            'data' => $request->all(),
        ]);
    })->name('1-01.submit');

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
