@if(count($articles) < 1)
    <div class="text-center p-5 mx-auto">
        @if(app('request')->input('status') === TRASHED)
            <h1> Trash is Empty! </h1>
        @elseif(app('request')->input('status') === strtolower(PUBLISH))
            <h1> You haven't any published stories! </h1>
        @elseif(app('request')->input('status') === strtolower(DRAFT))
            <h1> You haven't any drafted stories! </h1>
        @elseif(app('request')->input('category'))
            <h1> Stories with selected category is not found! </h1>
        @elseif(app('request')->input('title'))
            <h1> Stories with filtered title is not found! </h1>
        @else
            <h1> You haven't write any stories yet! </h1>
        @endif
    </div>
@endif
