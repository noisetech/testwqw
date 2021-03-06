<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tahun extends Model
{
    use SoftDeletes;

    protected $table = 'tahun';

    protected $fillable = [
        'tahun'
    ];

    public function jadwal(){
        return $this->hasMany(Jadwal::class, 'tahun_id');
    }
}
