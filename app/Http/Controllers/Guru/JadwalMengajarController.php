<?php

namespace App\Http\Controllers\Guru;

use App\HasilPembelajaran;
use App\Http\Controllers\Controller;
use App\Jadwal;
use App\JadwalSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalMengajarController extends Controller
{
    public function jadwal_mengajar(){
        $user_login = Auth::user();
        $id_guru = $user_login->guru->id;

        $items = Jadwal::whereHas('guru', function($q) use($id_guru){
            return $q->where('guru_id', $id_guru);
        })->with(['mata_pelajaran', 'kelas', 'hari', 'semester'])
        ->get();

        return view('pages.guru.jadwal-mengajar.index', [
            'items' => $items
        ]);
    }

    public function detail_jadwal(Request $request, $id){
        $user = Auth::user();
        $guru_id = $user->guru->id;
        $item = Jadwal::with(['jadwal_siswa'])->where('guru_id', $guru_id)->find($id);
        return view('pages.guru.jadwal-mengajar.detial-jadwal', [
            'item' => $item
        ]);
    }

    public function halaman_input_nilai_siswa(Request $request, $id){
        $data = JadwalSiswa::find($id);

        return view('pages.guru.jadwal-mengajar.input_nilai_siswa', [
            'data' => $data
        ]);
    }

    public function proses_input_nilai_siswa( Request $request, $id){

        $item = JadwalSiswa::with(['hasil_pembelajaran'])->find($id);
        $id_jadwal = $item->jadwal->id;

        $data = new HasilPembelajaran();
        $data->jadwal_siswa_id = $request->jadwal_siswa_id;
        $data->tugas = $request->tugas;
        $data->uts = $request->uts;
        $data->uas = $request->uas;
        $data['rata'] =  $data->tugas*0.25+$data->uts*0.35+$data->uas*0.4;


        $data->save();

        return redirect()->route('detail.jadwal.mengajar', $id_jadwal)
        ->with('status_code', 'success')
        ->with('status_text', 'Input nilai')
        ->with('status', 'Berhasil');
    }

    public function halaman_ubah_nilai_siswa($id){
        $data = JadwalSiswa::find($id);

        return view('pages.guru.jadwal-mengajar.ubah_nilai', [
            'data' => $data
        ]);
    }

    public function proses_ubah_nilai(Request $request, $id){
        $data_jadwal_siswa = JadwalSiswa::with(['jadwal'])->find($id);

        $id_jadwal_siswa = $data_jadwal_siswa->jadwal->id;

        $data = JadwalSiswa::with(['hasil_pembelajaran'])->find($id);


        HasilPembelajaran::with('jadwal_siswa_id', $data->id)->where('jadwal_siswa_id', $data->id)->update([
            'tugas' => $request->tugas,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'rata' => $request->tugas*0.25+$request->uts*0.35+$request->uas*0.4
        ]);


        return redirect()->route('detail.jadwal.mengajar', $id_jadwal_siswa)
        ->with('status_code', 'success')
        ->with('status_text', 'Inpu nilai')
        ->with('status', 'Berhasil');

    }
}
