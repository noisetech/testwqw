@extends('layouts.admin')

@section('title', 'Jadwal')
@section('content')
    <div class="container-fluid">


        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="font-weight-bold text-primary mt-2">
                        <p>Jadwal siswa</p>
                    </div>

                    <a href="" class="btn btn-sm btn-primary">
                        <i class="fas fa-sm fa-plus-circle"> Tambah data</i>
                    </a>
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
                                <th>Hari</th>
                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->jadwal->mata_pelajaran->mata_pelajaran }}</td>
                                <td>{{ $item->jadwal->guru->nama_depan.' '.$item->jadwal->guru->nama_belakang }}</td>
                                <td>{{ $item->jadwal->kelas->kelas.''.$item->jadwal->kelas->no_ruangan }}</td>
                                <td>{{ $item->jadwal->hari->hari }}</td>
                                <td>{{ $item->jadwal->semester->semester }}</td>
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
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Anda yakin ingin menghapus data?`,
                    text: "Data akan terhapus",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>


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
