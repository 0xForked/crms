<?php

namespace App\Http\Filters;

use App\Http\Filters\Filter;

class InvoiceFilter
{
    use Filters;

    public static function filterParams()
    {
        return 'InvoiceParams';
    }

}
