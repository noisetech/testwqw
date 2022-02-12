<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MataPelajaran extends Model
{
    use SoftDeletes;

    protected $table = 'mata_pelajaran';

    protected $fillable = [
        'mata_pelajaran'
    ];

    public function guru(){
        return $this->hasMany(Guru::class, 'mata_pelajaran_id');
    }

}
