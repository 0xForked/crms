@extends('layouts.admin')

@section('title', 'Edit Articles')

@section('content')
    <div class="section-body">
        <h2 class="section-title">Edit Stories</h2>
        <p class="section-lead">On this page, you will be able to edit a story</p>
        @if(!$errors->any())
            <x-admin.alert></x-admin.alert>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Your Post</h4>
                    </div>
                    <div class="card-body">
                        <form
                            id="post-form"
                            action="{{route('articles.update', $article->id)}}"
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title" class="form-control" value="{{$article->title}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control" name="category">
                                        @foreach($categories as $item)
                                            <option
                                                value="{{$item->id}}"
                                                {{ ($item->id === $article->category_id) ? 'selected' : ''  }}
                                            >{{strtoupper($item->name)}}</option>
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
                                    <input type="text" name="featured_image" id="featured_image_link" class="form-control"  value="{{$article->featured_image}}">
                                    <small class="text-muted">
                                        This form stand for image link, you can get the link from
                                        <a href="{{route('media.index')}}" target="_blank">media</a>.
                                        Or you can <a
                                            href="#"
                                            data-toggle="modal"
                                            data-target="#mediaModal"
                                            onclick="loadData(`{{ url('api/media') }}`, `mediaList`)"
                                        >search</a>.
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control" name="status">
                                        <option {{ ($article->status === DRAFT) ? 'selected' : ''  }}>DRAFT</option>
                                        <option {{ ($article->status === PUBLISH) ? 'selected' : ''  }}>PUBLISH</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" type="submit">Update Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-include')
    <x-admin.image/>
@endsection

@section('custom-style')
    <link href="{{ asset('assets/css/bootstrap-image-checkbox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/quill.bubble.css') }}" rel="stylesheet">
@endsection

@section('custom-script-body')
    <script src="{{ asset('assets/js/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom_quill_editor.js') }}"></script>

    <script>
        editor.root.innerHTML = `{!! $article->content_html !!}`;
        {{--quill.setContents({!! $post->body !!}); show post body on quill--}}
    </script>
@endsection


