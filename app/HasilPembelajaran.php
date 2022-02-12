<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HasilPembelajaran extends Model
{
    use SoftDeletes;

    protected $table = 'hasil_pembelajaran';

    protected $fillable = [
        'jadwal_siswa_id', 'tugas', 'uts', 'uas	', 'rata'
    ];

    public function jadwal_siswa(){
        return $this->belongsTo(JadwalSiswa::class);
    }
}
