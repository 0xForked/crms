@extends('layouts.admin')

@section('title', 'My Customers')

@section('content')
    <div class="section-body">
        <h2 class="section-title">Customer work with!</h2>
        <p class="section-lead">On this page you can manage the customers data.</p>
        @if(!$errors->any())
            <x-admin.alert></x-admin.alert>
        @endif

        <div class="card">
            <div class="card-header">
                @include('admin.customers.partials.filter')
            </div>
            <div class="card-body">
                @if(count($customers) > 0)
                    @include('admin.customers.partials.table')
                @else
                    @include('admin.customers.partials.message')
                @endif
            </div>
            <div class="card-footer bg-whitesmoke text-center">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                        {{ $customers->appends(request()->query())->links()  }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="custom-fab">
        <div>
            <button
                type="button"
                class="btn btn-main btn-primary"
                data-toggle="modal"
                data-target="#createCustomer"
            >
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
@endsection

@section('custom-include')
@include('admin.customers.add')
@include('admin.customers.edit')
@endsection
