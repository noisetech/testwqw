@extends('layouts.admin')

@section('title', 'Ubah Kelas')
@section('content')
<div class="container-fluid">

    <div class="card shadow">
      <div class="card-header">
        <div class="d-flex justify-content-start m-0">
            <div class="font-weight-bold text-primary mt-3">
                <p>Ubah kelas</p>
            </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('kelas.update', $item->id) }}" method="POST">
            @csrf

            @method('put')

            <div class="form-group">
                <label for="">Kelas</label>
                <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="{{ $item->kelas }}">
            </div>

            <div class="form-group">
                <label for="">No Ruangan</label>
                <input type="text" name="no_ruangan" class="form-control" placeholder="No Ruangan" value="{{ $item->no_ruangan }}">
            </div>


            <div class="form-group">
                <label for="">Wali Kelas</label>
                <select name="guru_id" class="form-control">
                    <option value="{{ $item->guru_id }}">Jangan Diubah {{ $item->guru->nama_depan.' '.$item->guru->nama_belakang }}</option>
                    @foreach ($guru as $guru)
                    <option value="{{ $guru->id }}">{{ $guru->nama_depan.' '.$guru->nama_belakang }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-block btn-success text-white" type="submit">
                Ubah
            </button>
        </form>

    </div>
    </div>

</div>
@endsection
