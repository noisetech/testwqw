<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PembayaranAdministrasi;
use App\Siswa;
use App\TagihanAdminitrasi;
use Illuminate\Http\Request;

class TagihanAdminitrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TagihanAdminitrasi::all();

        return view('pages.admin.tagihan-administrasi.index', [
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
        $pembayaran_administrasi = PembayaranAdministrasi::all();
        $siswa = Siswa::all();

        return view('pages.admin.tagihan-administrasi.create', [
            'pembayaran_administrasi' => $pembayaran_administrasi,
            'siswa' => $siswa
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
        $data = $request->all();
        $data['status'] = 'belum lunas';


        TagihanAdminitrasi::create($data);

        return redirect()->route('tagihan_administrasi.index')
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
        $item = TagihanAdminitrasi::find($id);

        $pembayaran_administrasi = PembayaranAdministrasi::all();
        $siswa = Siswa::all();

        return view('pages.admin.tagihan-administrasi.edit', [
            'item' => $item,
            'pembayaran_administrasi' => $pembayaran_administrasi,
            'siswa' => $siswa
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
        $item = TagihanAdminitrasi::find($id);

        $data = $request->all();

        $item->update($data);

        return redirect()->route('tagihan_administrasi.index')
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
        $item = TagihanAdminitrasi::find($id);

        $item->delete();

        return redirect()->route('tagihan_administrasi.index')
        ->with('status_code', 'success')
        ->with('status_text', 'Data dihapus')
        ->with('status', 'Berhasil');
    }
}
