<?php

namespace App\Http\Controllers;

use App\Models\Forms\FormsTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function index()
    {
        $userEmail = session('user_email'); // Assuming you store this when they verified

        $transactions = FormsTransactions::where('email', $userEmail)->latest()->first();

        return view('payment.transaction', compact('transactions'));
    }

    public function search(Request $request)
    {
        // If there’s no query yet, just show the form
        if (!$request->has('payment_reference')) {
            return view('payment.transactionFinder');
        }

        $reference = $request->query('payment_reference');
        $userEmail = session('user_email'); // Assuming you store this when they verified

        $transactions = FormsTransactions::where('payment_reference', $reference)->latest()->first();


        if (!$transactions) {
            return back()->with('error', 'Transaction not found.');
        }

        return view('payment.transaction',  compact('transactions'));
    }
}
