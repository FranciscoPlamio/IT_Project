<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


// Transactions
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index')->middleware('email.verified');
Route::get('/transactions/search', [TransactionController::class, 'search'])->name('transactions.finder')->middleware('email.verified');
Route::post('/transactions', [TransactionController::class, 'destroy'])->name('transactions.delete')->middleware('email.verified');
Route::post('/transactions/complete', [TransactionController::class, 'complete'])->name('transactions.complete')->middleware('email.verified');
Route::post('/transactions/submit-gcash-proof-payment', [TransactionController::class, 'submitGcashProofPayment'])->name('transactions.submit.gcash.proof')->middleware('email.verified');
Route::get('/transactions/status', [TransactionController::class, 'checkStatus'])->name('transactions.status')->middleware('email.verified');
