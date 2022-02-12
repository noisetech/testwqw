@extends('layouts.admin')

@section('title', 'Edit Guru')
@section('content')
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-start m-0">
                    <div class="font-weight-bold text-primary pt-3">
                        <p>Edit guru</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('guru.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="">Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control @error('nama_depan') is-invalid @enderror"
                            placeholder="Nama Depan" value="{{ $item->nama_depan }}">
                        @error('nama_depan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="">Nama Belakang</label>
                        <input type="text" name="nama_belakang"
                            class="form-control  @error('nama_belakang') is-invalid @enderror" placeholder="Nama Belakang"
                            value="{{ $item->nama_belakang }}">
                        @error('nama_belakang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir"
                            class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Tempat Lahir"
                            value="{{ $item->tempat_lahir }}">
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror"
                            placeholder="Tanggal Lahir" value="{{ $item->tgl_lahir }}">
                        @error('tgl_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" class="form-control @error('jk') is-invalid @enderror">
                            <option value="{{ $item->jk }}">Data sebelumnya({{ $item->jk }})</option>
                            <option value="L">L</option>
                            <option value="P">P</option>
                        </select>
                        @error('jk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control  @error('alamat') is-invalid @enderror"
                            placeholder="Masukan Alamat" value="{{ $item->alamat }}">
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Masukan Email" value="{{ $item->email }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">No Telpon</label>
                        <input type="text" name="no_telpon" class="form-control @error('no_telpon') is-invalid @enderror"
                            placeholder="Masukan No Telpon" value="{{ $item->no_telpon }}">
                        @error('no_telpon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Agama</label>
                        <select name="agama" class="form-control @error('agama') is-invalid @enderror">
                            <option value="{{ $item->agama }}">Data Sebelumnya({{ $item->agama }})</option>
                            <option value="islam">islam</option>
                            <option value="budha">budha</option>
                            <option value="kristen">kristen</option>
                            <option value="hindu">hindu</option>
                            <option value="katolik">katolik</option>
                            @error('agama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Golongan</label>
                        <input type="text" name="golongan" class="form-control @error('golongan') is-invalid @enderror"
                            placeholder="Masukan Golongan" value="{{ $item->golongan }}">
                        @error('golongan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control  @error('status') is-invalid @enderror">
                            <option value="{{ $item->status }}">Data Sebelumnya({{ $item->status }})</option>
                            <option value="aktif">aktif</option>
                            <option value="tidak aktif">tidak aktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Akun</label>
                        <select name="mata_pelajaran_id"
                            class="form-control @error('mata_pelajaran_id') is-invalid @enderror">
                            <option value="{{ $item->mata_pelajaran_id }}">Data sebelumnya({{ $item->mata_pelajaran->mata_pelajaran }})</option>
                            @foreach ($mata_pelajaran as $mata_pelajaran)
                                <option value="{{ $mata_pelajaran->id }}">{{ $mata_pelajaran->mata_pelajaran }}
                                </option>
                            @endforeach
                        </select>
                        @error('mata_pelajaran_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Akun</label>
                        <select name="user_id" class="form-control  @error('user_id') is-invalid @enderror">
                            <option value="{{ $item->user_id }}">Jangan Diubah ({{ $item->user->email }})</option>
                            @foreach ($user as $user)
                                <option value="{{ $user->id }}">{{ $user->email }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <img src="{{ Storage::url($item->gambar) }}" alt="" width="250px" class="img-thumbnail">
                    </div>

                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" class="form-control-file  @error('gambar') is-invalid @enderror">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <button class="btn btn-block btn-success">
                        Ubah
                    </button>

                </form>
            </div>
        </div>

    </div>
@endsection
