<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
 use SoftDeletes;

 protected $table = 'jadwal';

 protected $fillable = [
     'mata_pelajaran_id', 'tingkat', 'kelas_id', 'guru_id', 'hari_id', 'semester_id', 'jam_mulai', 'jam_selsai', 'tahun_id'
 ];

 public function mata_pelajaran(){
     return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id', 'id');
 }

 public function kelas(){
    return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
}


 public function guru(){
    return $this->belongsTo(Guru::class, 'guru_id', 'id');
}

public function hari(){
    return $this->belongsTo(Hari::class, 'hari_id', 'id');
}

public function semester(){
    return $this->belongsTo(Semester::class, 'semester_id', 'id');
}

public function jadwal_siswa(){
    return $this->hasMany(JadwalSiswa::class, 'jadwal_id', 'id');
}

public function tahun(){
    return $this->belongsTo(Tahun::class, 'tahun_id', 'tahun_id');
}

}
