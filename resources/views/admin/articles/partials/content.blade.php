<div class="col-12 col-md-4 mb-5">
    <div class="card card-dark h-100">
        <div class="card-header">
            <div class="card-header-filter">
                <span class="font-weight-bold badge badge-dark rounded-lg d-block mt-1">{{ucwords($item->category->name)}}</span>
            </div>
            <div class="card-header-action">
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-dark dropdown-toggle">Options</a>
                    <div class="dropdown-menu">
                        @if($item->deleted_at)
                            <a
                                href="{{ route('articles.restore', $item->id) }}"
                                class="dropdown-item has-icon text-success"
                                onclick="event.preventDefault();
                                document.getElementById('restore-form').submit();
                                showLoading();"
                            >
                                <i class="fas fa-trash-restore"></i> Restore
                            </a>

                            <form
                                id="restore-form"
                                action="{{ route('articles.restore', $item->id) }}"
                                method="POST"
                                style="display: none;"
                            >
                                @csrf
                                @method('PUT')
                            </form>
                        @else
                            <a
                                href="{{url('https://aasumitro.id/'. $item->slug)}}"
                                target="_blank"
                                class="dropdown-item has-icon"
                            >
                                <i class="fas fa-external-link-alt"></i> View
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('articles.edit', $item->id)}}" class="dropdown-item has-icon" onclick="showLoading()">
                                <i class="far fa-edit"></i> Edit
                            </a>
                            <a
                                href="#"
                                class="dropdown-item has-icon"
                                data-toggle="modal"
                                data-target="#statusModal"
                                onclick="updateStatus(`{{$item->status}}`, `{{ route('articles.status', $item->id) }}`,`{{csrf_token()}}`)"
                            >
                                @if($item->status === DRAFT)
                                    <i class="fas fa-eye"></i> Publish
                                @else
                                    <i class="fas fa-eye-slash"></i> Take down
                                @endif
                            </a>
                        @endif

                        <div class="dropdown-divider"></div>
                        <a
                            href="#"
                            class="dropdown-item has-icon text-danger"
                            data-toggle="modal"
                            data-target="#deleteModal"
                            onclick="deleteData(`{{ route('articles.destroy', $item->id) }}`, `{{csrf_token()}}`)"
                        >
                            <i class="far fa-trash-alt"></i>
                            @if($item->deleted_at)
                                Erase form storage
                            @else
                                Move to trash
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <span> Created {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </span>
            <div class="bullet"></div>
            <span class="text-{{ ($item->status === 'PUBLISH') ? 'success' : 'warning'}}">
                {{ ($item->status === 'PUBLISH') ? 'Published' : 'Draft'}}
            </span>
            <h5 class="mt-3">
                {{$item->title}}
                <span class="text-muted" style="font-size: 13px">({{avg_read_time($item->content_text)}})</span>
            </h5>
        </div>
    </div>
</div>
