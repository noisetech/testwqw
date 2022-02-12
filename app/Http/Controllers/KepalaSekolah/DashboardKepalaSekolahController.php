<?php

namespace App\Http\Controllers\KepalaSekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardKepalaSekolahController extends Controller
{
    public function index(){
        return view('pages.kepala-sekolah.dashboard');
    }
}
