@extends('layouts.admin')

@section('title', 'Tambah Guru')
@section('content')
    <div class="container-fluid">


        <div class="card shadow">
            <div class=" card-header">
                <div class="d-flex justify-content-start m-0">
                    <div class="font-weight-bold text-primary pt-3">
                        <p>Tambah Guru</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="">Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan"
                            value="{{ old('nama_depan') }}">
                    </div>


                    <div class="form-group">
                        <label for="">Nama Belakang</label>
                        <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang"
                            value="{{ old('nama_belakang') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir"
                            class="form-control" placeholder="Tempat Lahir"
                            value="{{ old('tempat_lahir') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control"
                            placeholder="Tanggal Lahir" value="{{ old('tgl_lahir') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">L</option>
                            <option value="P">P</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control"
                            placeholder="Masukan Alamat" value="{{ old('alamat') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control"
                            placeholder="Masukan Email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="">No Telpon</label>
                        <input type="text" name="no_telpon" class="form-control"
                            placeholder="Masukan No Telpon" value="{{ old('no_telpon') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Agama</label>
                        <select name="agama" class="form-control">
                            <option value="">Pilih Agama</option>
                            <option value="islam">islam</option>
                            <option value="budha">budha</option>
                            <option value="kristen">kristen</option>
                            <option value="hindu">hindu</option>
                            <option value="katolik">katolik</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Golongan</label>
                        <input type="text" name="golongan" class="form-control"
                            placeholder="Masukan Golongan" value="{{ old('golongan') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="aktif">aktif</option>
                            <option value="tidak aktif">tidak aktif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Akun</label>
                        <select name="mata_pelajaran_id"
                            class="form-control">
                            <option value="">Pilih Bidang Pelajaran</option>
                            @foreach ($mata_pelajaran as $mata_pelajaran)
                                <option value="{{ $mata_pelajaran->id }}">{{ $mata_pelajaran->mata_pelajaran }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Akun</label>
                        <select name="user_id" class="form-control">
                            <option value="">Pilih Akun</option>
                            @foreach ($user as $user)
                                <option value="{{ $user->id }}">{{ $user->email }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" class="form-control-file">
                    </div>

                    <button class="btn btn-block btn-success">
                        Simpan
                    </button>

                </form>
            </div>
        </div>

    </div>
@endsection
