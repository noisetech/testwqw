@extends('layouts.admin')

@section('title', 'Manage-User')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('manage_user.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="">Mata Pelajaran</label>
                    <select name="mata_pelajaran_id" class="form-control">
                        <option value="">Pilih Mata Pelajaran</option>
                        @foreach ($mata_pelajaran as $mata_pelajaran)
                        <option value="{{ $mata_pelajaran->id }}">{{ $mata_pelajaran->mata_pelajaran }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Pengajar</label>
                    <select name="mata_pelajaran_id" class="form-control">
                        <option value="">Pilih Pengajar</option>
                        @foreach ($guru as $guru)
                        <option value="{{ $guru->id }}">{{ $guru->nama_depan.' '.$guru->nama_belakang }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Kelas</label>
                    <select name="mata_pelajaran_id" class="form-control">
                        <option value="">Pilih Kelas</option>
                        @foreach ($kelas as $kelas)
                        <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-block btn-primary" type="submit">
                    Simpan
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
