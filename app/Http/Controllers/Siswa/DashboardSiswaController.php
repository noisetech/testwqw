<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Siswa;
use App\TagihanAdminitrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardSiswaController extends Controller
{
    public function dashboard_siswa(Request $request)
    {
        // menangkap user yang sedang login
        $user = Auth::user()->id;
        $siswa = Siswa::where('user_id', $user)->pluck('id');

        $data_siswa = Siswa::whereIn('id', $siswa)->first();


        // mengecek tagihan siswa yang login
        $tagihan = TagihanAdminitrasi::where('status', 'belum lunas')->whereIn('siswa_id', $siswa)->count();

        // jika tagihan lebih dari 0
        // tidak diperbolehkan login
        if ($tagihan > 0) {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            Session::flash('error', 'error');

            return redirect('/login');
        }


        return view('pages.siswa.dashboard', [
            'data_siswa' => $data_siswa
        ]);
    }
}
