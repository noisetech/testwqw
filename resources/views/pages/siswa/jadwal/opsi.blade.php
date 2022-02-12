@extends('layouts.siswa')

@section('title', 'Opsi List Jadwal')
@section('content')
    <div class="container-fluid">


        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-start m-0">
                    <div class="font-weight-bold text-dark pt-3">
                        <p style="font-size: 18px;">Opsi list jadwal</p>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('mencari.opsi-jadwal') }}" method="POST">
                   @csrf

                   <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="form-group">
                        <label for="">Tahun</label>
                        <select name="tahun" class="form-control">
                            <option value="">Pilihan Tahun</option>
                            @foreach ($tahun as $tahun)
                            <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Tahun</label>
                        <select name="semester_id" class="form-control">
                            <option value="">Pilihan Semester</option>
                            @foreach ($semester as $semester)
                            <option value="{{ $semester->id }}">{{ $semester->semester }}</option>
                            @endforeach
                        </select>
                    </div>


                    <button class="btn btn-sm btn-success" type="submit">
                        Cari
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
