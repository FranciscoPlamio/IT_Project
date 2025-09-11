<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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


    public function dashboard(Request $request)
    {
        if (!$request->session()->has('admin')) {
            return redirect()->route('admin.login');
        }

        $user = User::find($request->session()->get('admin'));
        return view('adminside.dashboard', compact('user'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login'); 
    }



}
