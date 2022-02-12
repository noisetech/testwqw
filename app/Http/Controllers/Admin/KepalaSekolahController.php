<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KepalaSekolah;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KepalaSekolahController extends Controller
{
    public function index(){
        $items = KepalaSekolah::all();

        return view('pages.admin.kepala-sekolah.index', [
            'items' => $items
        ]);
    }

    public function create(){

        $user = User::all()->where('role', 'kepala sekolah')->whereIn('status', ['']);
        return view('pages.admin.kepala-sekolah.create', [
            'user' => $user
        ]);
    }

    public function store(Request $request){
        $data = $request->all();

        if(isset($data['foto'])){
            $data['foto'] = $request->file('foto')->store('assets/gambar', 'public');
        }

        User::where('id', $request->user_id)
        ->update([
            'status_akun' => 'Sudah digunakan'
        ]);

        KepalaSekolah::create($data);

        return redirect()->route('kepalasekolah.index')
        ->with('status_code', 'success')
        ->with('status_text', 'Data disimpan')
        ->with('status', 'Berhasil');
    }

    public function edit($id){

        $item = KepalaSekolah::find($id);

        return view('pages.admin.kepala-sekolah.edit', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id){

        $item = KepalaSekolah::find($id);


        $data = $request->all();

        $kepalasekolah = KepalaSekolah::where('id', $item->id)->first();

        if (isset($data['foto'])) {
          $penyimpanan = 'storage/'.$kepalasekolah['foto'];
          if (File::exists($penyimpanan)) {
              File::delete($penyimpanan);
          }else{
              File::delete('storage/app/public/'.$kepalasekolah['foto']);
          }
        }

        if(isset($data['foto'])){
            $data['foto'] = $request->file('foto')->store('assets/gambar', 'public');
        }

        $item->update($data);

        return redirect()->route('kepalasekolah.index')
        ->with('status_code', 'success')
        ->with('status_text', 'Data diubah')
        ->with('status', 'Berhasil');

    }

    public function destroy($id){
        $item = KepalaSekolah::find($id);
        $item->delete();
        return redirect()->route('kepalasekolah.index')
        ->with('status_code', 'success')
        ->with('status_text', 'Data dihapus')
        ->with('status', 'Berhasil');

    }


}
