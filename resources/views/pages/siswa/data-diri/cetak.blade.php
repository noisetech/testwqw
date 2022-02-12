<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Cetak data diri</title>

</head>

<body>
    <div class="container-fluid" style="margin-top: 150px;">

        <div class="card-header">
            <h3>Data diri anda</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mt-4">
                        <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                            <tr>
                                <th>Nisn :</th>
                                <td>{{ $datadiri->nisn }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap:</th>
                                <td>{{ $datadiri->nama_depan.' '.$datadiri->nama_belakang }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir:</th>
                                <td>{{ $datadiri->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir:</th>
                                <td>{{ $datadiri->tgl_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin:</th>
                                <td>{{ $datadiri->jk }}</td>
                            </tr>
                            <tr>
                                <th>Nama Ayah:</th>
                                <td>{{ $datadiri->nama_ayah }}</td>
                            </tr>
                            <tr>
                                <th>Nama Ibu:</th>
                                <td>{{ $datadiri->nama_ibu }}</td>
                            </tr>
                            <tr>
                                <th>Foto:</th>
                                <td>
                                    <img src="{{ $public }}" alt="" style="width: 150px; height: 150px;">
                                </td>
                            </tr>
                        </table>
                    </div>
              </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
</body>

</html>
