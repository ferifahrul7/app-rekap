<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten'; 

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class,'kd_prov');
    }

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class,'kd_kab');
    }
}
