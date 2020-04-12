@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
    <div class="section-body">
        <h2 class="section-title">Settings</h2>
        <p class="section-lead">Adjust settings and maximize data usage.</p>

        @if(!$errors->any())
            <x-admin.alert></x-admin.alert>
        @endif

        <div class="row">
            @include('admin.settings.partials.menu')
            <div class="col-md-8">
                <div class="tab-content" id="pills-tabContent">
                    @include('admin.settings.partials.content-general')
                    @include('admin.settings.partials.content-database')
                </div>
            </div>
        </div>
    </div>
@endsection
