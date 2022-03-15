@extends('layouts.admin')

@section('title', 'Jadwal')
@section('content')
    <style>
        p {
            font-size: 16px;
        }

    </style>

    <div class="container-fluid mb-5">

        <div class="d-flex justify-content-start">
            <div class="col-lg-4 col-d-4 col-sm-4">
                <div class="card shadow mb-4">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Total Siswa : {{ $total_siswa }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="font-weight-bold text-primary mt-2">
                        <p>Jadwal siswa</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center table-bordered table-hover" cellspacing="0" width="100%" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mata Pelajar</th>
                                <th>Pengajar</th>
                                <th>Kelas</th>
                                <th>Semester</th>
                                <th>Hasil Pembelajaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->jadwal->mata_pelajaran->mata_pelajaran }}</td>
                                    <td>{{ $item->jadwal->guru->nama_depan . ' ' . $item->jadwal->guru->nama_belakang }}</td>
                                    <td>{{ $item->jadwal->kelas->kelas . '' . $item->jadwal->kelas->no_ruangan }}</td>
                                    <td>{{ $item->jadwal->semester->semester }}</td>
                                    <td>
                                        @if (empty($item->hasil_pembelajaran))
                                            belum mendapatkan nilai
                                        @else

                                        {{ $item->hasil_pembelajaran->rata }}
                                        @endif
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
