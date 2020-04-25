@extends('layouts.admin')

@section('title', 'My Invoices')

@section('content')
    <div class="section-body">
        <h2 class="section-title">Latest transaction invoice!</h2>
        <p class="section-lead">On this page you can manage the transaction that linked with project and customers.</p>
        @if(!$errors->any())
            <x-admin.alert></x-admin.alert>
        @endif
    </div>

    <div class="card">
        <div class="card-header">
            @include('admin.invoices.partials.filter')
        </div>
        <div class="card-body">
            <div class="row">
                @if(count($invoices) > 0)
                    @include('admin.invoices.partials.table')
                @else
                    @include('admin.invoices.partials.message')
                @endif
            </div>
        </div>
        <div class="card-footer">
            <nav class="d-inline-block text-center">
                <ul class="pagination mb-0">
                    {{ $invoices->appends(request()->query())->links() }}
                </ul>
            </nav>
        </div>
    </div>

    <div class="custom-fab">
        <div>
            <button
                type="button"
                class="btn btn-main btn-primary"
                onclick="window.location.href='{{ route('invoices.create')  }}'; showLoading();"
            >
                <i class="fa fa-plus"></i>
            </button>
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
            @if(is_null(app('request')->input('from_date')) && is_null(app('request')->input('to_date')))
            $('#date_from_filter_article').val('{{\Carbon\Carbon::now()->startOfMonth()->format('Y-m-d')}}');
            $('#date_to_filter_article').val('{{\Carbon\Carbon::now()->format('Y-m-d')}}');
            @endif
        });
    </script>
@endsection
