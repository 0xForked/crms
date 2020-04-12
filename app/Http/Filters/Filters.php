<?php

namespace App\Http\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait Filters
{

    /**
     *
     * @param Request $filters
     * @param Builder $query
     * @return Builder
     */
    public static function apply(Request $filters, Builder $query)
    {
        foreach ($filters->all() as $filterName => $value) {

            $decorator = static::createFilterDecorator($filterName);

            if (static::isValidDecorator($decorator)) {
                $query = $decorator::apply($query, $value);
            }

        }
        return $query;
    }

    /**
     *
     * @param $name
     * @return string
     */
    private static function createFilterDecorator($name)
    {
        return __NAMESPACE__ . "\\". static::filterParams() ."\\" . Str::studly($name) . "ParamImpl";
    }

    /**
     *
     * @param $decorator
     * @return string
     */
    private static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

    /**
     *
     * @return string
     */
    public static function filterParams()
    {
        return 'CustomParams';
    }

}
