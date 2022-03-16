@extends('layouts.kepala')

@section('title', 'Opsi Hasil Pembelajaran Siswa')
@section('content')


    <div class="container-fluid mt-5 mb-5">


        <div class="card shadow">
            <div class="card-header">
                <div class="font-weight-bold text-primary m-0">
                    <p>Opsi hasil pembelajaran siswa</p>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('hasil_pembelajaran_siswa_bagian_kepala_sekolah', $siswa->id) }}" method="POST">
                    @csrf

                    <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">

                    <div class="form-group">
                        <label for="">Tahun</label>
                        <select name="tahun" class="form-control">
                            <option value="">Pilih tahun</option>
                            @foreach ($tahun as $tahun)
                            <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Semester</label>
                        <select name="semester" class="form-control">
                            <option value="">Pilih Semester</option>
                            @foreach ($semester as $semester)
                            <option value="{{ $semester->id }}">{{ $semester->semester }}</option>
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


