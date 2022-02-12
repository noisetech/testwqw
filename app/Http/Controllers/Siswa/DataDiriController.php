<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DataDiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $datadiri = Siswa::with(['user'])->where('user_id', Auth::user()->id)->first();


        return view('pages.siswa.data-diri.index', [
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
        $item = Siswa::find($id);

        return view('pages.siswa.data-diri.edit', [
            'item' => $item
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
        $item = Siswa::find($id);

        $data = $request->all();

        $siswa =  Siswa::where('id' , $item->id)->first();



        if (isset($data['foto'])) {
            $penyimpanan = 'storage/'.$siswa['foto'];
            if (File::exists($penyimpanan)) {
                File::delete($penyimpanan);
            }
            else
            {
                File::delete('storage/app/public/'.$data['foto']);
            }
        }

        if (isset($data['foto'])) {
            $data['foto'] = $request->file('foto')->store('assets/foto', 'public');
        }

        $item->update($data);


        return redirect()->route('datadiri.index')
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
