@extends('layouts.admin')

@section('title', 'Ubah Mata Pelajaran')
@section('content')
<div class="container-fluid">


    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-start m-0">
                <div class="font-weight-bold text-primary mt-3">
                    <p>Ubah mata pelajaran</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('mata_pelajaran.update', $item->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="">Mata Pelajaran</label>
                    <input type="text" name="mata_pelajaran" class="form-control" placeholder="Mata Pelajaran" value="{{ $item->mata_pelajaran }}">
                </div>

                <button class="btn btn-block btn-success" type="submit">
                    Ubah
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
