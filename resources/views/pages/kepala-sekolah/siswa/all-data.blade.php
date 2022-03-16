@extends('layouts.kepala')

@section('title', 'Semua Data Siswa')
@section('content')


    <div class="container-fluid mt-5 mb-5">

        <form method="POST" action="{{ route('kepala.sekolah.export.siswa') }}">
            @csrf

            <div class="row justify-content-around align-items-center">

                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label>Start Date:</label>
                        <div class="input-group">
                            <input id="startDate" type="date" name="startDate" class="form-control" required />
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label>End Date:</label>
                        <div class="input-group">
                            <input id="endDate" type="date" name="endDate" class="form-control" required />
                        </div>
                    </div>
                </div>

                <div class="col-sm4 col-md-4 col-lg-4">
                    <button class="btn btn-sm btn-success mb-3" type="submit" style="margin-top: 30px;">
                        Export Excel
                    </button>
                </div>

            </div>

        </form>



        <div class="card shadow">
            <div class="card-header">
                <div class="font-weight-bold text-primary m-0">
                    <p>List Semua Siswa</p>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center table-bordered table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>No Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->nama_depan . ' ' . $item->nama_belakang }}</td>
                                    <td>{{ $item->no_telpon_orang_tua }}</td>
                                    <td>
                                        <a href="{{ route('opsi-hasil-pembelajaran-siswa-bagian-kepala-sekolah', $item->id) }}" class="btn btn-sm btn-primary" class="btn btn-secondary"
                                            data-toggle="tooltip" data-placement="top" title="Hasil Pembelajaran">
                                            <i class="fas fa-sm fa-book-open"></i>
                                        </a>
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
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush
