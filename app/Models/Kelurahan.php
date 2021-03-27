<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class,'kd_kec');
    }

}
