<?php

namespace app\Repository;
use App\Models\Pemohon as Model;

class Pemohon
{
    public function getPemohon($request)
    {
        return Model::all();
    }
}