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
@push('script')
    <script src="{{ asset('backend/js/sweetalert.min.js') }}"></script>
    <script>
        @if (session('status'))
            Swal.fire({
            title: "Success",
            text: "Berhasil Login",
            icon: "{{ session('status') }}",
            showConfirmButton: false,
            });
            setTimeout(window.location.reload.bind(window.location), 1500);
        @endif
    </script>
@endpush
