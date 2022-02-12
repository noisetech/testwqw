@extends('layouts.admin')

@section('title', 'Jadwal')
@section('content')
    <div class="container-fluid" style="margin-top: 60px;">

        <div class="card shadow">
         <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="font-weight-bold text-primary mt-2">
                    <p>List Jadwal</p>
                </div>

                <a href="{{ route('jadwal.create') }}" class="btn btn-sm btn-primary">
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
                            <th>Mata Pelajar</th>
                            <th>Pengajar</th>
                            <th>Tingkat</th>
                            <th>Ruangan</th>
                            <th>Hari</th>
                            <th>Semester</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selsai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->mata_pelajaran->mata_pelajaran }}</td>
                                <td>{{ $item->guru->nama_depan . ' ' . $item->guru->nama_belakang }}</td>
                                <td>{{ $item->tingkat }}</td>
                                <td>{{ $item->kelas->kelas.' '.$item->kelas->no_ruangan}}</td>
                                <td>{{ $item->hari->hari }}</td>
                                <td>{{ $item->semester->semester }}</td>
                                <td>{{ $item->jam_mulai }}</td>
                                <td>{{ $item->jam_selsai }}</td>
                                <td>
                                <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('jadwal.edit', $item->id) }}" class="btn btn-sm btn-warning mr-2">
                                                <i class="fas fa-sm fa-edit"></i>
                                            </a>

                                            <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST">
                                                @csrf

                                                <input name="_method" type="hidden" value="DELETE">


                                                <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm"
                                                    data-toggle="tooltip" title='Delete'>
                                                    <i class="fas fa-sm fa-trash-alt"></i>
                                                </button>
                                            </form>
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
    <script type="text/javascript">

         $('.show_confirm').click(function(event) {
              var form =  $(this).closest("form");
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
