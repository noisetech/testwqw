@extends('layouts.kepala')

@section('title', 'Opsi Data Siswa')
@section('content')
<div class="container-fluid">

    <div class="card shadow">
        <div class="card-header">
            <div class="font-weight-bold text-primary m-0">
                <p>Opsi data siswa</p>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('cari.siswa.kepalasekolah') }}" method="POST">
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
                    Cari
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

