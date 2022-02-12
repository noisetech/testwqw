@extends('layouts.siswa')

@section('title', 'Ubah data diri')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah data diri</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('datadiri.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="">Nama Depan:</label>
                    <input type="text" name="nama_depan" class="form-control" value="{{ $item->nama_depan }}">
                </div>

                <div class="form-group">
                    <label for="">Nama Belakang:</label>
                    <input type="text" name="nama_belakang" class="form-control" value="{{ $item->nama_belakang }}">
                </div>

                <div class="form-group">
                    <label for="">Alamat:</label>
                    <textarea name="alamat" class="form-control" cols="30" rows="10">{{ $item->alamat }}</textarea>
                </div>

                <div class="col-lg-6 col-md-6">
                    <img src="{{ Storage::url($item->foto) }}" alt="" width="200px" class="mt-3 mb-3">
                </div>

                <div class="form-group">
                    <label for="">Foto:</label>
                    <input type="file" name="foto" class="form-control-file">
                </div>

                <button class="btn btn-sm btn-warning" type="submit">
                    Ubah
                </button>

            </form>
        </div>
    </div>
    <!-- Content Row -->

</div>
@endsection
