<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <h4>List of Category</h4>
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
                        <th rowspan="2" class="text-center">#</th>
                        <th rowspan="2">Name</th>
                        <th colspan="2" scope='colgroup' class="text-center">Linked</th>
                        <th rowspan="2" width="150" class="text-center">Action</th>
                    </tr>
                    <tr>
                        <th scope='col' class="text-center">Articles</th>
                        <th scope='col' class="text-center">Projects</th>
                    </tr>
                    @foreach($categories as $item)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{strtoupper($item->name)}}</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">
                                <button
                                    class="btn btn-outline-secondary"
                                    onclick="loadData(`{{ route('categories.show', $item->id) }}`, `category`)"
                                    data-toggle="modal"
                                    data-target="#editCategory"
                                >
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button
                                    class="btn btn-outline-danger"
                                    onclick="deleteData(`{{ route('categories.destroy', $item->id) }}`, `{{csrf_token()}}`)"
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
                    {{ $categories->appends(request()->query())->links()  }}
                </ul>
            </nav>
        </div>
    </div>
</div>
