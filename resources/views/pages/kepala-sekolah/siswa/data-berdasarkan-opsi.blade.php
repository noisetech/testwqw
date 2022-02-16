@extends('layouts.kepala')

@section('title', 'Data Siswa')
@section('content')
    <div class="container-fluid mt-5 mb-5">

        <div class="d-flex justify-content-start">
            <div class="col-lg-4 col-d-4 col-sm-4">
                <div class="card shadow mb-4">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Total Siswa : {{ $total_siswa }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card shadow">
            <div class="card-header">
                <div class="font-weight-bold text-primary m-0">
                    <p>List Siswa</p>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center table-bordered table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>No Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswas as $item)
                                <tr>
                                    <td>{{ $item->nama_depan . ' ' . $item->nama_belakang }}</td>
                                    <td>{{ $item->tempat_lahir . ' ' . \Carbon\Carbon::parse($item->tgl_lahir)->isoFormat('DD-MM-Y') }}
                                    </td>
                                    <td>{{ $item->jk }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->nama_ayah }}</td>
                                    <td>{{ $item->nama_ibu }}</td>
                                    <td>{{ $item->no_telpon_orang_tua }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
