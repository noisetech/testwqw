@extends('layouts.siswa')

@section('title', 'halaman data diri siswa')

@section('content')

    <style>
        th, td{
            font-size: 14px;
        }
    </style>

    <div class="container-fluid" style="margin-top: 60px;">

        <div class="row mb-4">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-start m-0">
                            <div class="font-weight-bold text-dark pt-3">
                                <p style="font-size: 14px;">Silahkan tekan tombol cetak <br> jika ingin mencetak data diri</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center m-0">
                            <a href="{{ route('cetak.data.diri') }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-sm fa-file"></i>
                                Cetak data diri
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-5">
            <div class="card-header">
                <div class="d-flex justify-content-start m-0">
                    <div class="font-weight-bold text-primary pt-3">
                        <p>Halaman data diri</p>
                    </div>
                </div>
            </div>
            <div class="card-body bg-gray-100">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6  mb-3">
                        <div class="d-flex justify-content-center mt-5">
                            <div class="card">
                                <div class="card-header">
                                    <div class="font-weight-bold text-dark">
                                        <p>Foto</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <img src="{{ Storage::url($datadiri->foto) }}" alt="" width="250px" height="250px" class="img-thumbnail rounded">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="d-flex justify-content-start">
                          <div class="card">
                            <div class="card-header">
                                <div class="font-weight-bold text-dark">
                                    <p>Data anda</p>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <td>{{ $datadiri->nama_depan.' '.$datadiri->nama_belakang }}</td>
                                        </tr>

                                        <tr>
                                            <th>Tempat, Tanggal lahir</th>
                                            <td>{{ $datadiri->tempat_lahir.', '. \Carbon\Carbon::parse($datadiri->tgl_lahir)->isoFormat('D MMMM Y') }}</td>
                                        </tr>

                                        <tr>
                                            <th>No Telepon Orang Tua</th>
                                            <td>{{ $datadiri->no_telpon_orang_tua }}</td>
                                        </tr>

                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $datadiri->alamat}}</td>
                                        </tr>

                                        <tr>
                                            <th>Nama Ayah</th>
                                            <td>{{ $datadiri->nama_ayah}}</td>
                                        </tr>

                                        <tr>
                                            <th>Nama Ibu</th>
                                            <td>{{ $datadiri->nama_ibu}}</td>
                                        </tr>

                                        <tr>
                                            <th colspan="2">
                                                <a href="{{ route('datadiri.edit', $datadiri->id) }}" class="btn btn-sm btn-warning">
                                                    Ubah data
                                                </a>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
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
