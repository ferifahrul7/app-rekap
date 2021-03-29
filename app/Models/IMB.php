<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IMB extends Model
{
    protected $table = 'imb';

    protected $fillable = ['tanggal','pemohon_id','no_imb','bangunan','lok_prov','lok_kab','lok_kec','lok_kel','kondisi_bangunan','tingkat_bangunan','ukuran_bangunan','no_shm','pemilik_tanah','shm_prov','shm_kab','shm_kec','shm_kel','tanggal_ditetapkan'];

}
