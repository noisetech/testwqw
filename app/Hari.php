<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hari extends Model
{
    use SoftDeletes;

    protected $table = 'hari';

    protected $fillable = [
        'hari'
    ];
}
