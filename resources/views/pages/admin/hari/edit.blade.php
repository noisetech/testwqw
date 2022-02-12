@extends('layouts.admin')

@section('title', 'Ubah hari')
@section('content')
<div class="container-fluid">

    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-start m-0">
                <div class="font-weight-bold text-primary mt-3">
                    <p>Ubah hari</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('hari.update', $item->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="">Hari</label>
                    <input type="text" name="hari" class="form-control" placeholder="Hari" value="{{ $item->hari }}">
                </div>

                <button class="btn btn-block btn-success" type="submit">
                    Ubah
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
