<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    protected $table = 'pemohon';

    protected $fillable = ['nama', 'alamat', 'no_telepon', 'kd_prov', 'kd_kab', 'kd_kec', 'kd_kel'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'kd_prov');
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kd_kab');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kd_kec');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::clas, 'kd_kel');
    }
}
