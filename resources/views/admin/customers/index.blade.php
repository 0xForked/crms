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
                <div class="card-header-filter">
                    <div class="d-flex">
                        <h4>List of Customer</h4>
                        @if(app('request')->input('status') === 'trash')
                            <a
                                class="badge badge-pill badge-dark"
                                type="submit"
                                href="{{ route('customers.index') }}"
                            >
                                <i class="fas fa-list mr-2"></i>
                                List
                            </a>
                        @else
                            <a
                                class="badge badge-pill badge-dark"
                                type="submit"
                                href="{{ route('customers.index', ['status' => 'trash']) }}"
                            >
                                <i class="fas fa-trash mr-2"></i>
                                Trash
                            </a>
                        @endif
                    </div>
                </div>
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
                                    @if(!$item->deleted_at)
                                        <button
                                            class="btn btn-outline-secondary"
                                            onclick="loadData(`{{ route('customers.show', $item->id) }}`, `customer`)"
                                            data-toggle="modal"
                                            data-target="#updateCustomer"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    @endif

                                    @if($item->deleted_at)
                                        <a
                                            href="{{ route('customers.restore', $item->id) }}"
                                            class="btn btn-outline-success btn-block"
                                            onclick="event.preventDefault();
                                            document.getElementById('restore-form').submit();
                                            showLoading();"
                                        >
                                            <i class="fas fa-trash-restore"></i> Restore
                                        </a>

                                        <form
                                            id="restore-form"
                                            action="{{ route('customers.restore', $item->id) }}"
                                            method="POST"
                                            style="display: none;"
                                        >
                                            @csrf
                                            @method('PUT')
                                        </form>
                                     @endif

                                    <button
                                        class="btn btn-outline-danger {{ ($item->deleted_at) ? 'btn-block  mt-2' : ''  }}"
                                        onclick="deleteData(`{{ route('customers.destroy', $item->id) }}`, `{{csrf_token()}}`)"
                                        data-toggle="modal"
                                        data-target="#deleteModal"
                                    >
                                        <i class="fas fa-trash"></i>
                                            {{ ($item->deleted_at) ? 'Delete' : ''  }}
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
