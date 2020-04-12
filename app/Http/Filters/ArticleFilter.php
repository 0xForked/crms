<?php

namespace App\Http\Filters;

use App\Http\Filters\Filter;

class ArticleFilter
{
    use Filters;

    public static function filterParams()
    {
        return 'ArticleParams';
    }

}
