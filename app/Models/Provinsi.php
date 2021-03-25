<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table ='provinsi';

    public function kabupatens()
    {
        return $this->hasMany(Kabupaten::class,'kd_prov');
    }
}
