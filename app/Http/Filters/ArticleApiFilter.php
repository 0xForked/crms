<?php

namespace App\Http\Filters;

use App\Http\Filters\Filter;

class ArticleApiFilter
{
    use Filters;

    public static function filterParams()
    {
        return 'ArticleApiParams';
    }

}
