<?php

namespace App\Http\Controllers\Admin;

use App\Guru;
use App\Hari;
use App\Http\Controllers\Controller;
use App\Jadwal;
use App\Kelas;
use App\MataPelajaran;
use App\Semester;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Jadwal::with(['mata_pelajaran','guru', 'kelas', 'hari', 'semester'])->get();

        return view('pages.admin.jadwal.index', [
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
        $mata_pelajaran = MataPelajaran::all();
        $guru = Guru::all();
        $kelas = Kelas::all();
        $hari = Hari::all();
        $semester = Semester::all();
        return view('pages.admin.jadwal.create', [
            'mata_pelajaran' => $mata_pelajaran,
            'guru' => $guru,
            'kelas' => $kelas,
            'hari' => $hari,
            'semester' => $semester
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

        $data =  $request->all();

        Jadwal::create($data);

        return redirect()->route('jadwal.index')
        ->with('status_code', 'success')
        ->with('status_text', 'Data ditambah')
        ->with('status', 'Berhasil');
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
        $item = Jadwal::find($id);
        $mata_pelajaran = MataPelajaran::all();
        $guru = Guru::all();
        $kelas = Kelas::all();
        $hari = Hari::all();
        $semester = Semester::all();
        return view('pages.admin.jadwal.edit', [
            'item' => $item,
            'mata_pelajaran' => $mata_pelajaran,
            'guru' => $guru,
            'kelas' => $kelas,
            'hari' => $hari,
            'semester' => $semester
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
        $item = Jadwal::find($id);

        $data = $request->all();

        $item->update($data);

        return redirect()->route('jadwal.index')
        ->with('status_code', 'success')
        ->with('status_text', 'Data diubah')
        ->with('status', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Jadwal::find($id);

        $item->delete();

        return redirect()->route('jadwal.index')
        ->with('status_code', 'success')
        ->with('status_text', 'Data dihapus')
        ->with('status', 'Berhasil');
    }
}
