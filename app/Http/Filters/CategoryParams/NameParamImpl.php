<?php

namespace App\Http\Filters\CategoryParams;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\Params;

class NameParamImpl implements Params
{

    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('name', 'LIKE', "%$value%");
    }

}
