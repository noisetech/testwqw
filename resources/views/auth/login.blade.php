@extends('layouts.app')

@section('title', 'Halaman Login')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">



        <!-- Custom fonts for this template-->
        <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">


        <!-- Custom styles for this template-->
        <link href="{{ asset('backend/css/sb-admin-2.min.css') }}" rel="stylesheet">

    </head>


    <body>

        <div class="d-lg-flex justify-content-center">
            @if (session('status'))
                <div class="alert alert-se alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="container mt-3">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5 pt-3">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block">
                                    <img src="{{ asset('backend/bahan/LOGO MI AL HARUNI PNG.png') }}" alt=""
                                        style="padding-left: 100px; padding-top: 20px; width: 400px;">
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <form class="user" action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Email:</label>
                                                <input type="email" class="form-control form-control-user" name="email"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    placeholder="Masukan email akun anda........" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password:</label>
                                                <input type="password" class="form-control form-control-user"
                                                    name="password" id="exampleInputPassword"
                                                    placeholder="Masukan passowrd akun anda...." required>
                                            </div>

                                            <button class="btn btn-sm btn-block btn-primary" type="submit">
                                                Login
                                            </button>
                                        </form>
                                        <hr>
                                        <form action="" method="POST">
                                            @csrf

                                            <button class="btn btn-sm btn-danger mb-4" type="submit"
                                                style="font-size: 12px;">
                                                Lupa Password!
                                            </button>
                                        </form>
                                        <div class="text-center">
                                            <a class="small" href="{{ route('register') }}">Belum punya akun?
                                                Daftar!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('backend/js/sb-admin-2.min.js') }}"></script>

    </body>

    </html>

@endsection
