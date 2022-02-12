@extends('layouts.admin')

@section('title', 'Mata Pelajaran')
@section('content')
<div class="container-fluid" style="margin-top: 60px;">



    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="font-weight-bold text-primary mt-2">
                    <p>Mata Pelajaran</p>
                </div>

                <a href="{{ route('create.tambah.mata.pelajaran') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-sm fa-plus-circle"></i>
                    Tambah data
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center table-hover" cellspacing="0" width="100%" id="dataTable">
                    <thead>
                        <tr>
                            <th>Mata Pelajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->mata_pelajaran }}</td>
                            <td>
                               <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('edit.mata.pelajaran', $item->id) }}" class="btn btn-sm btn-warning mr-2">
                                    <i class="fas fa-sm fa-edit"></i>
                                </a>

                                <a href="{{ route('destroy.mata.pelajaran', $item->id) }}" class="btn btn-sm btn-danger delete-confirm">
                                    <i class="fas fa-sm fa-trash-alt"></i>
                                    Hapus
                                </a>



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
@push('script')
{{-- <script src="{{ asset('backend/js/sweetalert.min.js') }}"></script> --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
