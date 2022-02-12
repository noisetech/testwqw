<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = [
        'nama_depan', 'nama_belakang', 'tempat_lahir',
        'tgl_lahir', 'jk', 'alamat', 'email', 'no_telpon',
        'agama', 'golongan', 'status', 'mata_pelajaran_id', 'user_id', 'gambar'
    ];



    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function mata_pelajaran(){
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id', 'id');
    }

    public function kelas(){
        return $this->hasMany(Kelas::class, 'guru_id', 'id');
    }

}
