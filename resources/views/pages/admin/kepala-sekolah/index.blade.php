@extends('layouts.admin')

@section('title', 'List Kepala Sekolah')
@section('content')
    <div class="container-fluid" style="margin-top: 60px;">

        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="font-weight-bold text-primary mt-2">
                        <p>List Kepala Sekolah</p>
                    </div>
                    <a href="{{ route('kepalasekolah.create') }}" class="btn btn-sm btn-primary text-white">
                        <i class="fas fa-sm fa-plus-circle"> </i>
                        Tambah data
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center table-bordered table-hover" cellspacing="0" width="100%" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Masa Jabatan</th>
                                <th>ALamat</th>
                                <th>No Telpon</th>
                                <th>Foto</th>
                                <th>Akun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->tempat_lahir.', '.\Carbon\Carbon::parse($item->tanggal_lahir)->isoFormat('DD-MM-Y') }}</td>
                                <td>
                                    @if ($item->tahun_mulai_masa_jabatan == '' && $item->tahun_selsai_masa_jabatan == '')

                                    @else
                                    {{ $item->tahun_mulai_masa_jabatan.' - '.$item->tahun_selsai_masa_jabatan }}
                                    @endif
                                </td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->no_telepon }}</td>
                                <td>
                                    @if (!empty($item->foto))
                                        <img src="{{ Storage::url($item->foto) }}" alt="" width="150" class="img-thumbnail rounded">
                                    @endif
                                </td>
                                <td>{{ $item->user->email }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('kepalasekolah.edit', $item->id) }}" class="btn btn-sm btn-warning mr-1">Edit</a>

                                        <a href="{{ route('kepalasekolah.destroy', $item->id) }}" class="btn btn-sm btn-danger delete-confirm">Hapus</a>
                                    </div>
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
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Anda yakin?',
                text: "Data akan terhapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Tidak',
                confirmButtonText: 'Hapus!'
            }).then(function(result) {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    </script>


    <script>
        @if (session('status'))
            Swal.fire({
            title: "{{ session('status') }}",
            text: "{{ session('status_text') }}",
            icon: "{{ session('status_code') }}",
            showConfirmButton: false,
            });
            setTimeout(window.location.reload.bind(window.location), 1500);
        @endif
    </script>
@endpush
