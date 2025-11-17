<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Forms\Form1_01;
use App\Models\Forms\FormsTransactions;
use MongoDB\BSON\Regex;
use MongoDB\BSON\ObjectId;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class AdminAuthController extends Controller   // <-- rename this
{
    // Show login page
    public function showLoginForm()
    {
        return view('adminside.index');   // stays correct
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email is required.',
            'email.email'    => 'Please enter a valid email address.',
            'password.required' => 'Password is required.'
        ]);

        // Look up user in MongoDB
        $user = User::where('email', $request->email)->first();
        if ($user && \Hash::check($request->password, $user->password)) {
            // Save admin session
            $request->session()->put('admin', (string) $user->_id);
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        // Invalid credentials
        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login'); // Goes back to index.blade.php
    }


    public function dashboard(Request $request)
    {
        // Optional: login session validation
        if (!$request->session()->has('admin')) {
            return redirect()->route('admin.login');
        }

        // Get admin user info
        $user = User::find($request->session()->get('admin'));

        // Fetch data from forms_transactions (case-insensitive)
        $done = FormsTransactions::where('status', new Regex('^done$', 'i'))->count();
        $progress = FormsTransactions::where('status', new Regex('^in progress$', 'i'))->count();
        $cancel = FormsTransactions::where('status', new Regex('^cancel$', 'i'))->count();

        $total = $done + $progress + $cancel;

        $percentages = [
            'done'     => $total > 0 ? round(($done / $total) * 100, 2) : 0,
            'progress' => $total > 0 ? round(($progress / $total) * 100, 2) : 0,
            'cancel'   => $total > 0 ? round(($cancel / $total) * 100, 2) : 0,
        ];

        // Get latest forms (15 most recent)
        $recentApps = FormsTransactions::orderBy('created_at', 'desc')->take(15)->get();

        // Normalize statuses and assign icons/classes
        foreach ($recentApps as $app) {
            $status = strtolower(trim($app->status ?? 'in progress')); // default = in progress
            $app->normalized_status = $status;

            switch ($status) {
                case 'done':
                    $app->status_class = 'done';
                    $app->status_icon = 'Done.png';
                    break;

                case 'cancelled':
                    $app->status_class = 'cancelled';
                    $app->status_icon = 'Cancel.png';
                    break;

                default:
                    $app->status_class = 'progress';
                    $app->status_icon = 'In-prog.png';
                    break;
            }
        }

        // Return everything to the dashboard view
        return view('adminside.dashboard', compact(
            'user',
            'percentages',
            'done',
            'progress',
            'cancel',
            'recentApps'
        ));
    }

    public function certRequest(Request $request)
    {
        if (!$request->session()->has('admin')) {
            return redirect()->route('admin.login');
        }

        $user = User::find($request->session()->get('admin'));

        // ✅ Use case-insensitive regex instead of whereRaw
        $requests = \App\Models\Forms\FormsTransactions::where('status', new Regex('^in progress$', 'i'))
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($requests as $req) {
            $req->formatted_date = $req->created_at
                ? \Carbon\Carbon::parse($req->created_at)->format('d F Y')
                : 'No date';
        }

        $highlight = $request->query('highlight');

        return view('adminside.cert-request', compact('user', 'requests', 'highlight'));
    }

    public function requestManagement(Request $request)
    {
        if (!$request->session()->has('admin')) {
            return redirect()->route('admin.login');
        }

        $user = User::find($request->session()->get('admin'));


        // Latest requests exclude completed or cancelled
        $latestRequests = \App\Models\Forms\FormsTransactions::whereNotIn('status', ['done', 'cancelled'])
            ->orderBy('created_at', 'desc')
            ->with('user')
            ->get();

        // Gets the form data using form id
        $latestRequests->each(function ($transaction) {
            $formClass = \App\Helpers\FormManager::getFormModel($transaction->form_type);
            // If form_type is invalid, skip
            if ($formClass) {
                $transaction->form = $formClass::find($transaction->form_id);
            } else {
                $transaction->form = null;
            }
        });

        $highlight = $request->query('highlight');

        return view('adminside.req-management', compact('user', 'latestRequests', 'highlight'));
    }

    public function requestHistory(Request $request)
    {
        if (!$request->session()->has('admin')) {
            return redirect()->route('admin.login');
        }

        $user = User::find($request->session()->get('admin'));

        // History includes completed or cancelled records
        $historyRequests = \App\Models\Forms\FormsTransactions::whereIn('status', ['done', 'cancel', 'cancelled'])
            ->orderBy('updated_at', 'desc')
            ->get();

        $highlight = $request->query('highlight');

        return view('adminside.req-history', compact('user', 'historyRequests', 'highlight'));
    }


    public function updateStatus(Request $request)
    {
        try {
            $form = \App\Models\Forms\FormsTransactions::where('_id', $request->form_id)->first();
            if (!$form) {
                return response()->json(['success' => false, 'message' => 'Form not found']);
            }

            $statusFlow = ['pending', 'processing', 'done'];
            $allowedStatuses = array_merge($statusFlow, ['cancelled']);
            $newStatus = strtolower(trim($request->status));

            if (!in_array($newStatus, $allowedStatuses, true)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid status value'
                ]);
            }

            $currentStatus = strtolower(trim($form->status ?? 'pending'));

            if (!in_array($currentStatus, $allowedStatuses, true)) {
                $currentStatus = 'pending';
            }

            if ($currentStatus === 'cancelled') {
                if ($newStatus === 'cancelled') {
                    return response()->json([
                        'success' => true,
                        'message' => 'Request is already cancelled.',
                        'status' => $form->status,
                    ]);
                }

                return response()->json([
                    'success' => false,
                    'message' => 'Cancelled requests cannot be updated.'
                ]);
            }

            if ($currentStatus === 'done' && $newStatus !== 'done') {
                return response()->json([
                    'success' => false,
                    'message' => 'Request is already marked as done.'
                ]);
            }

            if ($newStatus === 'cancelled') {
                $form->status = $newStatus;
                $form->updated_at = now();
                $form->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Status updated to cancelled',
                    'status' => $form->status,
                    'updated_at' => $form->updated_at
                ]);
            }

            $currentIndex = array_search($currentStatus, $statusFlow, true);
            $nextIndex = array_search($newStatus, $statusFlow, true);

            if ($currentIndex === $nextIndex) {
                return response()->json([
                    'success' => true,
                    'message' => "Status remains {$newStatus}",
                    'status' => $form->status,
                ]);
            }

            if ($nextIndex < $currentIndex) {
                return response()->json([
                    'success' => false,
                    'message' => 'Status cannot be reverted.'
                ]);
            }

            if ($nextIndex - $currentIndex > 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please follow the status order: pending → processing → done.'
                ]);
            }

            // Update status and timestamp

            //      Check if payment method is cash
            if ($form->payment_method === "cash") {
                $form->payment_status = "paid";
            }

            $form->status = $newStatus;
            $form->updated_at = now();
            $form->save();

            return response()->json([
                'success' => true,
                'message' => "Status updated to {$newStatus}",
                'status' => $form->status,
                'updated_at' => $form->updated_at
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage()
            ]);
        }
    }

    public function getFormData(Request $request)
    {
        try {
            if (!$request->session()->has('admin')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized access'
                ], 403);
            }

            $requestId = $request->query('request_id') ?? $request->input('request_id');

            if (!$requestId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Missing request ID'
                ], 400);
            }

            // Find the transaction record
            $transaction = FormsTransactions::where('_id', $requestId)->first();

            if (!$transaction) {
                return response()->json([
                    'success' => false,
                    'message' => 'Request not found'
                ], 404);
            }

            if (!$transaction->form_token || !$transaction->form_type) {
                return response()->json([
                    'success' => false,
                    'message' => 'Form data not available for this request'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'form_token' => $transaction->form_token,
                'form_type' => $transaction->form_type,
                'request_id' => (string) $transaction->_id
            ]);
        } catch (\Exception $e) {
            Log::error('Get form data error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function downloadFormPDF(Request $request)
    {
        try {
            if (!$request->session()->has('admin')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized access'
                ], 403);
            }

            $token = $request->query('token');
            $formType = $request->query('formType');

            if (!$token || !$formType) {
                return response()->json([
                    'success' => false,
                    'message' => 'Missing token or form type'
                ], 400);
            }

            // Clean form type (remove "Form" prefix if present)
            $formType = str_replace(['Form', 'form'], '', $formType);
            $formType = str_replace('-', '_', $formType);

            // Get form model using FormManager
            $formModel = \App\Helpers\FormManager::getFormModel('form' . $formType);

            // Find form by token
            $form = $formModel::where('form_token', $token)->first();

            if (!$form) {
                return response()->json([
                    'success' => false,
                    'message' => 'Form not found'
                ], 404);
            }

            // Convert model to array for PDF generation
            $formData = $form->toArray();

            try {
                $pdfGenerator = new \App\Services\PDFGenerator();

                // Check if template exists
                if (!$pdfGenerator->templateExists($formType)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'PDF template not found for this form type'
                    ], 404);
                }

                // Generate PDF using the form data
                $pdf = $pdfGenerator->generatePDF($formData, $formType);

                // Generate filename
                $filename = "NTC_Form_" . str_replace('_', '-', $formType) . "_" . date('Y-m-d') . ".pdf";

                // Return PDF as download
                return response($pdf->Output('S'), 200)
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
            } catch (\Exception $e) {
                Log::error('PDF generation error: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to generate PDF: ' . $e->getMessage()
                ], 500);
            }
        } catch (\Exception $e) {
            Log::error('Download form PDF error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function billPay(Request $request)
    {
        if (!$request->session()->has('admin')) {
            return redirect()->route('admin.login');
        }

        // Fetch records with paid, pending, or unpaid statuses
        $payments = \App\Models\Forms\FormsTransactions::whereIn('payment_status', ['paid', 'pending', 'unpaid'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Format display date: show only if paid
        foreach ($payments as $p) {
            if (strtolower($p->payment_status ?? '') === 'paid' && !empty($p->payment_date)) {
                $p->formatted_date = \Carbon\Carbon::parse($p->payment_date)->format('M d Y');
            } else {
                $p->formatted_date = ''; // empty if not paid
            }
        }

        return view('adminside.bill-pay', compact('payments'));
    }

    public function setPaid(Request $request)
    {
        $formId = $request->input('form_id');

        if (!$formId) {
            return response()->json(['success' => false, 'message' => 'Missing form id'], 400);
        }

        $form = FormsTransactions::where('_id', $formId)->first();

        if (!$form) {
            try {
                $maybeOid = new \MongoDB\BSON\ObjectId($formId);
                $form = FormsTransactions::where('_id', $maybeOid)->first();
            } catch (\Throwable $e) {
                // ignored
            }
        }

        if (!$form) {
            return response()->json(['success' => false, 'message' => 'Form not found'], 404);
        }

        $current = strtolower((string)($form->payment_status ?? 'pending'));
        if ($current === 'paid') {
            return response()->json(['success' => false, 'message' => 'Already paid'], 400);
        }

        // ✅ Update both status and payment_date
        $form->payment_status = 'paid';
        $form->payment_date = now(); // record payment time
        $form->updated_at = now();
        $form->save();

        return response()->json([
            'success' => true,
            'message' => 'Payment marked as paid',
            'payment_status' => $form->payment_status,
            'payment_date' => $form->payment_date->format('M d Y'),
        ]);
    }

    public function setAmount(Request $request)
    {
        $formId = $request->input('form_id');
        $paymentAmount = $request->input('payment_amount');

        if (!$formId) {
            return response()->json(['success' => false, 'message' => 'Missing form id'], 400);
        }

        if ($paymentAmount === null || $paymentAmount === '') {
            return response()->json(['success' => false, 'message' => 'Missing payment amount'], 400);
        }

        $parsedAmount = floatval($paymentAmount);
        if ($parsedAmount < 0) {
            return response()->json(['success' => false, 'message' => 'Payment amount must be positive'], 400);
        }

        $form = FormsTransactions::where('_id', $formId)->first();

        if (!$form) {
            try {
                $maybeOid = new \MongoDB\BSON\ObjectId($formId);
                $form = FormsTransactions::where('_id', $maybeOid)->first();
            } catch (\Throwable $e) {
                // ignored
            }
        }

        if (!$form) {
            return response()->json(['success' => false, 'message' => 'Form not found'], 404);
        }

        // Update payment_amount
        $form->payment_amount = $parsedAmount;
        $form->updated_at = now();
        $form->save();

        return response()->json([
            'success' => true,
            'message' => 'Payment amount updated successfully',
            'payment_amount' => $form->payment_amount,
        ]);
    }

    public function formFees(Request $request)
    {
        if (!$request->session()->has('admin')) {
            return redirect()->route('admin.login');
        }

        $user = User::find($request->session()->get('admin'));

        return view('adminside.form-fees', compact('user'));
    }

    public function showRequestAttachments(Request $request, $formToken)
    {
        $folderPath = "forms/{$formToken}";
        if (!Storage::exists($folderPath)) {
            abort(404, "No files found for this form.");
        }

        $files = Storage::files($folderPath);
        return view('adminside.req-management-attachments', compact('files'));
    }

    public function viewFile(Request $request)
    {
        $path = $request->query('path');
        if (!Storage::exists($path)) {
            abort(404);
        }

        $mime = Storage::mimeType($path);
        return response(Storage::get($path))
            ->header('Content-Type', $mime)
            ->header('Content-Disposition', 'inline; filename="' . basename($path) . '"');
    }
}
