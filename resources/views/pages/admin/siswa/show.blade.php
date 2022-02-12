@extends('layouts.admin')

@section('title', 'Detail Siswa')
@section('content')
    <div class="container-fluid" style="margin-top: 60px;">

        <div class="d-flex justify-content-center mb-5">
            <div class="card shadow" style="width: 50rem;">
                <div class="card-body">
                    <div class="card-header">
                       <div class="d-flex justify-content-start pt-3">
                            <div class="font-weight-bold text-gray-900">
                                <p style="font-size: 16px; font-style: italic;">
                                    @if ($item->jk == 'L')
                                        Data diri saudara {{ $item->nama_depan . ' ' . $item->nama_belakang }}
                                    @else
                                        Data diri saudari {{ $item->nama_depan . ' ' . $item->nama_belakang }}
                                    @endif
                                </p>
                            </div>
                       </div>
                    </div>
                    <div class="card-body">
                        <table class="table text-center table-borderless">
                            @if (empty($item->nama_wali) | ($item->nama_wali == '-'))
                                <tr>
                                    <th>Nisn:</th>
                                    <td>{{ $item->nisn }}</td>
                                </tr>
                                <tr>
                                    <th>Nama lengkap: </th>
                                    <td>{{ $item->nama_depan . ' ' . $item->nama_belakang }}</td>
                                </tr>
                                <tr>
                                    <th>Tempat, Tanggal Lahir: </th>
                                    <td>{{ $item->tempat_lahir . ', ' . \Carbon\Carbon::parse($item->tgl_lahir)->isoFormat('D-MM-Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin:</th>
                                    <td>{{ $item->jk }}</td>
                                </tr>
                                <tr>
                                    <th>Golongan Darah:</th>
                                    <td>{{ $item->gol_darah }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat:</th>
                                    <td>{{ $item->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Angkatan:</th>
                                    <td>{{ $item->angkatan }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Masuk:</th>
                                    <td>{{ $item->tgl_masuk }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Asal Sekolah:</th>
                                    <td>{{ $item->nama_sekolah_asal }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat Asal Sekolah:</th>
                                    <td>{{ $item->alamat_sekolah_asal }}</td>
                                </tr>
                                <tr>
                                    <th>Anak Ke:</th>
                                    <td>{{ $item->anak_ke }}</td>
                                </tr>
                                <tr>
                                    <th>Status Anak:</th>
                                    <td>{{ $item->status_anak }}</td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>{{ $item->status }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Ayah:</th>
                                    <td>{{ $item->nama_ayah }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Ibu:</th>
                                    <td>{{ $item->nama_ibu }}</td>
                                </tr>
                            @else
                            <tr>
                                <th>Nisn:</th>
                                <td>{{ $item->nisn }}</td>
                            </tr>
                            <tr>
                                <th>Nama lengkap: </th>
                                <td>{{ $item->nama_depan . ' ' . $item->nama_belakang }}</td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir: </th>
                                <td>{{ $item->tempat_lahir . ', ' . \Carbon\Carbon::parse($item->tgl_lahir)->isoFormat('D-MM-Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin:</th>
                                <td>{{ $item->jk }}</td>
                            </tr>
                            <tr>
                                <th>Golongan Darah:</th>
                                <td>{{ $item->gol_darah }}</td>
                            </tr>
                            <tr>
                                <th>Alamat:</th>
                                <td>{{ $item->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Angkatan:</th>
                                <td>{{ $item->angkatan }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Masuk:</th>
                                <td>{{ $item->tgl_masuk }}</td>
                            </tr>
                            <tr>
                                <th>Nama Asal Sekolah:</th>
                                <td>{{ $item->nama_sekolah_asal }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Asal Sekolah:</th>
                                <td>{{ $item->alamat_sekolah_asal }}</td>
                            </tr>
                            <tr>
                                <th>Anak Ke:</th>
                                <td>{{ $item->anak_ke }}</td>
                            </tr>
                            <tr>
                                <th>Status Anak:</th>
                                <td>{{ $item->status_anak }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>{{ $item->status }}</td>
                            </tr>
                            <tr>
                                <th>Nama Wali:</th>
                                <td>{{ $item->nama_wali }}</td>
                            </tr>
                            <tr>
                                <th>Nama Telepon Wali:</th>
                                <td>{{ $item->no_telpon_wali }}</td>
                            </tr>
                            @endif



                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
