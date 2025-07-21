<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminLogin;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // 🔐 Prevent access without admin login session
        if (!session()->has('admin_email')) {
            return redirect()->route('admin.login.form');
        }

        $admins = AdminLogin::all();
        return view('admin.dashboard', compact('admins'));
    }
}
