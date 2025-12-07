<?php

namespace App\Http\Controllers;

use App\Helpers\FormManager;
use App\Models\Forms\FormsTransactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

class TransactionController extends Controller
{

    public function getUser()
    {
        // User email
        $userEmail = session('email_verified');
        $user = User::where('email', $userEmail)->first();
        // Check if user exists
        if (!$user) {
            // Throw a manual exception if not found
            throw new \Exception('User not found in the database. Please authenticate your email again');
        }
        return $user;
    }

    //
    public function index()
    {
        $user = $this->getUser();
        $form = null;
        $transactions = FormsTransactions::where('user_id', $user->_id)->whereNotIn('status', ['cancelled'])->latest()->first();
        if ($transactions) {

            $formModel = FormManager::getFormModel(ucfirst($transactions->form_type));
            $form = $formModel::find($transactions->form_id);
        }

        return view('payment.transaction', compact('transactions', 'form'));
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

    public function destroy(Request $request)
    {
        $userEmail = session('user_email');
        //Form Transaction
        $transaction = FormsTransactions::where('email', $userEmail)->where('status', 'pending')
            ->latest()
            ->first();
        //Delete
        $transaction->update(['status' => 'cancelled']);

        return redirect()->route('homepage')
            ->with('message', 'Your transaction was cancelled successfully.');
    }


    /**
     * Get transaction status for polling/auto-refresh
     */
    public function checkStatus(Request $request)
    {
        $reference = $request->input('reference');

        if (!$reference) {
            return response()->json([
                'success' => false,
                'message' => 'Missing reference number'
            ], 400);
        }

        $transaction = FormsTransactions::where('payment_reference', $reference)->first();

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'payment_amount' => $transaction->payment_amount,
            'payment_status' => $transaction->payment_status,
            'status' => $transaction->status,
        ]);
    }

    public function submitGcashProofPayment(Request $request)
    {
        $message = $this->validateAndStoreUploadedFile($request, $request->form_token);

        if ($message) {
            // Validation failed
            return redirect()->back()->with('message', $message);
        }
        //Form Transaction
        $transaction = FormsTransactions::where('form_token', $request->form_token)
            ->latest()
            ->first();
        //Delete
        $transaction->update(['payment_status' => 'paid']);


        return redirect()->back()->with('message', 'Proof of Payment Sent');
    }

    private function validateAndStoreUploadedFile($request, $formToken)
    {

        $rules = [];

        foreach ($request->file() as $key => $file) {
            $rules[$key] = 'file|mimes:pdf,jpg,png|max:2048';
        }
        try {
            // Validate dynamically
            $validated = $request->validate($rules);

            // Store files if validation passes
            foreach ($request->file() as $key => $file) {
                $extension = $file->getClientOriginalExtension();
                $fileName = $key . '_' . time() . '.' . $extension;
                $path = $file->storeAs('forms/' . $formToken, $fileName, 'local');
            }

            return null;
        } catch (ValidationException $e) {
            $message = "Validation failed: files must be no larger than 5 MB and must be in .png, .jpg, or .pdf";
            return $message;
        }
    }
}
