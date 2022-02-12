@extends('layouts.siswa')

@section('title', 'halaman dashboard admin')

@section('content')
<div class="container-fluid" style="margin-top: 60px;">

    <div class="card shadow">
        <div class="card-header">
            <p class="m-0 font-weight-bold text-primary">Data Jadwal Pelajaran</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center table-bordered table-hover" cellspacing="0" width="100%" id="dataTable">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Semester</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru Pengajar</th>
                            <th>Tingkat</th>
                            <th>Ruangan</th>
                            <th>Hari Pembelajaran</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selsai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->tahun }}</td>
                            <td>{{ $item->jadwal->semester->semester }}</td>
                            <td>{{ $item->jadwal->mata_pelajaran->mata_pelajaran }}</td>
                            <td>{{ $item->jadwal->guru->nama_depan.' '.$item->jadwal->guru->nama_belakang }}</td>
                            <td>{{$item->jadwal->tingkat }}</td>
                            <td>{{ $item->jadwal->kelas->kelas. ' '.$item->jadwal->kelas->no_ruangan }}</td>
                            <td>{{ $item->jadwal->hari->hari }}</td>
                            <td>{{ $item->jadwal->jam_mulai }}</td>
                            <td>{{ $item->jadwal->jam_selsai }}</td>
                            <td>
                                <a href="{{ route('hapus_jadwal_pelajaran', $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin menghapus data?');">
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
