<?php

namespace app\Repository;
use App\Models\Pemohon as Model;

class Pemohon
{
    public function getPemohon($request)
    {
        return Model::with('provinsi:kd_prov,nama_prov','kabupaten:kd_kab,nama_kab','kecamatan:kd_kec,nama_kec','kelurahan:kd_kel,nama_kel');
    }
}