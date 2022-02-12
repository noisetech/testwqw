<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jadwal;
use App\JadwalSiswa;
use App\MataPelajaran;
use App\Semester;
use App\Tahun;
use Illuminate\Http\Request;

class OpsiJadwalSiswaController extends Controller
{
    public function halaman_opsi_jadwal_siswa(){
        $tahun = Tahun::all();
        $semester = Semester::all();
        $mata_pelajaran = MataPelajaran::all();

        return view('pages.admin.jadwal-siswa.opsi', [
            'tahun' => $tahun,
            'semester' => $semester,
            'mata_pelajaran' => $mata_pelajaran
        ]);
    }


    public function cari_opsi_jadwal_siswa(Request $request){
        $inputan1 = $request->input('tahun');
        $inputan2 = $request->input('semester');
        $inputan3 = $request->input('mata_pelajaran');

        $mata_pelajaran = MataPelajaran::where('mata_pelajaran', $inputan3)->first();
        $semester =   Semester::where('semester', $inputan2)->first();

        $jadwal = Jadwal::where('mata_pelajaran_id', $mata_pelajaran->id)
        ->whereIn('semester_id', [$semester->id])->pluck('id');


        if($jadwal->isEmpty()){
            return redirect()->back();
        }

        foreach ($jadwal as $key => $value) {
            $data_jadwal[] = $value;
        }

        $items = JadwalSiswa::whereHas('jadwal', function($q) use($data_jadwal){
            return $q->whereIn('jadwal_id', $data_jadwal);
        })->with(['siswa'])->where('tahun', $inputan1)->get();

        $total_siswa = $items->count();

        // dd($items);



        return view('pages.admin.jadwal-siswa.data-berdasarkan-opsi', [
            'items' => $items,
            'total_siswa' => $total_siswa
        ]);


    }
}
