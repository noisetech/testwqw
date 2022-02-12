<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use SoftDeletes;

    protected $table = 'siswa';

    protected $fillable = [
        'user_id', 'nisn', 'nama_depan', 'nama_belakang', 'tempat_lahir', 'tgl_lahir', 'jk', 'gol_darah', 'alamat',
        'angkatan', 'tgl_masuk', 'nama_sekolah_asal', 'alamat_sekolah_asal', 'anak_ke', 'status_anak', 'foto', 'status',
        'nama_ayah', 'nama_ibu', 'pekerjaan_ayah', 'pekerjaan_ibu', 'alamat_orang_tua', 'no_telpon_orang_tua', 'nama_wali',
        'alamat_wali', 'pekerjaan_wali', 'no_telpon_wali'
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tagihan_administrasi(){
        return $this->hasMany(TagihanAdminitrasi::class, 'siswa_id');
    }


}
