@extends('layouts.admin')

@section('title', 'Ubah Siswa')
@section('content')
<div class="container-fluid">

    <div class="card shadow">
     <div class="card-header">
        <div class="d-flex justify-content-start m-0">
            <div class="font-weight-bold text-primary pt-3">
                <p>Ubah siswa</p>
            </div>
        </div>
     </div>
     <div class="card-body">
        <form action="{{ route('siswa.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="">Akun</label>
                <select name="user_id" class="form-control">
                    <option value="{{ $item->user_id }}">Jangan Diubah ({{ $item->user->email }})</option>
                    @foreach ($user as $user)
                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Nisn</label>
                <input type="number" name="nisn" class="form-control" placeholder="Nisn" value="{{ $item->nisn }}">
           </div>

            <div class="form-group">
                <label for="">Nama Depan</label>
                <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan" value="{{ $item->nama_depan }}">
            </div>


            <div class="form-group">
                <label for="">Nama Belakang</label>
                <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang" value="{{ $item->nama_belakang }}">
            </div>

            <div class="form-group">
                <label for="">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="{{ $item->tempat_lahir }}">
            </div>

            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" id="datepicker_tgl_lahir" placeholder=" Klik Tanggal Lahir" value="{{ $item->tgl_lahir }}">
            </div>

            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jk" class="form-control">
                    <option value="{{ $item->jk }}">Data Sebelumnya({{ $item->jk }})</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Golongan Darah</label>
                <select name="gol_darah" class="form-control">
                    <option value="{{ $item->gol_darah }}">Data Sebelumnya({{ $item->gol_darah }})</option>
                    <option value="O">O</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat"  rows="10" class="form-control">{{ $item->alamat }}</textarea>
            </div>

            <div class="form-group">
                <label for="">Angkatan</label>
                <input type="text" name="angkatan" class="form-control" placeholder="Angkatan" value="{{ $item->angkatan }}">
            </div>

            <div class="form-group">
                <label for="">Tanggal Masuk</label>
                <input type="date" name="tgl_masuk" class="form-control" placeholder="Tanggal Masuk" value="{{ $item->tgl_masuk }}">
            </div>

            <div class="form-group">
                <label for="">Nama Asal Sekolah</label>
                <input type="text" name="nama_sekolah_asal" class="form-control " placeholder="Nama Asal Sekolah" value="{{ $item->nama_sekolah_asal }}">
            </div>

            <div class="form-group">
                <label for="">Alamat Asal Sekolah</label>
                <textarea name="alamat_sekolah_asal"  rows="10" class="form-control">{{ $item->alamat_sekolah_asal }}</textarea>
            </div>

            <div class="form-group">
                <label for="">Anak Ke</label>
                <input type="text" name="anak_ke" class="form-control" placeholder="Anak Ke" value="{{ $item->anak_ke }}">
            </div>

            <div class="form-group">
                <label for="">Status Anak</label>
                <input type="text" name="status_anak" class="form-control" placeholder="Status Anak" value="{{ $item->status_anak }}">
            </div>

            <div class="col mb-5 mt-5">
                <img src="{{ Storage::url($item->foto) }}" alt="" width="150px" class="img-thumbnail">
            </div>

            <div class="form-group">
                <label for="">Foto</label>
                <input type="file" name="foto" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <select name="status" class="form-control">
                    <option value="{{ $item->status }}">Data Sebelumnya({{ $item->status }})</option>
                    <option value="bersekolah">Bersekolah</option>
                    <option value="berhenti">Berhenti</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Nama Ayah</label>
                <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah" value="{{ $item->nama_ayah }}">
            </div>

            <div class="form-group">
                <label for="">Nama Ibu</label>
                <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu" value="{{ $item->nama_ibu }}">
            </div>

            <div class="form-group">
                <label for="">Pekerjaan Ayah</label>
                <input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan Ayah" value="{{ $item->pekerjaan_ayah }}">
            </div>

            <div class="form-group">
                <label for="">Pekerjaan Ibu</label>
                <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan Ibu" value="{{ $item->pekerjaan_ibu }}">
            </div>

            <div class="form-group">
                <label for="">Alamat Orang Tua</label>
                <textarea name="alamat_orang_tua"  rows="10" class="form-control">{{ $item->alamat_orang_tua }}</textarea>
            </div>

            <div class="form-group">
                <label for="">No Telpon Orang Tua</label>
                <input type="text" name="no_telpon_orang_tua" class="form-control" placeholder="No Telpon Orang Tua" value="{{ $item->no_telpon_orang_tua }}">
            </div>

            <div class="form-group">
                <label for="">Nama Wali</label>
                <input type="text" name="nama_wali" class="form-control" placeholder="Nama Wali" value="{{ $item->nama_wali }}">
            </div>

            <div class="form-group">
                <label for="">Alamat Wali</label>
                <textarea name="alamat_wali"  rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="">Pekerjaan Wali</label>
                <input type="text" name="pekerjaan_wali" class="form-control" placeholder="Pekerjaan Wali" value="{{ $item->pekerjaan_wali }}">
            </div>

            <div class="form-group">
                <label for="">No Telpon Wali</label>
                <input type="text" name="no_telpon_wali" class="form-control" placeholder="No Telpon Wali" value="{{ $item->no_telpon_wali }}">
            </div>



            <button class="btn btn-block btn-warning" type="submit">
                Ubah
            </button>
        </form>

    </div>
    </div>

</div>
@endsection
