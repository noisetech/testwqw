@extends('layouts.admin')

@section('title', 'Tambah Siswa')
@section('content')
<div class="container-fluid">

    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-start m-0">
                <div class="font-weight-bold text-primary pt-3">
                    <p>Tambah siswa</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

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
                    <label for="">Nisn</label>
                    <input type="number" name="nisn" class="form-control" placeholder="Nisn" value="{{ old('nisn') }}">
                </div>

                <div class="form-group">
                    <label for="">Nama Depan</label>
                    <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan" value="{{ old('nama_depan') }}">
                </div>


                <div class="form-group">
                    <label for="">Nama Belakang</label>
                    <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang" value="{{ old('nama_belakang') }}">
                </div>

                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}">
                </div>

                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" placeholder=" Klik Tanggal Lahir" value="{{ old('tgl_lahir') }}">
                </div>

                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jk" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Golongan Darah</label>
                    <select name="gol_darah" class="form-control">
                        <option value="">Pilih Golongan Darah</option>
                        <option value="O">O</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat"  rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Angkatan</label>
                    <input type="text" name="angkatan" class="form-control" placeholder="Angkatan" value="{{ old('angkatan') }}">
                </div>

                <div class="form-group">
                    <label for="">Tanggal Masuk</label>
                    <input type="date" name="tgl_masuk" id="datepicker_tgl_masuk" class="form-control" placeholder="Tanggal Masuk" value="{{ old('tgl_masuk') }}">
                </div>

                <div class="form-group">
                    <label for="">Nama Asal Sekolah</label>
                    <input type="text" name="nama_sekolah_asal" class="form-control" placeholder="Nama Asal Sekolah" value="{{ old('nama_sekolah_asal') }}">
                </div>

                <div class="form-group">
                    <label for="">Alamat Asal Sekolah</label>
                    <textarea name="alamat_sekolah_asal"  rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Anak Ke</label>
                    <input type="text" name="anak_ke" class="form-control" placeholder="Anak Ke" value="{{ old('anak_ke') }}">
                </div>

                <div class="form-group">
                    <label for="">Status Anak</label>
                    <input type="text" name="status_anak" class="form-control" placeholder="Status Anak" value="{{ old('status_anak') }}">
                </div>

                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" class="form-control-file">
                </div>

                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <option value="">Pilih Status</option>
                        <option value="bersekolah">Bersekolah</option>
                        <option value="berhenti">Berhenti</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Nama Ayah</label>
                    <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah" value="{{ old('nama_ayah') }}">
                </div>

                <div class="form-group">
                    <label for="">Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu" value="{{ old('nama_ibu') }}">
                </div>

                <div class="form-group">
                    <label for="">Pekerjaan Ayah</label>
                    <input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan Ayah" value="{{ old('pekerjaan_ayah') }}">
                </div>

                <div class="form-group">
                    <label for="">Pekerjaan Ibu</label>
                    <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan Ibu" value="{{ old('pekerjaan_ibu') }}">
                </div>

                <div class="form-group">
                    <label for="">Alamat Orang Tua</label>
                    <textarea name="alamat_orang_tua"  rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="">No Telpon Orang Tua</label>
                    <input type="text" name="no_telpon_orang_tua" class="form-control" placeholder="No Telpon Orang Tua" value="{{ old('no_telpon_orang_tua') }}">
                </div>

                <div class="form-group">
                    <label for="">Nama Wali</label>
                    <input type="text" name="nama_wali" class="form-control" placeholder="Nama Wali" value="{{ old('nama_wali') }}">
                </div>

                <div class="form-group">
                    <label for="">Alamat Wali</label>
                    <textarea name="alamat_wali"  rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Pekerjaan Wali</label>
                    <input type="text" name="pekerjaan_wali" class="form-control" placeholder="Pekerjaan Wali" value="{{ old('pekerjaan_wali') }}">
                </div>

                <div class="form-group">
                    <label for="">No Telpon Wali</label>
                    <input type="text" name="no_telpon_wali" class="form-control" placeholder="No Telpon Wali" value="{{ old('no_telpon_wali') }}">
                </div>



                <button class="btn btn-block btn-success" type="submit">
                    Simpan
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
