@extends('layouts.admin')

@section('title', 'Tambah Kepala Sekolah')
@section('content')
    <div class="container-fluid mb-5">

        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-start m-0">
                    <div class="font-weight-bold text-primary mt-3">
                        <p>Tambah Kepala Sekolah</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('kepalasekolah.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap"
                                    value="{{ old('nama_lengkap') }}">
                            </div>

                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir"
                                    value="{{ old('tempat_lahir') }}">
                            </div>

                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir"
                                    value="{{ old('tanggal_lahir') }}">
                            </div>

                            <div class="form-group">
                                <label for="">Akun Email</label>
                                <select name="user_id" class="form-control">
                                    <option value="">Pilih Email</option>
                                    @foreach ($user as $user)
                                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>

                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" class="form-control" cols="30" rows="10"></textarea>
                            </div>


                            <div class="form-group">
                                <label for="">No Telepon</label>
                                <input type="text" name="no_telpon" class="form-control" placeholder="No Telepon"
                                    value="{{ old('no_telpon') }}">
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Tahun Mulai Masa Jabatan</label>
                                <input type="string" name="tahun_mulai_masa_jabatan" class="form-control" placeholder="Masa Jabatan">
                            </div>

                            <div class="form-group">
                                <label for="">Tahun Selesai Masa Jabatan</label>
                                <input type="string" name="tahun_selsai_masa_jabatan" class="form-control" placeholder="Masa Jabatan">
                            </div>

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
