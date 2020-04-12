@extends('layouts.admin')

@section('title', 'My Projects')

@section('content')
    <div class="section-body">
        <h2 class="section-title">List of all Project</h2>
        <p class="section-lead">On this page, you will be able to do some good stuff with the projects</p>
        @if(!$errors->any())
            <x-admin.alert></x-admin.alert>
        @endif

        <div class="card bg-transparent shadow-none">
            <div class="card-header">
                @include('admin.projects.partials.filter')
            </div>
            <div class="card-body">
                <div class="row">
                    @include('admin.projects.partials.message')
                    @foreach($projects as $item)
                        @include('admin.projects.partials.content')
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                <nav class="d-inline-block text-center">
                    <ul class="pagination mb-0">
                        {{ $projects->appends(request()->query())->links()  }}
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
                onclick="window.location.href='{{ route('projects.create')  }}'; showLoading();"
            >
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
@endsection
