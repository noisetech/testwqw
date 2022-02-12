@extends('layouts.admin')

@section('title', 'Ubah Tahun')
@section('content')
<div class="container-fluid">


    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-start m-0">
                <div class="font-weight-bold text-primary mt-3">
                    <p>Ubah tahun</p>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('tahun.update', $item->id) }}" method="POST">
                @csrf

                @method('put')

                <div class="form-group">
                    <label for="">Tahun</label>
                    <input type="text" name="tahun" class="form-control" placeholder="Tahun" value="{{ $item->tahun }}">
                </div>

                <button class="btn btn-block btn-success" type="submit">
                    Simpan
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
