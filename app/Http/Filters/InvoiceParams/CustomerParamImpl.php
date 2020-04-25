<?php

namespace App\Http\Filters\InvoiceParams;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\Params;

class CustomerParamImpl implements Params
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

        $customer = Customer::where('name', $value)->first();

        return $builder->where('customer_id', $customer->id);
    }

}
