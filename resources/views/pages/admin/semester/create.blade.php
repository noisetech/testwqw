@extends('layouts.admin')

@section('title', 'Tambah Semester')
@section('content')
<div class="container-fluid">

    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-start m-0">
                <div class="font-weight-bold text-primary mt-3">
                    <p>Tamah semester</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('semester.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="">Semester</label>
                    <input type="text" name="semester" class="form-control" placeholder="Semester" value="{{ old('semester') }}">
                </div>

                <button class="btn btn-block btn-success" type="submit">
                    Simpan
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
