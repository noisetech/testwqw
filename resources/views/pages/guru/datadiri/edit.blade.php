@extends('layouts.guru')

@section('title', 'Ubah data diri')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah data diri</h1>
        </div>


        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('data-diri.update', $datadiri->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="">Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan"
                            value="{{ $datadiri->nama_depan }}">
                    </div>

                    <div class="form-group">
                        <label for="">Nama Belakang</label>
                        <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang"
                            value="{{ $datadiri->nama_belakang }}">
                    </div>

                    <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir"
                            value="{{ $datadiri->tempat_lahir }}">
                    </div>


                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" class="form-control">
                            <option value="{{ $datadiri->jk }}">Data sebelumnya({{ $datadiri->jk }})</option>
                            <option value="L">L</option>
                            <option value="P">P</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Bidang Pelajaran</label>
                        <select name="" class="form-control">
                            <option value="{{ $datadiri->mata_pelajaran_id }}">Data sebelumnya({{ $datadiri->mata_pelajaran->mata_pelajaran }})</option>
                            @foreach ($mata_pelajaran as $mata_pelajaran)
                            <option value="{{ $mata_pelajaran->id }}">{{ $mata_pelajaran->mata_pelajaran }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" rows="10" class="form-control">{{ $datadiri->alamat }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Email Pribadi</label>
                        <input type="text" name="email" class="form-control" placeholder="Email"
                            value="{{ $datadiri->email }}">
                    </div>

                    <div class="form-group">
                        <label for="">No Telepon</label>
                        <input type="text" name="no_telpon" class="form-control" placeholder="No Telepon"
                            value="{{ $datadiri->no_telpon }}">
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-6">
                        <img src="{{ Storage::url($datadiri->gambar) }}" alt="" width="150px;" height="150px;" class="rounded mt-3 mb-3">
                    </div>

                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" class="form-control-file">
                    </div>




                    <button class="btn btn-sm btn-warning" type="submit">
                        Ubah
                    </button>
                </form>
            </div>
        </div>



    </div>
@endsection
