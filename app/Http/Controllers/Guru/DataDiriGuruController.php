<?php

namespace App\Http\Controllers\Guru;

use App\Guru;
use App\Http\Controllers\Controller;
use App\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DataDiriGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datadiri = Guru::with(['user', 'mata_pelajaran'])->where('user_id', Auth::user()->id)->first();

        return view('pages.guru.datadiri.index', [
            'datadiri' => $datadiri
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $datadiri = Guru::find($id);
        $mata_pelajaran = MataPelajaran::all();

        $agama = $datadiri->agama;


        return view('pages.guru.datadiri.edit', [
            'datadiri' => $datadiri,
            'mata_pelajaran' => $mata_pelajaran
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
        $guru = Guru::find($id);

        $data = $request->all();

        $siswa =  Guru::where('id' , $guru->id)->first();


        if (isset($data['gambar'])) {
            $penyimpanan = 'storage/'.$data['gambar'];
            if (File::exists($penyimpanan))
            {
                File::delete($penyimpanan);
            }
            else
            {
                File::delete('storage/app/public'.$data['gambar']);
            }
        }

        if (isset($data['gambar'])) {
            $data['gambar'] = $request->file('gambar')->store('assets/gambar', 'public');
        }



        $guru->update($data);


        return redirect()->route('data-diri.index')
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
        //
    }
}
