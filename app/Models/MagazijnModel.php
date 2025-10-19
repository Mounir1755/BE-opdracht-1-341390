<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MagazijnModel extends Model
{
    public function sp_GetAllProducts()
    {
        return DB::select('CALL Sp_GetAllProducts');
    }
}
