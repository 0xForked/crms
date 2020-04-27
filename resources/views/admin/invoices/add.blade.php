@extends('layouts.admin')

@section('title', 'Create new Invoice')

@section('content')
    <div class="section-body">
        <h2 class="section-title">Create new invoice!</h2>
        <p class="section-lead">On this page you can make a new invoice for specified customer with multiple projects.</p>
        @if(!$errors->any())
            <x-admin.alert></x-admin.alert>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <a href="#" class="text-decoration-none">
                            <div
                                class="card bg-whitesmoke text-center"
                                id="customer_select_container"
                            >
                                <h5 class="p-5">
                                    <figure class="avatar mr-2 avatar-sm">
                                        <img src="{{asset('assets/img/avatar-1.png')}}" alt="...">
                                    </figure>
                                    New customer
                                    <span class="text-danger">*</span>
                                </h5>
                            </div>
                        </a>
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
            <div class="card-footer">

            </div>
        </div>
    </div>
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

