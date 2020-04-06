<?php

namespace App\Http\Filters;

use App\Http\Filters\Filter;

class ProjectFilter
{
    use Filters;

    public static function filterParams()
    {
        return 'ProjectParams';
    }

}
