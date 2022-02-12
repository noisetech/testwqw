<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KepalaSekolah extends Model
{
    use SoftDeletes;

    protected $table = 'kepala_sekolah';

    protected $fillable = [
        'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'no_telpon', 'foto', 'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
