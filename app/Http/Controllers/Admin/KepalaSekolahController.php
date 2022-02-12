<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KepalaSekolah;
use Illuminate\Http\Request;

class KepalaSekolahController extends Controller
{
    public function index(){
        $items = KepalaSekolah::all();
    }
}
