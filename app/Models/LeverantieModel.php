<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class LeverantieModel extends Model
{
    public function sp_GetAllLeveringInfo()
    {
        return DB::select('CALL Sp_GetAllLeveringInfo');
    }

    public function sp_GetLeverancierInfoById($id) {
        return DB::select('CALL Sp_GetLeverancierInfoById(?)', [$id]);
    }

    public function sp_GetProductLeveringInfo($id) {
        return DB::select('CALL Sp_GetProductLeveringInfo(?)', [$id]);
    }
}
