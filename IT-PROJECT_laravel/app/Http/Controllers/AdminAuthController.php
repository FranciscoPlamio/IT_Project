<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Forms\Form1_01;

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
    ]);

    // Look up user in MongoDB
    $user = User::where('email', $request->email)->first();

    if ($user && \Hash::check($request->password, $user->password)) {
        // Save admin session
        $request->session()->put('admin', (string) $user->_id);

        return redirect()->route('adminside.dashboard');
    }

    return back()->with('error', 'Invalid credentials, please try again.');
}

    public function logout(Request $request)
{
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('admin.login'); // Goes back to index.blade.php
}


    public function dashboard(Request $request)
{
    if (!$request->session()->has('admin')) {
        return redirect()->route('admin.login');
    }

    // user
    $user = User::find($request->session()->get('admin'));

    // counts for pie chart
    $done = Form1_01::where('status', 'Done')->count();
    $progress = Form1_01::where('status', 'In Progress')->count();
    $pending = Form1_01::where('status', 'Pending')->count();

    $total = $done + $progress + $pending;
    $percentages = [
        'done'     => $total > 0 ? round(($done / $total) * 100) : 0,
        'progress' => $total > 0 ? round(($progress / $total) * 100) : 0,
        'pending'  => $total > 0 ? round(($pending / $total) * 100) : 0,
    ];

    // notifications (latest 5). also keep alias for older code that might expect 'recentApps'
    $notifications = Form1_01::orderBy('created_at', 'desc')->take(5)->get();
    $recentApps = $notifications;

    return view('adminside.dashboard', compact(
        'user',
        'percentages',
        'done',
        'progress',
        'pending',
        'notifications',
        'recentApps'
    ));
}
}
