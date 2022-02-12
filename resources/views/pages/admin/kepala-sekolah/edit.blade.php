@extends('layouts.admin')

@section('title', 'Tambah Kepala Sekolah')
@section('content')
    <div class="container-fluid mb-5">

        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-start m-0">
                    <div class="font-weight-bold text-primary mt-3">
                        <p>Ubah  Kepala Sekolah</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('kepalasekolah.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap"
                                    value="{{ $item->nama_lengkap }}">
                            </div>

                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir"
                                    value="{{ $item->tempat_lahir }}">
                            </div>

                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir"
                                    value="{{ $item->tanggal_lahir }}">
                            </div>

                        </div>

                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" class="form-control" cols="30" rows="10">{{ $item->alamat }}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="">No Telepon</label>
                                <input type="text" name="no_telpon" class="form-control" placeholder="No Telepon"
                                    value="{{ $item->no_telpon }}">
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Tahun Mulai Masa Jabatan</label>
                                <input type="string" name="tahun_mulai_masa_jabatan" class="form-control" placeholder="Masa Jabatan" value="{{ $item->masa_jabatan }}">
                            </div>

                            <div class="form-group">
                                <label for="">Tahun Selesai Masa Jabatan</label>
                                <input type="string" name="tahun_selsai_masa_jabatan" class="form-control" placeholder="Masa Jabatan" {{ $item->masa_jabatan }}>
                            </div>

                            @if (!empty($item->foto))
                            <div class="col-md-4 mb-3">
                                <img src="{{ Storage::url($item->foto) }}" alt="" class="img-thumbnail rounded" width="150">
                            </div>
                            @else

                            @endif

                            <div class="form-group">
                                <label for="">Foto</label>
                                <input type="file" name="foto" class="form-control-file">
                            </div>
                        </div>
                    </div>


                    <button class="btn btn-sm btn-success float-right" type="submit">
                        Simpan
                    </button>
                </form>

            </div>
        </div>

    </div>
@endsection
