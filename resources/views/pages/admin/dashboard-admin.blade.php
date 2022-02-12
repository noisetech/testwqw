@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('content')
<div class="container-fluid" style="margin-top: 120px;">

    <div class="card shadow" style="height: 200px;">
        <div class="card-body">
            <div class="d-flex justify-content-center mt-5">
                <h3>
                    @if (auth()->user()->role == 'admin')
                        Selamat datang, <strong>Admin</strong>
                    @endif
                </h3>
            </div>
        </div>
    </div>
</div>
@endsection
