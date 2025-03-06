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

                switch ($user->getRoleName()) {
                    case 'Admin':
                        return redirect()->route('admin.dashboard');
                    case 'Staff':
                        return redirect()->route('staff.index');
                    default:
                        return redirect()->route('candidate.profile');
                }
            }
        }

        return $next($request);
    }
}