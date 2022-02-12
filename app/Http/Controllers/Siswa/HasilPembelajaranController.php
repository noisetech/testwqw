<?php

namespace App\Http\Controllers\Siswa;

use App\HasilPembelajaran;
use App\Http\Controllers\Controller;
use App\Jadwal;
use App\JadwalSiswa;
use App\Semester;
use App\Tahun;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class HasilPembelajaranController extends Controller
{


    public function opsi_hasil_pembelajaran(Request $request){
        $tahun = Tahun::all();

        $semester = Semester::all();

        return view('pages.siswa.hasil-pembelajaran.opsi', [
            'tahun' => $tahun,
            'semester' => $semester
        ]);

    }

    public function mencari_opsi_hasil_pembelajaran(Request $request){
        $user_login = Auth::user();
        $id_siswa = $user_login->siswa->id;


        $inputan_tahun = $request->input('tahun');
        $inputan_semester = $request->input('semester_id');

        // dd($inputan_semester);

        $jadwal = Jadwal::where('semester_id', $inputan_semester)->pluck('id');

        if ($jadwal->isEmpty()) {
            return redirect()->back()
            ->with('status_code', 'error')
            ->with('status_text', 'Data tidak ada')
            ->with('error', 'Maaf');
        }else{
            $jadwal_siswa = JadwalSiswa::whereHas('siswa', function($q) use($id_siswa){
                return $q->where('siswa_id', $id_siswa);
            })->whereHas('jadwal', function($q) use($jadwal){
                return $q->whereIn('jadwal_id', $jadwal);
            })->where('tahun', $inputan_tahun)->pluck('id');

           

            foreach ($jadwal_siswa as $key => $value) {
               $w[] = $value;

            }


            if($jadwal_siswa->isEmpty()){
                return redirect()->back()
                ->with('status_code', 'error')
                ->with('status_text', 'Data tidak ada')
                ->with('error', 'Maaf');
            }



            $items = HasilPembelajaran::whereHas('jadwal_siswa', function($q) use($w){
                return $q->whereIn('jadwal_siswa_id', $w);
            })->get();


           

        }

        return view('pages.siswa.hasil-pembelajaran.databerdasarkan_opsi', [
            'items' => $items
        ]);
    }

    public function halamana_data_hasil(){
        $tahun = Carbon::now()->format('Y');

        $bahan_bulan = Carbon::now()->format('m');

        if($bahan_bulan <= 6){
            $semester = "genap";
        }else{
            $semester = "ganjil";
        }

        $data_semester = Semester::where('semester', $semester)->first();

        $jadwal = Jadwal::where('semester_id', $data_semester->id)->pluck('id');



        $user_login = Auth::user();
        $id_siswa = $user_login->siswa->id;

        $items = HasilPembelajaran::whereHas('jadwal_siswa', function($q) use($id_siswa, $tahun, $jadwal){
            return $q->where('siswa_id', $id_siswa)->where('tahun',$tahun)->where('jadwal_id', $jadwal);
        })->get();

        



        return view('pages.siswa.hasil-pembelajaran.cetak', [
            'items' => $items
        ]);
    }

    public function cetak_hasil_pembelajaran(){
        $tahun = Carbon::now()->format('Y');

        $bahan_bulan = Carbon::now()->format('m');

        if($bahan_bulan <= 6){
            $semester = "genap";
        }else{
            $semester = "ganjil";
        }

        $data_semester = Semester::where('semester', $semester)->first();

        $jadwal = Jadwal::where('semester_id', $data_semester->id)->first();
        $id_jadwal = $jadwal->id;


        $user_login = Auth::user();
        $id_siswa = $user_login->siswa->id;

        $items = HasilPembelajaran::whereHas('jadwal_siswa', function($q) use($id_siswa, $tahun, $id_jadwal){
            return $q->where('siswa_id', $id_siswa)->where('tahun',$tahun)->where('jadwal_id', $id_jadwal);
        })->get();

      


        $pdf = PDF::loadView('pages.siswa.hasil-pembelajaran.cetak', [
            'items' => $items
         ]);

        return $pdf->stream();
    }
}
