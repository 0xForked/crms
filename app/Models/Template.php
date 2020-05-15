<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public static function type($type)
    {
        return self::where('type', $type);
    }
}
