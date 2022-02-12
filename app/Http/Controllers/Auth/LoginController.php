<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Siswa;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use UxWeb\SweetAlert\SweetAlert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {
        if (Auth::user() && Auth::user()->role == 'admin') {
            Session::flash('status','success');
            return $this->redirectTo = route('dashboard-admin');
        }

        if (Auth::user() && Auth::user()->role == 'siswa') {
            Session::flash('status','success');
            return $this->redirectTo = route('dashboard.siswa');
        }

        if (Auth::user() && Auth::user()->role == 'guru') {
            Session::flash('status','success');
            return $this->redirectTo = route('dashboard.guru');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
