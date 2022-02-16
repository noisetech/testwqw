<?php

namespace App\Http\Controllers\KepalaSekolah;

use App\Exports\GuruExport;
use App\Guru;
use App\Http\Controllers\Controller;
use App\Tahun;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    public function halaman_opsi_guru_kepala_sekolah(){
        $tahun = Tahun::all();

        return view('pages.kepala-sekolah.siswa.halaman_opsi_siswa_kepala_sekolah', [
            'tahun' => $tahun
        ]);
    }

    public function cari_opsi_guru_kepala_sekolah(Request $request){
        $inputan = $request->input('tahun');

        $items = Guru::whereYear('created_at', $inputan)->get();

        $total_guru = $items->count();

        return view('pages.kepala-sekolah.siswa.data-berdasarkan-opsi', [
            'items' => $items,
            'total_guru' => $total_guru
        ]);
    }



}
