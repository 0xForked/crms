@foreach ($media as $item)
    <div class="dropdown d-inline">
        <a href="#"
           data-toggle="dropdown"
           aria-haspopup="true"
           aria-expanded="false"
        >
            <div class="card" >
                <img class="card-img-top"
                     src="{{ asset('storage/images/'. $item->name) }}"
                     alt="Card image cap">
            </div>
        </a>
        <div class="dropdown-menu">
            <a
                class="dropdown-item has-icon"
                href="#"
                onclick="window.prompt('Copy to clipboard: Ctrl+C, Enter', `{{$item->name}}`);"
            >
                <i class="fas fa-copy"></i> Copy name
            </a>
            <a
                class="dropdown-item has-icon"
                href="#"
                onclick="window.prompt('Copy to clipboard: Ctrl+C, Enter', `{{ asset('storage/images/'. $item->name) }}`);"
            >
                <i class="fas fa-link"></i> Copy link
            </a>
            <hr>
            <a
                class="dropdown-item has-icon text-info"
                href="#"
                data-toggle="modal"
                data-target="#updateMedia"
                onclick="loadData(`{{ route('media.show', $item->id) }}`, `media`)"
            >
                <i class="fas fa-edit"></i> Update
            </a>
            <a
                href="#"
                class="dropdown-item has-icon text-danger"
                onclick="deleteData(`{{ route('media.destroy', $item->id) }}`, `{{csrf_token()}}`)"
                data-toggle="modal"
                data-target="#deleteModal"
            >
                <i class="fas fa-trash"></i> Delete
            </a>
        </div>
    </div>
@endforeach
