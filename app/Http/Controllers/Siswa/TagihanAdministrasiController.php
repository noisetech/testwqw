<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\TagihanAdminitrasi;
use Illuminate\Support\Facades\Auth;

class TagihanAdministrasiController extends Controller
{
    public function data(){
        $user_login = Auth::user();
        $id_siswa = $user_login->siswa->id;

        $items = TagihanAdminitrasi::whereHas('siswa', function($q) use($id_siswa){
            return $q->where('siswa_id', $id_siswa);
        })
        ->with(['pembayaran_administrasi'])
        ->get();

        return view('pages.siswa.tagihan-adminitrasi.index', [
            'items' => $items
        ]);
    }
}
