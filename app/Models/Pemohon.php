<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    protected $table = 'pemohon';

    protected $fillable = ['nama','alamat','no_telepon','kd_prov','kd_kab','kd_kec','kd_kel'];

    
}
