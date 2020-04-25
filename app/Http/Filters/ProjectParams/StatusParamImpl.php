<?php

namespace App\Http\Filters\ProjectParams;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\Params;

class StatusParamImpl implements Params
{

    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return bool|Builder
     */
    public static function apply(Builder $builder, $value)
    {
        if ($value === ALL) return $builder;

        if ($value === TRASHED) return $builder->onlyTrashed();

        return $builder->where('status',  $value);
    }

}
