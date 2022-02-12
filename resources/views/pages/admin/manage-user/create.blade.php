@extends('layouts.admin')

@section('title', 'Tambah user')
@section('content')
<div class="container-fluid" style="margin-top: 60px;">

    <div class="card shadow">
       <div class="card-header">
        <div class="d-flex justify-content-start mt-3">
            <div class="font-weight-bold text-primary">
                <p>Tambah User</p>
            </div>
        </div>
       </div>
       <div class="card-body">
        <form action="{{ route('manage_user.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class=" form-control" placeholder="Email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
            </div>

            <div class="form-group">
                <label for="">Role</label>
                <select name="role" class="form-control">
                    <option value="">Pilih Role</option>
                    <option value="guru">Guru</option>
                    <option value="siswa">Siswa</option>
                    <option value="kepala sekolah">Kepala Sekolah</option>
                </select>
            </div>

            <button class="btn btn-block btn-success" type="submit">
                Simpan
            </button>
        </form>

    </div>
    </div>

</div>
@endsection
