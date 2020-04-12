@extends('layouts.admin')

@section('title', 'My Account')

@section('content')
    <div class="section-body">
        <h2 class="section-title">My Account</h2>
        <p class="section-lead">This page display your personalisation.</p>

        @if(!$errors->any())
        <x-admin.alert></x-admin.alert>
        @endif
        <div class="card">
            <div class="card-footer bg-whitesmoke">
                <div class="row is-flex">
                    @include('admin.accounts.partials.content-basic')
                    @include('admin.accounts.partials.content-password')
                </div>
            </div>
        </div>

    </div>
@endsection
