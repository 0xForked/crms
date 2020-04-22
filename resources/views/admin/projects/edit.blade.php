@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
    <div class="section-body">
        <h2 class="section-title">Edit Project - {{$project->title}}</h2>
        <p class="section-lead">On this page, you will be able to edit a project</p>
        @if(!$errors->any())
            <x-admin.alert></x-admin.alert>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Write Your Project Detail</h4>
                    </div>
                    <div class="card-body">
                        <form
                            id="post-form"
                            action="{{route('projects.update', $project->id)}}"
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$project->title}}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control" name="type" id="type_project">
                                        <option {{ ($project->type === WEB) ? 'selected' : ''  }}>WEB</option>
                                        <option {{ ($project->type === MOBILE) ? 'selected' : ''  }}>MOBILE</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4 d-none" id="live_link_container">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Live</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="link_live" class="form-control" value="{{$project->link_live}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Docs</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="link_doc" class="form-control" value="{{$project->link_doc}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 ">Link Source</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="link_source" class="form-control" value="{{$project->link_source}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4 d-none" id="store_link_container">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Store</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="form-group">
                                        <div class="table-responsive">
                                            @if(count(json_decode($project->link_store)) <= 1)
                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-outline-primary float-right mb-3"
                                                    onclick="addFormLinkUpdate()"
                                                >Tambah Form</button>
                                            @endif
                                            <table class="table table-bordered table-md" id="table_form_store_link_update">
                                                <thead>
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Link</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach(json_decode($project->link_store) as $item)
                                                        <tr id="store_link{{$loop->iteration}}">
                                                            <td>
                                                                <select class="form-control" name="store_name{{$loop->iteration}}">
                                                                    <option
                                                                        value="google"
                                                                        {{ ($item->name === 'google') ? 'selected' : ''  }}
                                                                    > Google Play Store</option>
                                                                    <option
                                                                        value="apple"
                                                                        {{ ($item->name === 'apple') ? 'selected' : ''  }}
                                                                    > Apple App Store </option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    name="store_link{{$loop->iteration}}"
                                                                    type="text"
                                                                    class="form-control"
                                                                    value="{{$item->link}}"
                                                                >
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-outline-danger btn-block" type="button" onclick="deleteFormLinkUpdate(`store_link{{$loop->iteration}}`)" name="delete"> Delete </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="description" class="form-control h-100">{{$project->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="featured_image" class="form-control"  value="{{$project->featured_image}}">
                                    <small class="text-muted">
                                        This form stand for image link, you can get the link from
                                        <a href="{{route('media.index')}}" target="_blank">media</a>.
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control" name="status">
                                        <option {{ ($project->status === DRAFT) ? 'selected' : ''  }}>DRAFT</option>
                                        <option {{ ($project->status === PUBLISH) ? 'selected' : ''  }}>PUBLISH</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" type="submit">Update Project</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

