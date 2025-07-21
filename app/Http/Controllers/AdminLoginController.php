<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\AdminLogin;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
{
    // ✅ Only validate email (no password)
    $request->validate([
        'email' => 'required|email',
    ]);

    // ✅ Find admin by email only
    $admin = \App\Models\AdminLogin::where('email', $request->email)->first();

    if ($admin) {
        session(['admin_email' => $admin->email]);
        //dd('Redirect working');

        // ✅ Redirect to booking management dashboard
        return redirect('/admin/bookings/yend8rv-29s6f1-d68s');
    }

    return back()->withErrors(['email' => 'Invalid admin email']);
}

    public function logout(Request $request)
    {
        Session::forget('admin_email');
        return redirect()->route('admin.login.form');
    }
}
