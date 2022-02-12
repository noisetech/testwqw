<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Jadwal;
use App\JadwalSiswa;
use App\Semester;
use App\Siswa;
use App\Tahun;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListPelajaranController extends Controller
{
    public function list_pelajaran(){
        $items = Jadwal::with(['mata_pelajaran', 'guru', 'hari', 'semester'])->orderBy('jam_mulai', 'ASC')->get();
        // dd($items);

        return view('pages.siswa.jadwal.index', [
            'items' => $items

        ]);

    }

    public function jadwal_pelajaran(){
        $user_login = Auth::user();
        $id_siswa = $user_login->siswa->id;

        $items = JadwalSiswa::with(['siswa', 'jadwal'])
        ->where('siswa_id', $id_siswa)
        ->get()
        ->sortBy('jadwal.jam_mulai')
        ->sortBy('jadwal.hari_id');

        return view('pages.siswa.jadwal.jadwal', [
            'items' => $items
        ]);
    }

    public function proses_ambil_pelajaran(Request $request){
        $user_login = Auth::user();
        $id_siswa = $user_login->siswa->id;

        $data = $request->input('jadwal_id');

        foreach ($data as $key => $value) {
            $jadwal = new JadwalSiswa();
            $jadwal->siswa_id  = $id_siswa;
            $jadwal->jadwal_id = $value;
            $jadwal->tahun = Carbon::now()->format('Y');
            $jadwal->save();
        }

        // $jadwal = Jadwal::find($id);
        // $id_jadwal = $jadwal->id;

        // $data = new JadwalSiswa();
        // $data->siswa_id = $id_siswa;
        // $data->jadwal_id = $id_jadwal;
        // $data->tahun = Carbon::now()->format('Y');
        // $data->save();

        return redirect()->route('jadwal_pelajaran')->with('status', 'Data berhasil ditambahkan');
    }

    public function hapus_jadwal($id){
        $item = JadwalSiswa::find($id);
        $item->delete();

        return redirect()->route('jadwal_pelajaran');
    }

    public function opsi_list_pelajaran(Request $request){
        $tahun = Tahun::all();

        $semester = Semester::all();

        return view('pages.siswa.jadwal.opsi', [
            'tahun' => $tahun,
            'semester' => $semester
        ]);
    }

    public function mencari_opsi_jadwal(Request $request){


        $user_login = Auth::user();
        $id_siswa = $user_login->siswa->id;


        $inputan_tahun = $request->input('tahun');
        $inputan_semester = $request->input('semester_id');


        $items = JadwalSiswa::whereHas('jadwal', function($q) use($inputan_semester){
            return $q->where('semester_id', $inputan_semester);
        })->where('tahun', $inputan_tahun)
        ->where('siswa_id', $id_siswa)
        ->get()
        ->sortBy('jadwal.jam_mulai')
        ->sortBy('jadwal.hari_id');


        return view('pages.siswa.jadwal.databerdasarkan_opsi', [
            'items' => $items
        ]);
    }
}
