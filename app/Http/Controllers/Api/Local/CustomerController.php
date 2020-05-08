<?php

namespace App\Http\Controllers\Api\Local;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $customer = Customer::where(
                'name',
                'LIKE',
                "%$request->search%"
            )->orderBy('created_at', 'desc')->limit(10)->get();
        } else {
            $customer = Customer::orderBy('created_at', 'desc')
                ->limit(10)
                ->get();
        }

        return CustomerResource::collection($customer);
    }
}
