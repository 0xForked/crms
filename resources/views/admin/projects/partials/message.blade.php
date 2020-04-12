@if(count($projects) < 1)
    <div class="text-center p-5 mx-auto">
        @if(app('request')->input('status') === TRASHED)
            <h1> Trash is Empty! </h1>
        @elseif(app('request')->input('status') === strtolower(PUBLISH))
            <h1> You haven't any published projects! </h1>
        @elseif(app('request')->input('status') === strtolower(DRAFT))
            <h1> You haven't any drafted projects! </h1>
        @elseif(app('request')->input('type') === strtolower(MOBILE))
            <h1> You haven't any mobile projects! </h1>
        @elseif(app('request')->input('type') === strtolower(WEB))
            <h1> You haven't any web projects! </h1>
        @elseif(app('request')->input('category'))
            <h1> Projects with selected category is not found! </h1>
        @elseif(app('request')->input('title'))
            <h1> Projects with filtered title is not found! </h1>
        @else
            <h1> You haven't add any projects yet! </h1>
        @endif
    </div>
@endif
