@extends('layouts.guru')

@section('title', 'Input Nilai')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Input Nilai {{ $data->siswa->nama_depan.' '.$data->siswa->nama_belakang }}</h1>
    </div>


    <div class="card shadow">
        <div class="card-body">

    <form action="{{ route('proses.input.nilai.siswa', $data->id) }}" method="POST">
        @csrf

        <div class="form-group" hidden>
            <label for="">id siswa</label>
            <input type="number" class="form-control" name="jadwal_siswa_id"  value="{{ $data->id }}">
        </div>

        <div class="form-group">
            <label for="">Tugas</label>
            <input type="number" class="form-control" name="tugas" >
        </div>

        <div class="form-group">
            <label for="">Uts</label>
            <input type="number" class="form-control" name="uts" >
        </div>


        <div class="form-group">
            <label for="">Uas</label>
            <input type="number" class="form-control" name="uas" >
        </div>

        <button class="btn btn-block btn-primary" type="submit">
            Proses
        </button>


        </form>
        </div>
    </div>

</div>
@endsection
