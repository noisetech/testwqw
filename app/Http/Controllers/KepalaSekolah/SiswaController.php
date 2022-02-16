<?php

namespace App\Http\Controllers\KepalaSekolah;

use App\Exports\SiswaExport;
use App\Exports\SiswaView;
use App\Http\Controllers\Controller;
use App\Siswa;
use App\Tahun;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class SiswaController extends Controller
{
    public function halaman_opsi_siswa_kepala_sekolah(){
        $tahun = Tahun::all();

        return view('pages.kepala-sekolah.siswa.halaman_opsi_siswa_kepala_sekolah', [
            'tahun' => $tahun
        ]);
    }

    public function cari_opsi_siswa_kepala_sekolah(Request $request){
        $inputan = $request->input('tahun');

        $items = Siswa::whereYear('tgl_masuk', $inputan)->get();

        $total_siswa = $items->count();

        return view('pages.kepala-sekolah.siswa.data-berdasarkan-opsi', [
            'items' => $items,
            'total_siswa' => $total_siswa
        ]);
    }

    public function semua_data_siswa(){
        $items = Siswa::orderBy('tgl_masuk', 'asc')->get();

        $total_siswa = $items->count();
        return view('pages.kepala-sekolah.siswa.all-data', [
            'items' => $items,
            'total_siswa' => $total_siswa
        ]);
    }

    public function export_siswa_kepala_sekolah(){
        return Excel::download( new SiswaView, 'siswa.xlsx');
    }

}
