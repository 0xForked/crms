@extends('layouts.admin')

@section('title', 'Create new Invoice')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-8">
                <h2 class="section-title">Create new invoice!</h2>
                <p class="section-lead">
                    On this page you can make a new invoice for specified customer with multiple projects.
                </p>
            </div>
            <div class="col-12 col-md-4 align-self-center">
                <button class="btn btn-primary float-right">
                    Create new Invoice
                </button>
            </div>
        </div>

        @if(!$errors->any())
            <x-admin.alert></x-admin.alert>
        @endif

        <div class="head-form-container mt-3">
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

        <div class="list-form-container">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Items</th>
                                    <th width="180">Quantity</th>
                                    <th width="300">Price</th>
                                    <th>Amount</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="item1">
                                    <td>
                                       <input type="text" class="form-control" placeholder="Type or click to select and item" id="project1">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" value="1" id="qty1" onchange="amount(1)">
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label></label>
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                  Rp.
                                                </div>
                                              </div>
                                              <input type="text" class="form-control currency" id="price1" onchange="amount(1)" value="0">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        Rp. <span id="ammount1" class="currency">0,00</span>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="#" class="btn-add-item bg-whitesmoke text-center p-3">
                    <i class="fas fa-shopping-basket"></i>
                    Add an Item
                </a>
            </div>
        </div>

        <div class="footer-form-container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea name="notes" id="notes" class="form-control w-75" style="height: 100px"></textarea>
                    </div>
                    <div class="from-group">
                        <label for="template">Invoice Template</label>
                        <button class="btn btn-outline-primary d-block">
                            template 1
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body text-center p-5">
                            CALCULATE_HERE
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
    <style>
        .btn-add-item {
            text-decoration: none !important;
            font-weight: 600;
        }
        .btn-add-item:hover {
            background: #e8eeee !important;
            font-weight: 700;
        }
    </style>
@endsection

@section('custom-script-body')
    <script src="{{ asset('assets/js/cleave.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/modules/daterangepicker.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#invoice_date').val('{{\Carbon\Carbon::now()->format('Y-m-d')}}');
            $('#due_date').val('{{\Carbon\Carbon::now()->addDays(7)->format('Y-m-d')}}');
        });

        new Cleave('.currency', {
            numeral: true,
            numericOnly: true,
            numeralThousandsGroupStyle: 'thousand',
            numeralDecimalScale: 2,
            numeralDecimalMark: ',',
            delimiter: '.',
            stripLeadingZeroes: false,
        });

        function amount(row) {
            var qty = $('#item'+row+' #qty'+row).val()
            qty = (qty < 1) ? 1 : qty
            var price = $('#item'+row+' #price'+row).val().split('.').join('')
            $('#item'+row+' #qty'+row).val(qty)
            var amount = (price < 1) ? 0 : (parseInt(qty) * parseInt(price))
            $('#item'+row+' #ammount'+row).text(number_to_price(amount))
        }

        function number_to_price(value){
            if (value == 0) { return '0,00'; }
            value = parseFloat(value);
            value = value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
            value = value.split('.').join('*').split(',').join('.').split('*').join(',');
            return value;
        }
    </script>
@endsection

