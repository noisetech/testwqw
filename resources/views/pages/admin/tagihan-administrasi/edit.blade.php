@extends('layouts.admin')

@section('title', 'Ubah tagihan adminitrasi siswa')
@section('content')
<div class="container-fluid">



    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-center m-0">
                <div class="font-weight-bold text-primary pt-3">
                    <p>Ubah tagihan administrasi siswa</p>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('tagihan_administrasi.update', $item->id) }}" method="POST">
                @csrf

                @method('put')

                <div class="form-group">
                    <label for="">Tagihan Adminitrasi Siswa</label>
                    <select name="pembayaran_administrasi_id" class="form-control">
                        <option value="{{ $item->pembayaran_administrasi_id }}">Jangan Diubah ({{ $item->pembayaran_administrasi->kategori_pembayaran }})</option>
                        @foreach ($pembayaran_administrasi as $pembayaran_administrasi)
                        <option value="{{ $pembayaran_administrasi->id }}">{{ $pembayaran_administrasi->kategori_pembayaran }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Siswa</label>
                    <select name="siswa_id" class="form-control">
                        <option value="{{ $item->siswa_id }}">Jangan Diubah ({{ $item->siswa->nama_depan.' '.$item->siswa->nama_belakang }})</option>
                        @foreach ($siswa as $siswa)
                        <option value="{{ $siswa->id }}">{{ $siswa->nama_depan.' '.$siswa->nama_belakang }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <option value="{{ $item->status }}">Data Sebelumnya({{ $item->status }})</option>
                        <option value="belum lunas">belum lunas</option>
                        <option value="sudah lunas">sudah lunas</option>
                    </select>
                </div>



                <button class="btn btn-block btn-success" type="submit">
                    Ubah
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
