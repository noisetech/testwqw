<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Email</th>
        <th>Nama Lengkap</th>
        <th>Tempat, Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Angakatan</th>
        <th>Tanggal Masuk</th>
        <th>Nama Sekolah Asal</th>
        <th>Alamat Sekolah Asal</th>
        <th>Anak Ke</th>
        <th>Status Anak</th>
        <th>Status</th>
        <th>Nama Ayah</th>
        <th>Nama Ibu</th>
        <th>Pekerjaan Ayah</th>
        <th>Pekerjaan Ibu</th>
        <th>Alamat Orang Tua</th>
        <th>No Telepon Orang Tua</th>
        <th>Nawa Wali</th>
        <th>Alamat Wali</th>
        <th>Pekerjaan Wali</th>
        <th>No Telepon Wai</th>
    </tr>
    <th></th>
    </thead>
    <tbody>
    @foreach($siswa as $key => $siswa)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $siswa->user->email }}</td>
            <td>{{ $siswa->nama_depan.' '.$siswa->nama_belakang }}</td>
            <td>{{ $siswa->tempat_lahir.', '.\Carbon\Carbon::parse($siswa->tgl_lahir)->isoFormat('DD-MM-Y') }}</td>
            <td>{{ $siswa->jk }}</td>
            <td>{{ $siswa->alamat }}</td>
            <td>{{ $siswa->angkatan }}</td>
            <td>{{ $siswa->tgl_masuk }}</td>
            <td>{{ $siswa->nama_sekolah_asal }}</td>
            <td>{{ $siswa->alamat_sekolah_asal }}</td>
            <td>{{ $siswa->anak_ke }}</td>
            <td>{{ $siswa->status_anak }}</td>
            <td>{{ $siswa->status }}</td>
            <td>{{ $siswa->nama_ayah }}</td>
            <td>{{ $siswa->nama_ibu }}</td>
            <td>{{ $siswa->pekerjaan_ayah }}</td>
            <td>{{ $siswa->pekerjaan_ibu }}</td>
            <td>{{ $siswa->alamat_orang_tua }}</td>
            <td>{{ $siswa->no_telpon_orang_tua }}</td>
            <td>{{ $siswa->nama_wali }}</td>
            <td>{{ $siswa->alamat_wali }}</td>
            <td>{{ $siswa->pekerjaan_wali }}</td>
            <td>{{ $siswa->no_telpon_wali }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
