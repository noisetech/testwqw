@extends('layouts.admin')

@section('title', 'Ubah Semester')
@section('content')
<div class="container-fluid">


    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-start m-0">
                <div class="font-weight-bold text-primary">
                    <p>Ubah semester</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('semester.update', $item->id) }}" method="POST">
                @csrf

                @method('put')

                <div class="form-group">
                    <label for="">Semester</label>
                    <input type="text" name="semester" class="form-control" placeholder="Semester" value="{{ $item->semester }}">
                </div>

                <button class="btn btn-block btn-success" type="submit">
                    Ubah
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
