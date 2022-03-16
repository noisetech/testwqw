<?php

namespace App\Exports;

use App\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SiswaExport implements FromView
{

    public function view(): View
    {


        $startDate = request()->input('startDate');
        $endDate = request()->input('endDate');


        $siswa = Siswa::whereBetween('tgl_masuk', [$startDate, $endDate])->get();

        return view('pages.kepala-sekolah.siswa.exportsiswa', [
            'siswa' => $siswa
        ]);
    }
}