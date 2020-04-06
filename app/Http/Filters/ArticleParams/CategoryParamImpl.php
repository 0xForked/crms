<?php

namespace App\Http\Filters\ArticleParams;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\Params;

class CategoryParamImpl implements Params
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

        $category = Category::where('name', $value)->first();

        return $builder->where('category_id', $category->id);
    }

}
