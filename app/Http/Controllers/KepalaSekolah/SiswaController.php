<?php

namespace App\Http\Controllers\KepalaSekolah;


use App\Http\Controllers\Controller;
use App\Siswa;
use App\Tahun;
use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use App\HasilPembelajaran;
use App\Jadwal;
use App\JadwalSiswa;
use App\Semester;
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
        $items = Siswa::orderBy('nama_depan', 'ASC')->get();

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

    public function opsi_hasil_pembelajaran_siswa($id)
    {
        $siswa = Siswa::find($id);
        $tahun = Tahun::all();
        $semester = Semester::all();

        return view('pages.kepala-sekolah.siswa.opsi-hasil-pembelajaran', [
            'siswa' => $siswa,
            'tahun' => $tahun,
            'semester' => $semester
        ]);
    }


    public function hasil_pembelajaran_siswa_bagian_kepala_sekolah(Request $request, $id)
    {
        $bahan_id_siswa = $request->siswa_id;
        $semester = $request->input('semester');
        $tahun = $request->input('tahun');


        // cari jadwal berdasarkan semester yang diingikan
        $jadwal = Jadwal::whereHas('semester', function ($q) use ($semester) {
            return $q->where('semester_id', $semester);
        })->pluck('id');


        // cari jadwal siswa yang beralsi dengan jadwal diatas
        //  yang sama dengan $tahun
        // ambil semua id nya

        $jadwal_siswa = JadwalSiswa::whereHas('jadwal', function ($q) use ($jadwal) {
            return $q->whereIn('jadwal_id', $jadwal);
        })->whereHas('siswa', function ($q) use ($bahan_id_siswa) {
            return $q->where('siswa_id', $bahan_id_siswa);
        })->where('tahun', $tahun)->pluck('id');


        // cari hasil pembelajaran siswa
        // bedasarkan id yang didapatkan jadwal siswa
        $hasil_pembelajaran = HasilPembelajaran::whereHas('jadwal_siswa', function ($q) use ($jadwal_siswa) {
            return $q->whereIn('jadwal_siswa_id', $jadwal_siswa);
        })->get();

        return view('pages.kepala-sekolah.siswa.hasil-pembelajaran', [
            'hasl_pembelajaran' => $hasil_pembelajaran
        ]);
    }
}