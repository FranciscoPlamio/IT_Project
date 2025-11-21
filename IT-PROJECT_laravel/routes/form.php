<?php

use App\Http\Controllers\FormsController;
use Illuminate\Support\Facades\Route;

// Form showcase
Route::get('/display-forms', [FormsController::class, 'index'])->name('display.forms');
Route::get('{formType}/information', [FormsController::class, 'showFormInformation'])->name('showFormInformation');

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
