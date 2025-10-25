<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Forms\Form1_01;
use App\Models\Forms\FormsTransactions;
use MongoDB\BSON\Regex;
use MongoDB\BSON\ObjectId;
use Carbon\Carbon;

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

            return redirect()->route('adminside.dashboard');
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

                case 'cancel':
                    $app->status_class = 'cancel';
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

        //  Latest (not done or cancel)
        $latestRequests = \App\Models\Forms\FormsTransactions::whereNotIn('status', ['done', 'cancel'])
            ->orderBy('created_at', 'desc')
            ->get();

        //  History (done or cancel)
        $historyRequests = \App\Models\Forms\FormsTransactions::whereIn('status', ['done', 'cancel'])
            ->orderBy('updated_at', 'desc')
            ->get();

        $highlight = $request->query('highlight');
        $section = $request->query('section', 'latest'); // 'history' or 'latest'

        return view('adminside.req-management', compact('user', 'latestRequests', 'historyRequests', 'highlight', 'section'));
    }


    public function updateStatus(Request $request)
    {
        try {
            $form = \App\Models\Forms\FormsTransactions::where('_id', $request->form_id)->first();

            if (!$form) {
                return response()->json(['success' => false, 'message' => 'Form not found']);
            }

            // Make sure status is explicitly set (cancel or done)
            $newStatus = strtolower(trim($request->status));

            if (!in_array($newStatus, ['done', 'cancel'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid status value'
                ]);
            }

            // Update status and timestamp
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
}
