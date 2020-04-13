<?php

namespace App\Http\Filters;

use App\Http\Filters\Filter;

class CustomerFilter
{
    use Filters;

    public static function filterParams()
    {
        return 'CustomerParams';
    }

}
