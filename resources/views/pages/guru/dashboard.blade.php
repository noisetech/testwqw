@extends('layouts.guru')

@section('title', 'Dashboard Guru')
@section('content')
    <div class="container-fluid" style="margin-top: 120px;">

        <div class="card shadow" style="height: 200px;">
            <div class="card-body">
                <div class="d-flex justify-content-center mt-5">
                    @if ($guru->jk == "P")
                        <h3>
                            Selamat Datang Bu Guru, {{ $guru->nama_depan . ' ' . $guru->nama_belakang }}
                        </h3>

                    @else
                    <h3>
                        Selamat Datang Pak Guru, {{ $guru->nama_depan. ' ' . $guru->nama_belakang }}
                    </h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
