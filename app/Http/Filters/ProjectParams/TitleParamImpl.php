<?php

namespace App\Http\Filters\ProjectParams;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\Params;

class TitleParamImpl implements Params
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
        return $builder->where('title', 'LIKE', "%$value%");
    }

}
