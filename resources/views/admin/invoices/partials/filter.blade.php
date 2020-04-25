<div class="card-header-filter">
    <div class="d-flex">
        <div class="form-group">
            <form method="GET">
                <label for="filter-by-status">Filter by customer</label>
                <div class="input-group">
                    <select
                        name="customer"
                        id="customer"
                        class="form-control"
                        style="width: 180px; border-radius: 30px 0 0 30px !important; height: 32px !important; font-size:13px; padding: 0 10px !important;"
                    >
                        <option value="all" {{ (app('request')->input('customer') === 'all') ? 'selected' : ''}}>All customers</option>
                        @foreach($customers as $item)
                            <option
                                value="{{$item->name}}"
                                {{(app('request')->input('category') === $item->name) ? 'selected' : ''}}
                            >{{ ucfirst($item->name) }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" style="border-radius: 0 30px 30px 0 !important;" onclick="showLoading()">
                            <i class="fas fa-users"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="form-group ml-3">
            <form method="GET">
                <label for="filter-by-status">Filter by status</label>
                <div class="input-group">
                    <select
                        name="status"
                        id="status"
                        class="form-control"
                        style="width: 180px; border-radius: 30px 0 0 30px !important; height: 32px !important; font-size:13px; padding: 0 10px !important;"
                    >
                        <option value="all" {{ (app('request')->input('status') === 'all') ? 'selected' : ''}}>All status</option>
                        <option value="draft" {{ (app('request')->input('status') === 'draft') ? 'selected' : ''}}>Draft</option>
                        <option value="notified" {{ (app('request')->input('status') === 'notified') ? 'selected' : ''}}>Notified</option>
                        <option value="proceed" {{ (app('request')->input('status') === 'proceed') ? 'selected' : ''}}>Processed</option>
                        <option value="paid" {{ (app('request')->input('status') === 'paid') ? 'selected' : ''}}>Paid</option>
                        <option value="trash" {{ (app('request')->input('status') === 'trash') ? 'selected' : ''}}>Trashed</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" style="border-radius: 0 30px 30px 0 !important;" onclick="showLoading()">
                            <i class="fab fa-firstdraft"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="form-group ml-3">
            <form method="GET">
                <label for="filter-by-status">Filter by date</label>
                <div class="d-flex">
                    <input
                        type="text"
                        class="form-control ml-2 datepicker"
                        name="from_date"
                        id="date_from_filter_article"
                        value="{{ (app('request')->input('from_date')) ? app('request')->input('from_date') : ''}}"
                        style="border-radius: 30px 0 0 30px !important; height: 33px !important; font-size:13px; padding: 0 10px !important; -webkit-appearance: none;"
                    >
                    <input
                        type="text"
                        class="form-control datepicker"
                        name="to_date"
                        id="date_to_filter_article"
                        value="{{ (app('request')->input('to_date')) ? app('request')->input('to_date') : ''}}"
                        style="border-radius: 0 0 0 0 !important; height: 33px !important; font-size:13px; padding: 0 10px !important; -webkit-appearance: none;"
                    >
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" style="border-radius: 0 30px 30px 0 !important;" onclick="showLoading()">
                            <i class="fas fa-calendar-week"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="card-header-form">
    <form method="GET">
        <div class="input-group mt-3">
            <input
                type="search"
                class="form-control"
                placeholder="Search by number . . ."
                name="number"
                style="height: 33px !important;"
                value="{{ (app('request')->input('number')) ? app('request')->input('number') : ''}}"
            >
            <div class="input-group-btn">
                <button class="btn btn-primary" value="search" style="height: 33px !important;" onclick="showLoading()">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
