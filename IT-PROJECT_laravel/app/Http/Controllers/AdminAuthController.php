<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Forms\Form1_01\Form101ApplicationDetails;

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
            'employee_id' => 'required',
            'password'    => 'required'
        ]);

        $user = User::where('employee_id', $request->employee_id)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->put('admin', $user->id);
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

    // --- counts for pie chart (use existing model) ---
    $done = Form101ApplicationDetails::where('status', 'Done')->count();
    $progress = Form101ApplicationDetails::where('status', 'In Progress')->count();
    $pending = Form101ApplicationDetails::where('status', 'Pending')->count();

    $total = $done + $progress + $pending;
    $percentages = [
        'done'     => $total > 0 ? round(($done / $total) * 100) : 0,
        'progress' => $total > 0 ? round(($progress / $total) * 100) : 0,
        'pending'  => $total > 0 ? round(($pending / $total) * 100) : 0,
    ];

    // --- recent applications for the "Certification Log" (last 10) ---
    $recentApps = Form101ApplicationDetails::orderBy('created_at', 'desc')->limit(10)->get();

    // keep your existing user retrieval
    $user = User::find($request->session()->get('admin'));

    return view('adminside.dashboard', compact(
        'user',
        'percentages',
        'done',
        'progress',
        'pending',
        'recentApps'
    ));
}
}
