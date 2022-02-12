<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;

    protected $table = 'kelas';

    protected $fillable = [
        'kelas', 'no_ruangan', 'guru_id'
    ];

    public function guru(){
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }

    public function jadwal(){
        return $this->hasMany(Jadwal::class, 'kelas_id');
    }

}
