<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\CustomerFilter;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $customers = CustomerFilter::apply(
            $request, (new Customer)->newQuery()
        )->paginate(10);

        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCustomerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCustomerRequest $request)
    {
        $data = $request->except('_token');

        $store = Customer::create($data);

        if (!$store) return redirect()->back()->with('error', 'Failed store Customer');

        return redirect()->route('customers.index')->with('success', 'Success add new Customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->updateRequest($request);

        return redirect()->route('customers.index')->with(
            'success',
            'Success update customer'
        );
    }

    /**
     * restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);

        $customer->restore();

        return redirect()->route('customers.index')->with(
            'success',
            'Success restore customer'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $customer = Customer::withTrashed()->findOrFail($id);

        if ($customer->deleted_at) {
            $customer->forceDelete();
        }

        $customer->delete();

        return redirect()->route('customers.index')->with(
            'success',
            'Success delete customer'
        );
    }
}
