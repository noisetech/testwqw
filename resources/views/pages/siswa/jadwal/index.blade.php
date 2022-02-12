@extends('layouts.siswa')

@section('title', 'Jadwal')
@section('content')
    <div class="container-fluid" style="margin-top: 60px;">


        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-start m-0">
                    <div class="font-weight-bold text-dark pt-3">
                        <p style="font-size: 18px;">List jadwal yang tersedia</p>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('ambil-pelajaran') }}" method="POST">
                        @csrf

                        <table class="table table-bordered table-hover text-center" cellspacing="0" width="100%" id="dataTable">
                        <thead>
                            <tr>
                                <th>Mata Pelajar</th>
                                <th>Pengajar</th>
                                <th>Tingkat</th>
                                <th>Hari</th>
                                <th>Ruangan</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->mata_pelajaran->mata_pelajaran }}</td>
                                    <td>{{ $item->guru->nama_depan . ' ' . $item->guru->nama_belakang }}</td>
                                    <td>{{ $item->tingkat }}</td>
                                    <td>{{ $item->hari->hari }}</td>
                                    <td>{{ $item->kelas->kelas.''.$item->kelas->no_ruangan }}</td>
                                    <td>{{ $item->semester->semester }}</td>
                                    <td>
                                        @if ($item->jadwal_siswa->where('siswa_id', auth()->user()->siswa->id)->count() > 0)
                                            Sudah Mengambil Mata Pelajaran

                                        @else
                                        <input type="checkbox" name="jadwal_id[]" value="{{ $item->id }}">
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-sm btn-success mt-3" type="submit">
                Ambil Jadwal
            </button>
            </form>
            </div>
        </div>

    </div>
@endsection
