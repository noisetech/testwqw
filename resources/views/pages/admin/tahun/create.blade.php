@extends('layouts.admin')

@section('title', 'Tambah tahun')
@section('content')
    <div class="container-fluid mt-5">

        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-start m-0">
                            <div class="font-weight-bold text-primary mt-3">
                                <p>Tambah tahun</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tahun.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="">Tahun</label>
                                <input type="text" name="tahun" class="form-control" placeholder="Tahun"
                                    value="{{ old('tahun') }}">
                            </div>


                            <button class="btn btn-sm btn-success" type="submit">
                                Simpan
                            </button>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
