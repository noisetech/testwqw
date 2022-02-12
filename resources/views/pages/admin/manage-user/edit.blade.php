@extends('layouts.admin')

@section('title', 'Ubah user')
@section('content')
<div class="container-fluid">


    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-start m-0">
                <div class="font-weight-bold text-primary mt-3">
                    <p>Ubah user</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('manage_user.update', $item->id) }}" method="POST">
                @csrf

                @method('put')

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $item->name }}">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class=" form-control" placeholder="Email" value="{{ $item->email }}">
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="{{ $item->password }}">
                </div>

                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" class="form-control">
                        <option value="{{ $item->role }}">Data Sebelumnya ({{ $item->role }})</option>
                        <option value="guru">Guru</option>
                        <option value="siswa">Siswa</option>
                        <option value="kepala sekolah">Kepala Sekolah</option>
                    </select>
                </div>

                <button class="btn btn-block btn-success" type="submit">
                    Ubah
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
