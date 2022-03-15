<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jadwal;
use App\JadwalSiswa;
use App\MataPelajaran;
use App\Semester;
use App\Tahun;
use Illuminate\Http\Request;

class HasilPembelajaranSiswaBagianAdminController extends Controller
{
    public function halaman_opsi_hasil_pembelajaran_siswa()
    {
        $tahun = Tahun::all();
        $semester = Semester::all();
        $mata_pelajaran = MataPelajaran::all();

        return view('pages.admin.jadwal-siswa.opsi', [
            'tahun' => $tahun,
            'semester' => $semester,
            'mata_pelajaran' => $mata_pelajaran
        ]);
    }


    public function cari_hasil_pembelajaran_siswa(Request $request)
    {



        $inputan1 = $request->input('tahun');
        $inputan2 = $request->input('semester');
        $inputan3 = $request->input('mata_pelajaran');


        $bahan_validasi  = array(
            'inputan_tahun' => $inputan1,
            'semester' => $inputan2,
            'mata_pelajaran' => $inputan3
        );

        // bagian pengecekan apakah data ada yang diniputkan kalo gk null
        if (
            isset($bahan_validasi['inputan_tahun'])  && $bahan_validasi['inputan_tahun'] !== null
            and isset($bahan_validasi['semester'])  && $bahan_validasi['semester'] !== null
            and isset($bahan_validasi['mata_pelajaran'])  && $bahan_validasi['mata_pelajaran'] !== null
        )
        // kalo semua inputan sudah dikirimkan
        // maka eksekusi lanjutan query

        {
            $mata_pelajaran = MataPelajaran::where('mata_pelajaran', $inputan3)->first();
            $semester =   Semester::where('semester', $inputan2)->first();

            $jadwal = Jadwal::where('mata_pelajaran_id', $mata_pelajaran->id)
                ->whereIn('semester_id', [$semester->id])->pluck('id');


            if ($jadwal->isEmpty()) {
                return redirect()->back()->with('status', 'Mohon maaf data tidak ditemukan');
            }

            foreach ($jadwal as $key => $value) {
                $data_jadwal[] = $value;
            }

            $items = JadwalSiswa::whereHas('jadwal', function ($q) use ($data_jadwal) {
                return $q->whereIn('jadwal_id', $data_jadwal);
            })->with(['siswa', 'hasil_pembelajaran'])->where('tahun', $inputan1)->get();

            // hitung total siswa yang mengambil mata pelajaran
            $total_siswa = $items->count();
        } else {
            return redirect()->back()->with('error', 'Harapan isikan semua inputan');
        }

        return view('pages.admin.jadwal-siswa.data-berdasarkan-opsi', [
            'items' => $items,
            'total_siswa' => $total_siswa
        ]);
    }
}