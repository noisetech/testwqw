<?php

namespace App\Exports;

use App\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SiswaView implements FromView
{
    public function view(): View
    {
        return view('pages.kepala-sekolah.siswa.exportsiswa', [
            'siswa' => Siswa::with(['user'])->get()
        ]);
    }
}
