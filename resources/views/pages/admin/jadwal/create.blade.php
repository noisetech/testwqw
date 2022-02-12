@extends('layouts.admin')

@section('title', 'Tambah Jadwal')
@section('content')
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-start m-0">
                    <div class="font-weight-bold text-primary pt-3">
                        <p>Tambah jadwal</p>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('jadwal.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">Mata Pelajaran</label>
                        <select name="mata_pelajaran_id"
                            class="form-control @error('mata_pelajaran_id') is-invalid @enderror">
                            <option value="">Pilih Mata Pelajaran</option>
                            @foreach ($mata_pelajaran as $mata_pelajaran)
                                <option value="{{ $mata_pelajaran->id }}">{{ $mata_pelajaran->mata_pelajaran }}</option>
                            @endforeach
                        </select>
                        @error('mata_pelajaran_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Pengajar</label>
                        <select name="guru_id" class="form-control @error('guru_id') is-invalid @enderror">
                            <option value="">Pilih Pengajar</option>
                            @foreach ($guru as $guru)
                                <option value="{{ $guru->id }}">{{ $guru->nama_depan . ' ' . $guru->nama_belakang }}
                                </option>
                            @endforeach
                        </select>
                        @error('guru_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Tingkat</label>
                        <select name="tingkat" class="form-control">
                            <option value="">Pilih tingkat</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
                            <option value="">Pilih Kelas</option>
                            @foreach ($kelas as $kelas)
                                <option value="{{ $kelas->id }}">{{ $kelas->kelas . '' . $kelas->no_ruangan }}</option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Hari</label>
                        <select name="hari_id" class="form-control @error('hari_id') is-invalid @enderror">
                            <option value="">Pilih Hari</option>
                            @foreach ($hari as $hari)
                                <option value="{{ $hari->id }}">{{ $hari->hari }}</option>
                            @endforeach
                        </select>
                        @error('hari_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Semester</label>
                        <select name="semester_id" class="form-control @error('semester_id') is-invalid @enderror">
                            <option value="">Pilih Hari</option>
                            @foreach ($semester as $semester)
                                <option value="{{ $semester->id }}">{{ $semester->semester }}</option>
                            @endforeach
                        </select>
                        @error('semester_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror"
                            placeholder="Jam Mulai" value="{{ old('jam_mulai') }}">
                        @error('jam_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Jam jam_selsai</label>
                        <input type="time" name="jam_selsai" class="form-control @error('jam_selsai') is-invalid @enderror"
                            placeholder="Jam Selsai" value="{{ old('jam_selsai') }}">
                        @error('jam_selsai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>




                    <button class="btn btn-block btn-success" type="submit">
                        Simpan
                    </button>
                </form>

            </div>
        </div>

    </div>
@endsection
