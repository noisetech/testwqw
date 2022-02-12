@extends('layouts.siswa')

@section('title', 'Tagihan Administrasi')
@section('content')
<div class="container-fluid" style="margin-top: 60px;">


    <div class="card shadow">
        <div class="card-header">
            <div class="justify-content-start m-0">
                <div class="font-weight-bold text-black pt-3">
                    <p style="font-size: 18px;">Tagihan administrasi</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center table-bordered text-center table-hover" cellspacing="0" width="100%" id="dataTable">
                    <thead>
                        <tr>
                            <th>Tagihan Adminitrasi</th>
                            <th>Nominal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->pembayaran_administrasi->kategori_pembayaran }}</td>
                            <td>Rp. {{ number_format($item->pembayaran_administrasi->nominal,2,",",".") }}</td>
                            <td>{{ $item->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
