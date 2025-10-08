<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Forms\Form1_01;
use App\Models\Forms\FormsTransactions;
use MongoDB\BSON\Regex;
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
    // if (!$request->session()->has('admin')) {
    //     return redirect()->route('admin.login');
    // }

    // Get admin user info
    $user = User::find($request->session()->get('admin'));

    // Fetch data from forms_transactions (lowercase status for MongoDB)
    $done = FormsTransactions::where('status', new Regex('^done$', 'i'))->count();
    $progress = FormsTransactions::where('status', new Regex('^in progress$', 'i'))->count();
    $pending = FormsTransactions::where('status', new Regex('^pending$', 'i'))->count();

    $total = $done + $progress + $pending;

    $percentages = [
        'done'     => $total > 0 ? round(($done / $total) * 100, 2) : 0,
        'progress' => $total > 0 ? round(($progress / $total) * 100, 2) : 0,
        'pending'  => $total > 0 ? round(($pending / $total) * 100, 2) : 0,
    ];

    // Get latest forms first (descending by created_at)
    $recentApps = FormsTransactions::orderBy('created_at', 'desc')->take(15)->get();

    return view('adminside.dashboard', compact(
        'user',
        'percentages',
        'done',
        'progress',
        'pending',
        'recentApps'
    ));
}
public function certRequest(Request $request)
{
    // Optional: check session
    // if (!$request->session()->has('admin')) {
    //     return redirect()->route('admin.login');
    // }

    $user = User::find($request->session()->get('admin'));

    $requests = FormsTransactions::orderBy('created_at', 'desc')->get();

    foreach ($requests as $req) {
        $req->formatted_date = $req->created_at
            ? \Carbon\Carbon::parse($req->created_at)->format('d F Y')
            : 'No date';
    }

    // Get the ID to highlight
    $highlight = $request->query('highlight');

    return view('adminside.cert-request', compact('user', 'requests', 'highlight'));
}
}
