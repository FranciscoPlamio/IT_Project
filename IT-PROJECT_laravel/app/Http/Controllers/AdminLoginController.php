<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|string',
            'password' => 'required|string'
        ]);

        // Dummy check (replace with DB or Auth logic)
        if ($request->employee_id === 'admin' && $request->password === 'password') {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['error' => 'Invalid credentials']);
    }
}
