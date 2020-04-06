<?php

namespace App\Http\Filters;

use App\Http\Filters\Filter;

class CategoryFilter
{
    use Filters;

    public static function filterParams()
    {
        return 'CategoryParams';
    }

}
