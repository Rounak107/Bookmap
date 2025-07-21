<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('admin_email')) {
            return redirect()->route('admin.login.form');
        }

        return $next($request);
    }
}

