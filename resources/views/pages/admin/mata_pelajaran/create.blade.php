@extends('layouts.admin')

@section('title', 'Tambah Mata Pelajaran')
@section('content')
<div class="container-fluid">


    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-start m-0">
                <div class="font-weight-bold text-primary mt-3">
                    <p>Tambah mata pelajaran</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('proses.tambah.mata.pelajaran') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="">Mata Pelajaran</label>
                    <input type="text" name="mata_pelajaran" class="form-control" placeholder="Mata Pelajaran" value="{{ old('mata_pelajaran') }}">
                </div>



                <button class="btn btn-block btn-success" type="submit">
                    Simpan
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
