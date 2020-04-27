@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    <div class="section-body">
        <h2 class="section-title">Categories</h2>
        <p class="section-lead">On this page you can create, update, delete add see the list of the category.</p>
        @if(!$errors->any())
        <x-admin.alert></x-admin.alert>
        @endif

        <div class="row">
            @include('admin.categories.partials.form')
            @include('admin.categories.partials.table')
        </div>
    </div>
@endsection

@section('custom-include')
    @include('admin.categories.edit')
@endsection
