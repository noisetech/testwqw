@extends('layouts.admin')

@section('title', 'Tambah Kelas')
@section('content')
<div class="container-fluid">


    <div class="card shadow">
      <div class="card-header">
        <div class="d-flex justify-content-start m-0">
            <div class="font-weight-bold text-primary">
                <p>Tambah kelas</p>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('kelas.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="">Kelas</label>
                    <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="{{ old('kelas') }}">
                </div>

                <div class="form-group">
                    <label for="">No Ruangan</label>
                    <input type="text" name="no_ruangan" class="form-control" placeholder="No Ruangan" value="{{ old('no_ruangan') }}">
                </div>


                <div class="form-group">
                    <label for="">Wali Kelas</label>
                    <select name="guru_id" class="form-control">
                        <option value="">Pilih Wali Kelas</option>
                        @foreach ($guru as $guru)
                        <option value="{{ $guru->id }}">{{ $guru->nama_depan.' '.$guru->nama_belakang }}</option>
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

</div>
@endsection
