<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagihanAdminitrasi extends Model
{
    use SoftDeletes;

    protected $table = 'taghan_administrasi_siswa';

    protected $fillable = [
        'pembayaran_administrasi_id', 'siswa_id', 'status'
    ];

    public function pembayaran_administrasi(){
        return $this->belongsTo(PembayaranAdministrasi::class, 'pembayaran_administrasi_id', 'id');
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
