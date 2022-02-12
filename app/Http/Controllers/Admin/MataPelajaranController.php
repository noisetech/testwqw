<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index(){
        $items = MataPelajaran::all();

        return view('pages.admin.mata_pelajaran.index', [
            'items' => $items
        ]);
    }

    public function create(){
        return view('pages.admin.mata_pelajaran.create');
    }

    public function store(Request $request){
        $data = $request->all();

        MataPelajaran::create($data);


        return redirect()->route('mata.pelajaran.index')
        ->with('status_code', 'success')
        ->with('status_text', 'Data ditambah')
        ->with('status', 'Berhasil');
    }


    public function edit($id){
        $item = MataPelajaran::find($id);

        return view('pages.admin.mata_pelajaran.edit', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id){
        $item = MataPelajaran::find($id);

        $data = $request->all();

        $item->update($data);

        return redirect()->route('mata.pelajaran.index')
        ->with('status_code', 'success')
        ->with('status_text', 'Data diubah')
        ->with('status', 'Berhasil');

    }

    public function destroy($id){
        $item = MataPelajaran::find($id);

        $item->delete();

        return redirect()->route('mata.pelajaran.index')
        ->with('status_code', 'success')
        ->with('status_text', 'Data dihapus')
        ->with('status', 'Berhasil');
    }
}
