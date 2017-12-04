<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    public static function getSubordinatesByManagerId(int $id)
    {
        $subordinates = DB::table('employees')
            ->where('manager_id', $id)
            ->get();

        return $subordinates;
    }
}
