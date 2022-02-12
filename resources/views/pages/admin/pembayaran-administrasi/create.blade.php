@extends('layouts.admin')

@section('title', 'Tambah Pembayaran Administrasi')
@section('content')
    <div class="container-fluid">


        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-start m-0">
                    <div class="font-weight-bold text-primary pt-3">
                        <p>Tambah pembayaran administrasi</p>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('pembayaran_administrasi.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">Kategori Pembayaran</label>
                        <input type="text" name="kategori_pembayaran"
                            class="form-control"
                            placeholder="Masukan Kateogri Pembayaran" value="{{ old('kategori_pembayaran') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Nominal</label>
                        <input type="number" name="nominal" class="form-control" placeholder="Masukan Nominal"
                            value="{{ old('nominal') }}">
                    </div>

                    <button class="btn btn-block btn-success" type="submit">
                        Simpan
                    </button>
                </form>

            </div>
        </div>

    </div>
@endsection
