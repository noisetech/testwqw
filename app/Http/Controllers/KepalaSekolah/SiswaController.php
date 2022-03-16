<?php

namespace App\Http\Controllers\KepalaSekolah;


use App\Http\Controllers\Controller;
use App\Siswa;
use App\Tahun;
use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use App\HasilPembelajaran;
use App\JadwalSiswa;
use Maatwebsite\Excel\Facades\Excel;


class SiswaController extends Controller
{
    public function halaman_opsi_siswa_kepala_sekolah()
    {
        $tahun = Tahun::all();

        return view('pages.kepala-sekolah.siswa.halaman_opsi_siswa_kepala_sekolah', [
            'tahun' => $tahun
        ]);
    }

    public function cari_opsi_siswa_kepala_sekolah(Request $request)
    {
        $inputan = $request->input('tahun');

        $siswas = Siswa::with('user')->whereYear('tgl_masuk', $inputan)->get();

        $total_siswa = $siswas->count();

        return view('pages.kepala-sekolah.siswa.data-berdasarkan-opsi', [
            'siswas' => $siswas,
            'total_siswa' => $total_siswa
        ]);
    }

    public function semua_data_siswa()
    {
        $items = Siswa::orderBy('tgl_masuk', 'asc')->get();

        $total_siswa = $items->count();
        return view('pages.kepala-sekolah.siswa.all-data', [
            'items' => $items,
            'total_siswa' => $total_siswa
        ]);
    }

    public function export()
    {
        return Excel::download(new SiswaExport, 'data-seluruh-siswa.xlsx');
    }

    public function detail_siswa_bagian_kepala_sekolah($id)
    {
        $siswa  = Siswa::find($id);

        return view('pages.kepala-sekolah.siswa.detail-siswa', [
            'siswa' => $siswa
        ]);
    }

    public function hasil_pembelajaran_siswa_bagian_kepala_sekolah($id)
    {
        $siswa  = Siswa::find($id);

        $jadwal_siswa = JadwalSiswa::whereHas('siswa', function ($q) use ($siswa) {
            return $q->where('siswa_id', $siswa);
        })->pluck('id');


        $hasil_pembelajaran_siswa = HasilPembelajaran::whereHas('jadwal_siswa', function ($q) use ($jadwal_siswa) {
            return $q->whereIn('jadwal_siswa_id', $jadwal_siswa);
        })->get();

        return view('pages.kepala-sekolah.siswa.hasil-pembelajaran', [
            'hasil_pembelajaran' => $hasil_pembelajaran_siswa
        ]);
    }
}