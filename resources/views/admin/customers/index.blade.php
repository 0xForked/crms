@extends('layouts.admin')

@section('title', 'My Customers')

@section('content')
    <div class="section-body">
        <h2 class="section-title">Customer work with!</h2>
        <p class="section-lead">On this page you can manage the customers data.</p>
        @if(!$errors->any())
            <x-admin.alert></x-admin.alert>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>List of Customer</h4>
                <div class="card-header-form">
                    <form
                        method="GET"
                        action=""
                    >
                        <div class="input-group">
                            <input
                                type="search"
                                class="form-control"
                                placeholder="Search by name . . ."
                                name="name"
                                value="{{ (app('request')->input('name')) ? app('request')->input('name') : ''}}"
                            >
                            <div class="input-group-btn">
                                <button class="btn btn-primary" value="search">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th rowspan="2" class="text-center" width="80">#</th>
                            <th rowspan="2">Name</th>
                            <th colspan="2" scope='colgroup' class="text-center">Contact</th>
                            <th rowspan="2" class="text-center">Projects</th>
                            <th rowspan="2" width="150" class="text-center">Action</th>
                        </tr>
                        <tr>
                            <th scope='col' class="text-center" width="250">Email</th>
                            <th scope='col' class="text-center" width="250">Phone</th>
                        </tr>
                        @foreach($customers as $item)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td class="text-center">
                                    <a href="mailto:{{$item->email}}">{{$item->email}}</a>
                                </td>
                                <td class="text-center">
                                    <a href="tel:{{$item->phone}}">{{$item->phone}}</a>
                                </td>
                                <td class="text-center">
                                    @foreach($item->projects as $project)
                                        <a class="m-1" href="{{url('projects' . '?' . http_build_query(['title'=> $project->title]))}}">
                                            <span class="badge badge-dark"> {{ $project->title }} </span>
                                        </a>
                                    @endforeach

                                    @if(count($item->projects) < 1)
                                        Customer has no project!
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button
                                        class="btn btn-outline-secondary"
                                        onclick="loadData(`{{ route('customers.show', $item->id) }}`, `customer`)"
                                        data-toggle="modal"
                                        data-target="#updateCustomer"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <button
                                        class="btn btn-outline-danger"
                                        onclick="deleteData(`{{ route('customers.destroy', $item->id) }}`, `{{csrf_token()}}`)"
                                        data-toggle="modal"
                                        data-target="#deleteModal"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card-footer bg-whitesmoke text-center">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                        {{ $customers->appends(request()->query())->links()  }}
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
                data-toggle="modal"
                data-target="#createCustomer"
            >
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
@endsection

@section('custom-include')
@include('admin.customers.add')
@include('admin.customers.edit')
@endsection
