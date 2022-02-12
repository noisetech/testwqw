<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Siswa;
use App\Tahun;
use Illuminate\Http\Request;

class OpsiSiswaController extends Controller
{
    public function halaman_opsi_siswa_admin(){
        $tahun = Tahun::all();

        return view('pages.admin.siswa.opsi', [
            'tahun' => $tahun
        ]);
    }

    public function cari_opsi_siswa_by_tahun(Request $request){
        $inputan = $request->input('tahun');

        $items = Siswa::whereYear('tgl_masuk', $inputan)->get();
        $total_siswa = $items->count();

        return view('pages.admin.siswa.data-siswa-berdasarkan-opsi', [
            'items' => $items,
            'total_siswa' => $total_siswa
        ]);
    }




}
