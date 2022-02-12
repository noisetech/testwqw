<?php

namespace App\Http\Controllers\Guru;

use App\Guru;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakController extends Controller
{
    public function index(){
        $item = Guru::whereHas('user', function($q){
            return $q->where('user_id', Auth::user()->id);
        })->with(['mata_pelajaran'])->get();

        return view('pages.guru.datadiri.halaman-cetak', [
            'item' => $item
        ]);
    }

    public function proses(){
        $item = Guru::whereHas('user', function($q){
            return $q->where('user_id', Auth::user()->id);
        })->with(['mata_pelajaran'])->first();
        $penyimpanan =  'storage/'.$item['gambar'];

        $public = public_path($penyimpanan);



        $pdf = PDF::loadView('pages.guru.datadiri.halaman-cetak', [
            'item' => $item,
            'public' => $public
         ]);

        return $pdf->stream();
    }
}
