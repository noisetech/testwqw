@extends('layouts.admin')

@section('title', 'Guru')
@section('content')
    <div class="container-fluid" style="margin-top: 60px;">


        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="font-weight-bold text-primary mt-2">
                        <p>List Guru</p>
                    </div>
                    <a href="{{ route('guru.create') }}" class="btn btn-sm btn-primary">
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
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->nama_depan . ' ' . $item->nama_belakang }}</td>
                                    <td>
                                        <img src="{{ Storage::url($item->gambar) }}" alt="" width="150px"
                                            class="img-thumbnail rounded">
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('guru.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning mr-2">
                                                <i class="fas fa-sm fa-edit"></i>
                                            </a>

                                            <a href="{{ route('guru.show', $item->id) }}"
                                                class="btn btn-sm btn-primary mr-2">
                                                <i class="fas fa-sm fa-eye"></i>
                                            </a>

                                            <form action="{{ route('guru.destroy', $item->id) }}" method="POST">
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

