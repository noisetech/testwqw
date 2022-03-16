@extends('layouts.kepala')

@section('title', 'Data Siswa')
@section('content')
    <div class="container-fluid mt-5 mb-5">

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card shadow mb-3">
                <div class="card-header">
                    <div class="font-weight-bold text-primary">
                        Hasil Pembelajaran
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center table-bordered">
                            <tr>
                                <th>Nama:</th>
                                <td>{{ $nama_siswa->nama_depan.' '.$nama_siswa->nama_belakang }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Ajaran:</th>
                                <td>{{ $hasil_pembelajaran->first()->jadwal_siswa->tahun. '/'. $hasil_pembelajaran->first()->jadwal_siswa->jadwal->semester->semester}}</td>
                            </tr>
                            <tr>
                                <th>Kelas:</th>
                                <td>{{ $hasil_pembelajaran->first()->jadwal_siswa->jadwal->kelas->kelas }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>Pengajar</th>
                                <th>Hasil Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hasil_pembelajaran as $key => $hasil_pembelajaran)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $hasil_pembelajaran->jadwal_siswa->jadwal->mata_pelajaran->mata_pelajaran }}
                                    </td>
                                    <td>{{ $hasil_pembelajaran->jadwal_siswa->jadwal->guru->nama_depan .' ' .$hasil_pembelajaran->jadwal_siswa->jadwal->guru->nama_belakang }}
                                    </td>
                                    <td>{{ $hasil_pembelajaran->rata }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
