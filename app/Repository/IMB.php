<?php

namespace app\Repository;

use App\Models\IMB as IMBModel;

class IMB
{
    public function getIMB($params)
    {
        return IMBModel::with('pemohon:id,nama');
    }
}
