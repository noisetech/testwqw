@extends('layouts.guru')

@section('title', 'Jadwal Mengajar')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="card shadow mb-5">
            <div class="card-header">
                <div class="d-flex justify-content-start m-0">
                    <div class="font-weight-bold text-primary pt-3">
                        <p>Jadwal Mengajar</p>
                    </div>
                </div>
            </div>
            <div class="card-body bg-gray-100">
                <div class="table-responsive">
                    <table class="table text-center table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Semester</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selsai</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->mata_pelajaran->mata_pelajaran }}</td>
                                    <td>{{$item->kelas->kelas.''.$item->kelas->no_ruangan }}</td>
                                    <td>{{ $item->hari->hari }}</td>
                                    <td>{{ $item->semester->semester }} </td>
                                    <td>
                                        {{ $item->jam_mulai}}
                                    </td>
                                    <td>
                                        {{$item->jam_selsai}}
                                    </td>
                                    <td>
                                        <a href="{{ route('detail.jadwal.mengajar', $item->id) }}" class="btn btn-sm btn-primary">Detail Jadwal</a>
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

