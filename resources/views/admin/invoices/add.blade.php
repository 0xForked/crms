@extends('layouts.admin')

@section('title', 'Create new Invoice')

@section('content')
    <div class="section-body">
        <h2 class="section-title">Create new invoice!</h2>
        <p class="section-lead">On this page you can make a new invoice for specified customer with multiple projects.</p>
        @if(!$errors->any())
            <x-admin.alert></x-admin.alert>
        @endif

        <div class="head-form-container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div id="select-customer-container">
                        <a
                            href="#"
                            class="text-decoration-none"
                            data-toggle="modal"
                            data-target="#selectCustomerModal"
                            onclick="loadData(`{{ url('api/customers') }}`, `customerList`)"
                        >
                            <div
                                class="card bg-whitesmoke text-center"
                                id="customer_select_container"
                                style="height: 175px"
                            >
                                <h5 class="p-5 mt-4">
                                    <figure class="avatar mr-2 avatar-sm">
                                        <img src="{{asset('assets/img/avatar-1.png')}}" alt="...">
                                    </figure>
                                    New customer
                                    <span class="text-danger">*</span>
                                </h5>
                            </div>
                        </a>
                    </div>
                    <div id="selected-customer-container" class="d-none">
                        <div class="card bg-whitesmoke p-3"  style="height: 175px">
                            <div class="d-flex bd-highlight p-4">
                                <h5>Customer Data</h5>
                                <input type="hidden" name="customer_id">
                                <div class="p-2 w-100 bd-highlight ml-5">
                                    <table>
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td>: <span id="customer-name"></span></td>
                                        </tr>
                                        <tr>
                                            <td><b>Address</b></td>
                                            <td>: <span id="customer-address"></span></td>
                                        </tr>
                                        <tr>
                                            <td><b>Contact</b></td>
                                            <td>: <span id="customer-contact"></span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="p-2 flex-shrink-1 bd-highlight">
                                    <button class="btn btn-danger mt-4" id="remove-customer-selected">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="invoice_date">
                                Invoice Date
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                </div>
                                <input
                                    type="text"
                                    class="form-control datepicker"
                                    name="invoice_date"
                                    id="invoice_date"
                                    required
                                >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="due_date">
                                Due Date
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                </div>
                                <input
                                    type="text"
                                    class="form-control datepicker"
                                    name="due_date"
                                    id="due_date"
                                    required
                                >
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="invoice_number">
                                Invoice Number
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">#</div>
                                </div>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="invoice_number"
                                    name="invoice_number"
                                    value="INV-"
                                    required
                                >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="reference_number">
                                Reference Number
                            </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">#</div>
                                </div>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="reference_number"
                                    name="reference_number"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-include')
    @include('admin.invoices.partials.customer')
@endsection

@section('custom-style')
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
@endsection

@section('custom-script-body')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/modules/daterangepicker.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#invoice_date').val('{{\Carbon\Carbon::now()->format('Y-m-d')}}');
            $('#due_date').val('{{\Carbon\Carbon::now()->addDays(7)->format('Y-m-d')}}');
        });
    </script>
@endsection

