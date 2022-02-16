<?php

namespace App\Http\Controllers\KepalaSekolah;

use App\Http\Controllers\Controller;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardKepalaSekolahController extends Controller
{
    public function index(){



        return view('pages.kepala-sekolah.dashboard');
    }
}
