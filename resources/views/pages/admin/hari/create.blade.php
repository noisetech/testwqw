@extends('layouts.admin')

@section('title', 'Tambah hari')
@section('content')
<div class="container-fluid">



    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-start m-0">
                <div class="font-weight-bold text-primary mt-3">
                    <p>Tambah Hari</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('hari.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="">Hari</label>
                    <input type="text" name="hari" class="form-control" placeholder="Hari" value="{{ old('hari') }}">
                </div>

                <button class="btn btn-block btn-success" type="submit">
                    Simpan
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
