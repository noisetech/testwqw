<?php

namespace App\Http\Controllers\Guru;

use App\Guru;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardGuruController extends Controller
{
    public function dashboard_guru(){
        $guru = Guru::where('user_id', Auth::user()->id)->first();
        return view('pages.guru.dashboard', [
            'guru' => $guru
        ]);
    }
}
