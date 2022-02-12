<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class CetakDataDiriController extends Controller
{
    public function halaman_cetak_data_diri(){
        $datadiri = Siswa::with(['user'])->where('user_id', Auth::user()->id)->get();

        return view('pages.siswa.data-diri.cetak', [
            'datadiri' => $datadiri
        ]);
    }


    public function cetak_pdf()
    {

        $datadiri = Siswa::with(['user'])->where('user_id', Auth::user()->id)->first();

        $penyimpanan =  'storage/'.$datadiri['foto'];
        $public = public_path($penyimpanan);


        $pdf = PDF::loadView('pages.siswa.data-diri.cetak', [
            'datadiri' => $datadiri,
            'public' => $public
         ]);

        return $pdf->stream();
    }
}
