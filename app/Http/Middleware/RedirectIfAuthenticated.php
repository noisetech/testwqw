<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user() && Auth::user()->role == 'admin') {
                return redirect()->route('dashboard-admin');
            }

            if (Auth::user() && Auth::user()->role == 'siswa') {
                return redirect()->route('dashboard.siswa');
            }

            if (Auth::user() && Auth::user()->role == 'guru') {
                return redirect()->route('dashboard.guru');
            }

            if (Auth::user() && Auth::user()->role == 'kepala sekolah') {
                return redirect()->route('dashboard_kepala_sekolah');
            }
        }

        return $next($request);
    }
}
