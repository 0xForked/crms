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
