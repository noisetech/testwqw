<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Siswa;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Siswa::with(['user'])->get();

        return view('pages.admin.siswa.index', [
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
        $user = User::whereNull('status_akun')->whereNotIn('role', ['admin'])->get();

        return view('pages.admin.siswa.create', [
            'user' => $user
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


        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/gambar', 'public');
        }

        Siswa::create($data);

        User::where('id', $request->user_id)
        ->update([
            'status_akun' => 'Sudah digunakan'
        ]);

        return redirect()->route('siswa.index')
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
        $item = Siswa::find($id);

        return view('pages.admin.siswa.show', [
            'item' => $item
        ]);
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

        $user = User::all()->where('role', 'siswa')->whereIn('status_akun', '');

        return view('pages.admin.siswa.edit', [
            'item' => $item,
            'user' => $user
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

        $siswa =  Siswa::where('id', $item->id)->first();



        if (isset($data['foto'])) {
            $penyimpanan = 'storage/' . $siswa['foto'];
            if (File::exists($penyimpanan)) {
                File::delete($penyimpanan);
            } else {
                File::delete('storage/app/public/'.$siswa['foto']);
            }
        }

        if (isset($data['foto'])) {
            $data['foto'] = $request->file('foto')->store('assets/gambar', 'public');
        }

        $item->update($data);

        return redirect()->route('siswa.index')
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
        $item =  Siswa::find($id);

        $item->delete();

        return redirect()->route('siswa.index')
            ->with('status_code', 'success')
            ->with('status_text', 'Data dihapus')
            ->with('status', 'Berhasil');
    }

}
