<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th rowspan="2" class="text-center" width="80">#</th>
            <th rowspan="2">Name</th>
            <th colspan="2" scope='colgroup' class="text-center">Contact</th>
            <th rowspan="2" class="text-center">Latest Transaction</th>
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
                    @if($item->email)
                        <a href="mailto:{{$item->email}}">{{$item->email}}</a>
                    @else
                        NOT_SET
                    @endif
                </td>
                <td class="text-center">
                    @if($item->phone)
                        <a href="tel:{{$item->phone}}">{{$item->phone}}</a>
                    @else
                        NOT_SET
                    @endif
                </td>
                <td class="text-center">
                    @if($item->invoice)
                        <button type="button" class="btn btn-dark">
                            {{$item->invoice->invoice_number}}
                            <span class="badge badge-transparent">
                                {{$item->invoice->status}}
                            </span>
                        </button>
                    @else
                        NONE
                    @endif
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
