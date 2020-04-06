@extends('layouts.admin')

@section('title', 'My Articles')

@section('content')
    <div class="section-body">
        <h2 class="section-title">List of all Stories</h2>
        <p class="section-lead">On this page, you will be able to do some good stuff with the stories</p>
        @if(!$errors->any())
            <x-admin.alert/>
        @endif

       <div class="card bg-transparent shadow-none">
           <div class="card-header">
                @include('admin.articles.partials.filter')
           </div>
           <div class="card-body">
               <div class="row">
                   @include('admin.articles.partials.message')
                   @foreach($articles as $item)
                       @include('admin.articles.partials.content')
                   @endforeach
               </div>
           </div>
           <div class="card-footer">
               <nav class="d-inline-block text-center">
                   <ul class="pagination mb-0">
                       {{ $articles->appends(request()->query())->links()  }}
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
                onclick="window.location.href='{{ route('articles.create')  }}'; showLoading();"
            >
                <i class="fa fa-plus"></i>
            </button>
        <div>
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
                $('#date_from_filter_article').val('{{\Carbon\Carbon::now()->startOfMonth()->format('Y-m-d')}}')
                $('#date_to_filter_article').val('{{\Carbon\Carbon::now()->format('Y-m-d')}}')
            @endif
        });
    </script>
@endsection
