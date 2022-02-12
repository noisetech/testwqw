<?php

namespace App\Http\Controllers\Admin;

use App\Guru;
use App\Http\Controllers\Controller;
use App\MataPelajaran;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GuruController extends Controller
{
    public function index()
    {
        $items = Guru::with(['user', 'mata_pelajaran'])->get();

        return view('pages.admin.guru.index', [
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
        $user = User::all()->where('role', 'guru')->whereIn('status_akun', '');

        $mata_pelajaran = MataPelajaran::all();

        return view('pages.admin.guru.create', [
            'user' => $user,
            'mata_pelajaran' => $mata_pelajaran
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

       if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('assets/gambar', 'public');
       }

        Guru::create($data);

        User::where('id', $request->user_id)->update([
            'status_akun' => 'sudah digunakan'
        ]);

        return redirect()->route('guru.index')
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
        $item = Guru::find($id);

        return view('pages.admin.guru.show', [
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
        $item = Guru::find($id);
        $user = User::all()->where('role', 'guru')->whereIn('status_akun', '');
        $mata_pelajaran = MataPelajaran::all();

        return view('pages.admin.guru.edit', [
            'item' => $item,
            'user' => $user,
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

        $item = Guru::find($id);

        $data = $request->all();

        $guru = Guru::where('id', $item->id)->first();

        if (isset($data['gambar'])) {
            $penyimpanan = 'storage/'.$guru['gambar'];
            if (File::exists($penyimpanan)) {
                File::delete($penyimpanan);
            }else{
                File::delete('storage/app/public/'.$guru['gambar']);
            }
        }

        if (isset($guru['gambar'])) {
            $data['gambar'] = $request->file('gambar')->store('assets/gambar', 'public');
        }

        $item->update($data);

        return redirect()->route('guru.index')
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
        $item = Guru::find($id);

        $item->delete();

        return redirect()->route('guru.index')
        ->with('status_code', 'success')
        ->with('status_text', 'Data dihapus')
        ->with('status', 'Berhasil');
    }
}
