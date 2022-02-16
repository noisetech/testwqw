<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::prefix('admin')->namespace('Admin')
    ->middleware('auth', 'admin')
    ->group(function () {
        Route::get('/', 'DashboardAdminController@index')->name('dashboard-admin');
        Route::resource('manage_user', 'ManageUserController');
        // Route::resource('tahun', 'TahunController');
        Route::resource('hari', 'HariController');
        Route::resource('semester', 'SemesterController');


        // tahun
        Route::get('/tahun', 'TahunController@index')->name('tahun.index');
        Route::get('/tahun/create', 'TahunController@create')->name('tahun.create');
        Route::post('/tahun/store', 'TahunController@store')->name('tahun.store');
        Route::get('/tahun/edit/{id}', 'TahunController@edit')->name('tahun.edit');
        Route::put('/tahun/update/{id}', 'TahunController@update')->name('tahun.update');
        Route::get('/tahun/delete/{id}', 'TahunController@destroy')->name('tahun.destroy');


        Route::get('/kepalasekolah', 'KepalaSekolahController@index')->name('kepalasekolah.index');
        Route::get('/kepalasekolah/create', 'KepalaSekolahController@create')->name('kepalasekolah.create');
        Route::post('/kepalasekolah/store', 'KepalaSekolahController@store')->name('kepalasekolah.store');
        Route::get('/kepalasekolah/edit/{id}', 'KepalaSekolahController@edit')->name('kepalasekolah.edit');
        Route::put('/kepalasekolah/update/{id}', 'KepalaSekolahController@update')->name('kepalasekolah.update');
        Route::get('/kepalasekolah/delete/{id}', 'KepalaSekolahController@destroy')->name('kepalasekolah.destroy');

        // manage-user
        Route::get('/manage_user', 'ManageUserController@index')->name('manage_user.index');
        Route::get('/manage_user/create', 'ManageUserController@create')->name('manage_user.create');
        Route::post('/manage_user/store', 'ManageUserController@store')->name('manage_user.store');
        Route::get('/manage_user/show/{id}', 'ManageUserController@show')->name('manage_user.show');
        Route::get('/manage_user/edit/{id}', 'ManageUserController@edit')->name('manage_user.edit');
        Route::put('/manage_user/update/{id}', 'ManageUserController@update')->name('manage_user.update');
        Route::get('/manage_user/delete/{id}', 'ManageUserController@destroy')->name('manage_user.destroy');

        // bagian guru di admin
        Route::get('/guru', 'GuruController@index')->name('guru.index');
        Route::get('/guru/create', 'GuruController@create')->name('guru.create');
        Route::post('/guru/store', 'GuruController@store')->name('guru.store');
        Route::get('/guru/show/{id}', 'GuruController@show')->name('guru.show');
        Route::get('/guru/edit/{id}', 'GuruController@edit')->name('guru.edit');
        Route::put('/guru/update/{id}', 'GuruController@update')->name('guru.update');
        Route::get('/guru/delete/{id}', 'GuruController@destroy')->name('guru.destroy');

        // bagian opsi data guru
        Route::get('/opsi-data-guru', 'OpsiGuruController@halaman_opsi_guru')->name('halaman.opsi.guru.admin');
        Route::post('/guru', 'OpsiGuruController@cari_opsi_guru')->name('cari.opsi.guru.by.tahun');

        // bagian siswa-admin
        Route::get('/siswa', 'SiswaController@index')->name('siswa.index');
        Route::get('/siswa/create', 'SiswaController@create')->name('siswa.create');
        Route::post('/siswa/store', 'SiswaController@store')->name('siswa.store');
        Route::get('/siswa/show/{id}', 'SiswaController@store')->name('siswa.show');
        Route::get('/siswa/edit/{id}', 'SiswaController@edit')->name('siswa.edit');
        Route::put('/siswa/update/{id}', 'SiswaController@update')->name('siswa.update');
        Route::delete('/siswa/delete/{id}', 'SiswaController@delete')->name('siswa.destroy');

        // bagian opsi data siswa
        Route::get('/opsi-data-siswa', 'OpsiSiswaController@halaman_opsi_siswa_admin')->name('halaman.opsi.siswa.admin');
        Route::post('/data-siswa', 'OpsiSiswaController@cari_opsi_siswa_by_tahun')->name('cari_opsi_siswa_by_tahun');



        // bagian jadwal-siswa admin
        Route::get('/jadwal_siswa', 'SiswaController@index')->name('jadwal_siswa.index');
        Route::get('/jadwal_siswa/create', 'JadwalSiswaController@create')->name('jadwal_siswa.create');
        Route::post('/jadwal_siswa/store', 'JadwalSiswaController@store')->name('jadwal_siswa.store');
        Route::get('/jadwal_siswa/show/{id}', 'JadwalSiswaController@store')->name('jadwal_siswa.show');
        Route::get('/jadwal_siswa/edit/{id}', 'JadwalSiswaController@edit')->name('jadwal_siswa.edit');
        Route::put('/jadwal_siswa/update/{id}', 'JadwalSiswaController@update')->name('jadwal_siswa.update');
        Route::get('/jadwal_siswa/delete/{id}', 'JadwalSiswaController@delete')->name('jadwal_siswa.destroy');

        // bagian opsi jadwal siswa bagian admin
        Route::get('/opsi-jadwal-siswa', 'OpsiJadwalSiswaController@halaman_opsi_jadwal_siswa')->name('opsi.halaman.jadwal.siswa.admin');
        Route::post('/cari-opsi/jadwal-siswa', 'OpsiJadwalSiswaController@cari_opsi_jadwal_siswa')->name('cari.opsi.jadwal.siswa.admin');

        // bagian mata-pelajaran admin
        Route::get('/data-mata-pelajaran', 'MataPelajaranController@index')->name('mata.pelajaran.index');
        Route::get('/halaman-tambah/data-mata-pelajaran', 'MataPelajaranController@create')->name('create.tambah.mata.pelajaran');
        Route::post('/proses-tambah/data-mata-pelajaran', 'MataPelajaranController@store')->name('proses.tambah.mata.pelajaran');
        Route::post('/halaman-edit/data-mata-pelajaran/{id}', 'MataPelajaranController@edit')->name('edit.mata.pelajaran');
        Route::post('/proses-ubah/data-mata-pelajaran/{id}', 'MataPelajaranController@update')->name('update.mata.pelajaran');
        Route::get('/proses-hapus/data-mata-pelajaran/{id}', 'MataPelajaranController@destroy')->name('destroy.mata.pelajaran');

        Route::resource('kelas', 'KelasController');
        Route::resource('jadwal', 'JadwalController');
        Route::resource('siswa', 'SiswaController');
        Route::resource('jadwal_siswa', 'JadwalSiswaController');
        Route::resource('pembayaran_administrasi', 'PembayaranAdministrasiController');
        Route::resource('tagihan_administrasi', 'TagihanAdminitrasiController');
    });

Route::prefix('siswa')->namespace('Siswa')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'DashboardSiswaController@dashboard_siswa')->name('dashboard.siswa');
        Route::resource('datadiri', 'DataDiriController');
        Route::get('/list/jadwal', 'ListPelajaranController@list_pelajaran')->name('listpelajaran.siswa');
        Route::post('/proses/ambil/jadwal', 'ListPelajaranController@proses_ambil_pelajaran')->name('ambil-pelajaran');
        Route::get('/jadwal-pelajaran', 'ListPelajaranController@jadwal_pelajaran')->name('jadwal_pelajaran');
        Route::get('/hapus/jadwal_pelajaran/{id}', 'ListPelajaranController@hapus_jadwal')->name('hapus_jadwal_pelajaran');
        Route::get('/hasil-pembelajaran', 'HasilPembelajaranController@index')->name('hasil_pembelajaran.siswa');
        Route::get('/tagihan-administrasi/list', 'TagihanAdministrasiController@data')->name('data_tagihan_administrasi');
        Route::get('/halaman-opsi/jadwal-pelajaran', 'ListPelajaranController@opsi_list_pelajaran')->name('opsi.jadwal');
        Route::post('/data/jadwal-pelajaran', 'ListPelajaranController@mencari_opsi_jadwal')->name('mencari.opsi-jadwal');
        Route::get('/halaman-cetak-data-diri', 'CetakDataDiriController@halaman_cetak_data_diri')->name('halaman.cetak.data.diri');
        Route::get('/cetak-data-diri', 'CetakDataDiriController@cetak_pdf')->name('cetak.data.diri');
        Route::get('/halaman-opsi/hasil-pembelajaran', 'HasilPembelajaranController@opsi_hasil_pembelajaran')->name('opsi.hasil.pembelajaran');
        Route::post('/data/hasil-pemmbelajaran', 'HasilPembelajaranController@mencari_opsi_hasil_pembelajaran')->name('mencari.opsi.hasil.pembelajaran');
        Route::get('/halaman-cetak/hasil-pemmbelajaran', 'HasilPembelajaranController@halamana_data_hasil')->name('halaman.cetak.hasil.pembelajaran');
        Route::get('/cetak/hasil-pemmbelajaran', 'HasilPembelajaranController@cetak_hasil_pembelajaran')->name('cetak.hasil.pembelajaran');
    });


    Route::prefix('kepala-sekolah')
    ->namespace('KepalaSekolah')
    ->group(function(){
        Route::get('/', 'DashboardKepalaSekolahController@index')->name('test.kepala');
    });


Route::prefix('guru')->namespace('Guru')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'DashboardGuruController@dashboard_guru')->name('dashboard.guru');
        Route::resource('data-diri', 'DataDiriGuruController');
        Route::get('/cetak/data-diri', 'CetakController@proses')->name('cetak.data.diri.guru');
        Route::get('/jadwal-mengajar', 'JadwalMengajarController@jadwal_mengajar')->name('jadwal_mengajar');
        Route::get('/jadwal-mengajar/detail/{id}', 'JadwalMengajarController@detail_jadwal')->name('detail.jadwal.mengajar');
        Route::get('/input/nilai/siswa/{id}', 'JadwalMengajarController@halaman_input_nilai_siswa')->name('halaman_input_nilai_siswa');
        Route::post('/proses/input-nilai-siswa/{id}', 'JadwalMengajarController@proses_input_nilai_siswa')->name('proses.input.nilai.siswa');
        Route::get('/ubah/nilai/siswa/{id}', 'JadwalMengajarController@halaman_ubah_nilai_siswa')->name('halaman_ubah_nilai_siswa');
        Route::put('/proses/ubah-nilai/{id}', 'JadwalMengajarController@proses_ubah_nilai')->name('proses.ubah.nilai.siswa');
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('kepala-sekolah')
->namespace('KepalaSekolah')
->middleware('auth', 'kepala sekolah')
->group(function(){
    Route::get('/', 'DashboardKepalaSekolahController@index')->name('dashboard_kepala_sekolah');
    Route::get('/halaman-opsi-data-siswa', 'SiswaController@halaman_opsi_siswa_kepala_sekolah')->name('opsi.siswa.kepala.sekolah');
    Route::post('/data-siswa', 'SiswaController@cari_opsi_siswa_kepala_sekolah' )->name('cari.siswa.kepalasekolah');
    Route::get('/semua-data-siswa', 'SiswaController@semua_data_siswa')->name('semua.data.sisw.kepala.sekolah');
    Route::get('/export-siswa', 'SiswaController@export_siswa_kepala_sekolah')->name('kepala.sekolah.export.siswa');
    Route::get('/export-guru', 'SiswaController@export_guru_kepala_sekolah')->name('kepala.sekolah.export.guru');
});
