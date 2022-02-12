<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembayaranAdministrasi extends Model
{
    use SoftDeletes;

    protected $table = 'pembayaran_administrasi';

    protected $fillable = [
        'kategori_pembayaran', 'nominal'
    ];
}
