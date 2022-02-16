<?php

namespace App\Exports;

use App\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SiswaExport implements FromView
{

    public function view(): View
    {
        return view('pages.kepala-sekolah.siswa.exportsiswa', [
            'siswa' => Siswa::with(['user'])->orderBy('nama_depan', 'ASC')->get()
        ]);
    }
}
