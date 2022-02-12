<?php

namespace App\Http\Controllers\Admin;

use App\Guru;
use App\Http\Controllers\Controller;
use App\Tahun;
use Illuminate\Http\Request;

class OpsiGuruController extends Controller
{
    public function halaman_opsi_guru(){
        $tahun = Tahun::all();

        return view('pages.admin.guru.opsi-guru', [
            'tahun' => $tahun
        ]);
    }

    public function cari_opsi_guru(Request $request){
        $inputan = $request->input('tahun');

        $items =  Guru::whereYear('created_at', $inputan)->get();

        return view('pages.admin.guru.data-berdasarkan-opsi', [
            'items' => $items
        ]);
    }
}
