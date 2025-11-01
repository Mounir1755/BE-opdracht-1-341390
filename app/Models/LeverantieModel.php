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

    
}
