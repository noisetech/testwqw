<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalSiswa extends Model
{

    protected $table = 'jadwal_siswa';

    protected $fillable = [
        'siswa_id', 'jadwal_id', 'tahun'
    ];

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function jadwal(){
        return $this->belongsTo(Jadwal::class, 'jadwal_id', 'id');
    }

    public function hasil_pembelajaran(){
        return $this->hasOne(HasilPembelajaran::class );
    }

}
