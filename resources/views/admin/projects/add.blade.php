@extends('layouts.admin')

@section('title', 'Create new Project')

@section('content')
    <div class="section-body">
        <h2 class="section-title">Add a new Project</h2>
        <p class="section-lead">On this page, you will be able to create a new project</p>
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
                            action="{{route('projects.store')}}"
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
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control" name="type" id="type_project">
                                        <option>WEB</option>
                                        <option>MOBILE</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4 d-none" id="live_link_container">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Live</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="link_live" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Docs</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="link_doc" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 ">Link Source</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="link_source" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4 d-none" id="store_link_container">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 ">Link Store</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="form-group">
                                        <button
                                            type="button"
                                            id="add_row_form_store_link"
                                            class="btn btn-sm btn-outline-primary float-right mb-3"
                                        >Tambah Form</button>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-md" id="table_form_store_link">
                                                <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Link</th>
                                                    <th class="text-center d-none" width="100">Aksi</th>
                                                </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-danger delete-row-form-store-link float-right"
                                        >Hapus Form</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="description" class="form-control h-100"></textarea>
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
                                    <button class="btn btn-primary" type="submit">Create Project</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


