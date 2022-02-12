<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PembayaranAdministrasi;
use Illuminate\Http\Request;

class PembayaranAdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = PembayaranAdministrasi::all();

        return view('pages.admin.pembayaran-administrasi.index', [
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
        return view('pages.admin.pembayaran-administrasi.create');
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

        PembayaranAdministrasi::create($data);

        return redirect()->route('pembayaran_administrasi.index')
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
        $item = PembayaranAdministrasi::find($id);

        return view('pages.admin.pembayaran-administrasi.edit', [
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

        $item = PembayaranAdministrasi::find($id);

        $data = $request->all();

        $item->update($data);

        return redirect()->route('pembayaran_administrasi.index')
              ->with('status_code', 'success')
        ->with('status_text', 'Data ditambah')
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
        $item = PembayaranAdministrasi::find($id);

        $item->delete();

        return redirect()->route('pembayaran_administrasi.index')
              ->with('status_code', 'success')
        ->with('status_text', 'Data ditambah')
        ->with('status', 'Berhasil');
    }
}
