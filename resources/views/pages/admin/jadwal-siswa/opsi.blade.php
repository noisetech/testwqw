@extends('layouts.admin')

@section('title', 'Jadwal')
@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="font-weight-bold text-primary mt-2">
                        <p>Opsi jadwal siswa</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('cari.opsi.jadwal.siswa.admin') }}" method="POST">
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

                    <div class="form-group">
                        <label for="">Semester</label>
                        <select name="semester" class="form-control">
                            <option value="">Pilih Tahun</option>
                            @foreach ($semester as $semester)
                            <option value="{{ $semester->semester }}">{{ $semester->semester }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Mata Pelajaran</label>
                        <select name="mata_pelajaran" class="form-control">
                            <option value="">Pilih Mata Pelajaran</option>
                            @foreach ($mata_pelajaran as $mata_pelajaran)
                            <option value="{{ $mata_pelajaran->mata_pelajaran }}">{{ $mata_pelajaran->mata_pelajaran }}</option>
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
