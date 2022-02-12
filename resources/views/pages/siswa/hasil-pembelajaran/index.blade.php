@extends('layouts.siswa')

@section('title', 'Hasil Pembelajaran')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hasil Pembelajaran</h1>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Mata Pelajaran</th>
                            <th>Tugas</th>
                            <th>Uts</th>
                            <th>Uas</th>
                            <th>Rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->jadwal_siswa->jadwal->mata_pelajaran->mata_pelajaran }}</td>
                            <td>{{ $item->tugas }}</td>
                            <td>{{ $item->uts }}</td>
                            <td>{{ $item->uas }}</td>
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
