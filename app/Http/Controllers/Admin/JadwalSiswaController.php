<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jadwal;
use App\JadwalSiswa;
use App\Siswa;
use App\Tahun;
use Illuminate\Http\Request;

class JadwalSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = JadwalSiswa::with(['siswa', 'jadwal'])->get();

        return view('pages.admin.jadwal-siswa.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();

        $jadwal = Jadwal::all();

        $tahun = Tahun::all();

        return view('pages.admin.jadwal-siswa.create', [
            'siswa' => $siswa,
            'jadwal' => $jadwal,
            'tahun' => $tahun
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = JadwalSiswa::find($id);

        $siswa = Siswa::all();

        $jadwal = Jadwal::all();

        $tahun = Tahun::all();

        return view('pages.admin.jadwal-siswa.edit', [
            'item' => $item,
            'siswa' => $siswa,
            'jadwal' => $jadwal,
            'tahun' => $tahun
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'siswa_id' => 'required|exists:siswa,id',
            'jadwal_id' => 'required|exists:jadwal,id',
            'tahun_id' => 'required|exists:tahun,id'
        ]);

        $item = JadwalSiswa::find($id);

        $data = $request->all();

        $item->update($data);

        return redirect()->route('jadwal_siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = JadwalSiswa::find($id);

        $item->delete();

        return redirect()->route('jadwal_siswa.index');
    }
}
