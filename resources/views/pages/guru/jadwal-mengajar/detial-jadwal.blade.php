@extends('layouts.guru')

@section('title', 'Detail Jadwal Mengajar')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Detail Jadwal Kelas {{ $item->kelas->kelas.''.$item->kelas->no_ruangan }}</h1>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Tugas</th>
                            <th>Uts</th>
                            <th>Uas</th>
                            <th>Nilai Akhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item->jadwal_siswa as $jadwal_siswa)
                        <tr>
                            <td>{{ $jadwal_siswa->siswa->nama_depan.' '.$jadwal_siswa->siswa->nama_belakang }}</td>
                            <td>{{ $jadwal_siswa->hasil_pembelajaran['tugas'] }}</td>
                            <td>{{ $jadwal_siswa->hasil_pembelajaran['uts'] }}</td>
                            <td>{{ $jadwal_siswa->hasil_pembelajaran['uas'] }}</td>
                            <td>{{ $jadwal_siswa->hasil_pembelajaran['rata'] }}</td>
                            <td>
                                @if (empty($jadwal_siswa->hasil_pembelajaran))
                                <a href="{{ route('halaman_input_nilai_siswa', $jadwal_siswa->id) }}" class="btn btn-sm btn-primary">Input Nilai</a>
                                @elseif ($jadwal_siswa->hasil_pembelajaran->count() > 0)
                                <a href="{{ route('halaman_ubah_nilai_siswa', $jadwal_siswa->id) }}" class="btn btn-sm btn-warning">Ubah Nilai</a>
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

