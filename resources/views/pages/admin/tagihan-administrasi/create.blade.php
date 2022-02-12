@extends('layouts.admin')

@section('title', 'Tambah tagihan adminitrasi siswa')
@section('content')
<div class="container-fluid">



    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-start m-0">
                <div class="font-weight-bold text-primary pt-3">
                    <p>Tambah tagihan administrasi sisw</p>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('tagihan_administrasi.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="">Tagihan Adminitrasi Siswa</label>
                    <select name="pembayaran_administrasi_id" class="form-control">
                        <option value="">Pilih Tagihan Administrasi</option>
                        @foreach ($pembayaran_administrasi as $pembayaran_administrasi)
                        <option value="{{ $pembayaran_administrasi->id }}">{{ $pembayaran_administrasi->kategori_pembayaran }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Siswa</label>
                    <select name="siswa_id" class="form-control">
                        <option value="">Pilih Siswa</option>
                        @foreach ($siswa as $siswa)
                        <option value="{{ $siswa->id }}">{{ $siswa->nama_depan.' '.$siswa->nama_belakang }}</option>
                        @endforeach
                    </select>
                </div>


                <button class="btn btn-block btn-primary" type="submit">
                    Simpan
                </button>
            </form>

        </div> <div class="card-body">
            <form action="{{ route('tagihan_administrasi.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="">Tagihan Adminitrasi Siswa</label>
                    <select name="pembayaran_administrasi_id" class="form-control">
                        <option value="">Pilih Tagihan Administrasi</option>
                        @foreach ($pembayaran_administrasi as $pembayaran_administrasi)
                        <option value="{{ $pembayaran_administrasi->id }}">{{ $pembayaran_administrasi->kategori_pembayaran }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Siswa</label>
                    <select name="siswa_id" class="form-control">
                        <option value="">Pilih Siswa</option>
                        @foreach ($siswa as $siswa)
                        <option value="{{ $siswa->id }}">{{ $siswa->nama_depan.' '.$siswa->nama_belakang }}</option>
                        @endforeach
                    </select>
                </div>


                <button class="btn btn-block btn-success" type="submit">
                    Simpan
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
