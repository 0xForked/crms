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
                <div class="table-responsive">
                    <table class="table table">

                    </table>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
@endsection
