@extends('layouts.kepala')

@section('title', 'Dashboard Admin')
@section('content')
<div class="container-fluid" style="margin-top: 120px;">

    <div class="card shadow" style="height: 200px;">
        <div class="card-body">
            <div class="d-flex justify-content-center mt-5">
                <h3>
                    @if (auth()->user()->role == 'kepala sekolah')
                        Selamat datang, <strong>Kepala Sekolah</strong>
                    @endif
                </h3>
            </div>
        </div>
    </div>
</div>
@endsection
