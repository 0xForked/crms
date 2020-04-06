@extends('layouts.admin')

@section('title', 'Create new Articles')

@section('content')
    <div class="section-body">
        <h2 class="section-title">Create a new Stories</h2>
        <p class="section-lead">On this page, you will be able to create a new story</p>
        @if(!$errors->any())
            <x-admin.alert/>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Write Your Post</h4>
                    </div>
                    <div class="card-body">
                        <form
                            id="post-form"
                            action="{{route('articles.store')}}"
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control" name="category">
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}">{{strtoupper($item->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="content_html" style="display:none" id="content-html"></textarea>
                                    <textarea name="content_json" style="display:none" id="content-json"></textarea>
                                    <textarea name="content_text" style="display:none" id="content-text"></textarea>
                                    <div id="scrolling-container">
                                        <div id="quill-container"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="featured_image" id="image-upload" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control" name="status">
                                        <option>DRAFT</option>
                                        <option>PUBLISH</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" type="submit">Create Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-style')
<link href="{{ asset('assets/css/quill.bubble.css') }}" rel="stylesheet">
@endsection

@section('custom-script-body')
    <script src="{{ asset('assets/js/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom_quill_editor.js') }}"></script>
@endsection
