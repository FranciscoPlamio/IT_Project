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
}
