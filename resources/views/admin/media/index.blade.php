@extends('layouts.admin')

@section('title', 'My Media')

@section('content')
    <div class="section-body">
        <h2 class="section-title">Media</h2>
        <p class="section-lead">On this page you can manipulate media collections.</p>
        @if(!$errors->any())
            <x-admin.alert></x-admin.alert>
        @endif

        @if(count($media) < 1)
            <div class="text-center p-5 mx-auto">
                <h1> You haven't any uploaded media! </h1>
            </div>
        @endif
        <section id="images">
            <div class="card-columns">
                @include('admin.media.partials.item')
            </div>
        </section>
        <div class="text-center mt-5">
            <nav class="d-inline-block text-center">
                <ul class="pagination mb-0">
                    {{ $media->appends(request()->query())->links()  }}
                </ul>
            </nav>
        </div>
    </div>

    <div class="custom-fab">
        <div>
            <button
                type="button"
                class="btn btn-main btn-primary"
                data-toggle="modal"
                data-target="#submitMedia"
            >
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
@endsection

@section('custom-include')
@include('admin.media.add')
@include('admin.media.edit')
@endsection
