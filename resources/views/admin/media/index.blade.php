@extends('layouts.admin')

@section('title', 'My Media')

@section('content')
    <div class="section-body">
        <h2 class="section-title">Media</h2>
        <p class="section-lead">On this page you can manipulate media collections.</p>
        @if(!$errors->any())
            <x-admin.alert></x-admin.alert>
        @endif

        <section id="images">
            <div class="card-columns">
                @foreach ($media as $item)
                    <div class="dropdown d-inline">
                        <a href="#"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                        >
                            <div class="card" >
                                <img class="card-img-top"
                                     src="{{ asset('storage/images/'. $item->name) }}"
                                     alt="Card image cap">
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            <a
                                class="dropdown-item has-icon"
                                href="#"
                                onclick="window.prompt('Copy to clipboard: Ctrl+C, Enter', `{{$item->name}}`);"
                            >
                                <i class="fas fa-copy"></i> Copy name
                            </a>
                            <a
                                class="dropdown-item has-icon"
                                href="#"
                                onclick="window.prompt('Copy to clipboard: Ctrl+C, Enter', `{{ asset('storage/images/'. $item->name) }}`);"
                            >
                                <i class="fas fa-link"></i> Copy link
                            </a>
                            <hr>
                            <a
                                class="dropdown-item has-icon text-info"
                                href="#"
                                data-toggle="modal"
                                data-target="#updateMedia"
                                onclick="loadData(`{{ route('media.show', $item->id) }}`, `media`)"
                            >
                                <i class="fas fa-edit"></i> Update
                            </a>
                            <a
                                href="#"
                                class="dropdown-item has-icon text-danger"
                                onclick="deleteData(`{{ route('media.destroy', $item->id) }}`, `{{csrf_token()}}`)"
                                data-toggle="modal"
                                data-target="#deleteModal"
                            >
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                @endforeach
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
