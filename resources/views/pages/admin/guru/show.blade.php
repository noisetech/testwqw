@extends('layouts.admin')

@section('title', 'Detail Guru')
@section('content')
    <div class="container-fluid" style="margin-top: 60px;">

        <div class="d-flex justify-content-center mb-5">
            <div class="card shadow" style="width: 30rem;">
                <div class="card-body">
                    <div class="card-header">
                        <h3 class="text-center" style="color: #2C3333; font-style: italic; ">
                          @if ($item->jk == "L")
                          Data diri saudara {{ $item->nama_depan.' '.$item->nama_belakang }}
                          @else
                          Data diri saudari {{ $item->nama_depan.' '.$item->nama_belakang }}
                          @endif
                        </h4>
                      </div>
                      <div class="card-body">
                          <table class="table text-center table-bordered">
                              <tr>
                                  <th>Nama lengkap: </th>
                                  <td>{{ $item->nama_depan.' '.$item->nama_belakang }}</td>
                              </tr>
                              <tr>
                                  <th>Tempat, tanggal lahir: </th>
                                  <td>{{ $item->tempat_lahir.', '.  \Carbon\Carbon::parse($item->tgl_lahir)->isoFormat('D-MM-Y') }}</td>
                              </tr>
                              <tr>
                                  <th>Jenis Kelamin: </th>
                                  <td>{{ $item->jk }}</td>
                              </tr>

                              <tr>
                                  <th>Alamat: </th>
                                  <td>{{ $item->alamat }}</td>
                              </tr>
                              <tr>
                                  <th>Email Pribadi: </th>
                                  <td>{{ $item->email }}</td>
                              </tr>
                              <tr>
                                  <th>No Telepon: </th>
                                  <td>{{ $item->no_telpon }}</td>
                              </tr>
                              <tr>
                                  <th>Agama: </th>
                                  <td>{{ $item->agama }}</td>
                              </tr>
                              <tr>
                                  <th>Golongan: </th>
                                  <td>{{ $item->golongan }}</td>
                              </tr>
                              <tr>
                                  <th>Status: </th>
                                  <td>{{ $item->status }}</td>
                              </tr>
                              <tr>
                                  <th>Bidang Pelajaran: </th>
                                  <td>{{ $item->mata_pelajaran->mata_pelajaran }}</td>
                              </tr>
                              <tr>
                                <th>Email Keguruan: </th>
                                <td>{{ $item->user->email }}</td>
                            </tr>
                          </table>
                      </div>

                </div>
            </div>
        </div>
    </div>
@endsection
