<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

                if ($user->role === 'admin') {
                    return redirect('/dashboard/admin');
                } elseif ($user->role === 'manajer') {
                    return redirect('/dashboard/manajer');
                } else {
                    return redirect('/dashboard/karyawan');
                }
            }
        }

        return $next($request);
    }
}
