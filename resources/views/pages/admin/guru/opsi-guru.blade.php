@extends('layouts.admin')

@section('title', 'Opsi Data Guru')
@section('content')
    <div class="container-fluid" style="margin-top: 60px;">

        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="font-weight-bold text-primary mt-2">
                        <p>Opsi Guru</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('cari.opsi.guru.by.tahun') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">Tahun</label>
                        <select name="tahun" class="form-control">
                            <option value="">Pilih Tahun</option>
                            @foreach ($tahun as $tahun)
                            <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-sm btn-primary" type="submit">
                        Proses
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
