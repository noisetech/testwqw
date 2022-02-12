@extends('layouts.admin')

@section('title', 'Tagihan Administrasi')
@section('content')
    <div class="container-fluid" style="margin-top: 60px;">

        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="font-weight-bold text-primary mt-2">
                        <p>Tagihan Administrasi</p>
                    </div>

                    <a href="{{ route('tagihan_administrasi.create') }}" class="btn btn-sm btn-primary text-white">
                        <i class="fas fa-sm fa-plus-circle"></i>
                        Tambah data
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center table-bordered table-hover" cellspacing="0" width="100%" id="dataTable">
                        <thead>
                            <tr>
                                <th>Tagihan Adminitrasi</th>
                                <th>Siswa</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->pembayaran_administrasi->kategori_pembayaran }}</td>
                                    <td>{{ $item->siswa->nama_depan . ' ' . $item->siswa->nama_belakang }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('tagihan_administrasi.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-sm fa-edit"></i>
                                        </a>

                                        <form action="{{ route('tagihan_administrasi.destroy', $item->id) }}"
                                            method="POST" style="display: inline-block">
                                            @csrf

                                            <input name="_method" type="hidden" value="DELETE">


                                            <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm"
                                                data-toggle="tooltip" title='Delete'>
                                                <i class="fas fa-sm fa-trash-alt"></i>
                                            </button>
                                        </form>
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
