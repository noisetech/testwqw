@extends('layouts.admin')
@section('title', 'Siswa')
@section('content')
    <div class="container-fluid" style="margin-top: 60px;">

        <div class="row">
            <div class="col-lg-6 col-d-4 col-sm-4">
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
                <div class="d-flex justify-content-between align-items-center">
                    <div class="font-weight-bold text-primary mt-2">
                        <p>List Siswa</p>
                    </div>

                    <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary">
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
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key =>  $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->nama_depan . ' ' . $item->nama_belakang }}</td>
                                    <td>
                                        <img src="{{ Storage::url($item->foto) }}" alt="" width="150px"
                                            class="img-thumbnail">
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('siswa.show', $item->id) }}"
                                                class="btn btn-sm btn-primary mr-2">
                                                <i class="fas fa-sm fa-eye"></i>
                                            </a>

                                            <a href="{{ route('siswa.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning mr-2">
                                                <i class="fas fa-sm fa-edit"></i>
                                            </a>

                                            <form action="{{ route('siswa.destroy', $item->id) }}" method="POST"
                                                style="display: inline-block">
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
