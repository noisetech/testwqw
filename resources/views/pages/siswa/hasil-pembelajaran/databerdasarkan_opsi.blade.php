@extends('layouts.siswa')

@section('title', 'Hasil Pembelajaran')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hasil Pembelajaran</h1>
    </div>

    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <a href="{{ route('cetak.hasil.pembelajaran') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-sm fa-file mr-1">
            </i>
            Cetak
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center" cellspacing="0" width="100%" id="dataTable">
                    <thead>
                        <tr>
                            <th>Tahun Ajaran</th>
                            <th>Mata Pelajaran</th>
                            <th>Tingkat</th>
                            <th>Ruangan</th>
                            <th>Guru Pengajar</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->jadwal_siswa->tahun.' / '.$item->jadwal_siswa->jadwal->semester->semester }}</td>
                            <td>{{ $item->jadwal_siswa->jadwal->mata_pelajaran->mata_pelajaran }}</td>
                            <td>{{ $item->jadwal_siswa->jadwal->tingkat }}</td>
                            <td>{{ $item->jadwal_siswa->jadwal->kelas->kelas.' '.$item->jadwal_siswa->jadwal->kelas->no_ruangan }}</td>
                            <td>{{ $item->jadwal_siswa->jadwal->guru->nama_depan.' '.$item->jadwal_siswa->jadwal->guru->nama_belakang }}</td>
                            <td>{{ $item->rata }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
@endsection
@push('script')
    <script src="{{ asset('backend/js/sweetalert.min.js') }}"></script>

    <script>
        @if (session('status'))
            swal({
            title: "{{ session('status') }}",
            text: "{{ session('status_text') }}",
            icon: "{{ session('status_code') }}",
            buttons: false
            });
            setTimeout(window.location.reload.bind(window.location), 2500);
        @endif
    </script>
@endpush
