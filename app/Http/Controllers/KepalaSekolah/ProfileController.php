<?php

namespace App\Http\Controllers\KepalaSekolah;

use App\Http\Controllers\Controller;
use App\KepalaSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        // get user data user yang login
        $auth = Auth::user();

        $data =  KepalaSekolah::whereHas('user', function($q) use($auth) {
            return $q->where('user_id', $auth->id);
        });

        return view('pages.kepala-sekolah.profile.index', [
            'data' => $data
        ]);
    }
}
