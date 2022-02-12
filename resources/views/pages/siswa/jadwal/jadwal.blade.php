@extends('layouts.siswa')

@section('title', 'Jadwal')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jadwal Anda</h1>
    </div>


    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center table-bordered table-hover" cellspacing="0" width="100%" id="dataTable">
                    <thead>
                        <tr>
                            <th>Mata Pelajar</th>
                            <th>Pengajar</th>
                            <th>Tingkat</th>
                            <th>Ruangan</th>
                            <th>Hari</th>
                            <th>Semester</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->jadwal->mata_pelajaran->mata_pelajaran}}</td>
                            <td>{{ $item->jadwal->guru->nama_depan.' '.$item->jadwal->guru->nama_belakang}}</td>
                            <td>{{ $item->jadwal->tingkat }}</td>
                            <td>{{ $item->jadwal->kelas->kelas.' '.$item->jadwal->kelas->no_ruangan }}</td>
                            <td>{{ $item->jadwal->hari->hari }}</td>
                            <td>{{ $item->jadwal->semester->semester }}</td>
                            <td>{{ $item->jadwal->jam_mulai }}</td>
                            <td>{{ $item->jadwal->jam_selsai }}</td>
                            <td>
                                <a href="{{ route('hapus_jadwal_pelajaran', $item->id) }}" class="btn btn-sm btn-danger">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
