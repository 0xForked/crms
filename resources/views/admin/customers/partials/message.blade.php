<div class="text-center p-5 mx-auto">
    @if(app('request')->input('status') === TRASHED)
        <h1> Trash is Empty! </h1>
    @else
        <h1> You haven't registered any customers yet! </h1>
    @endif
</div>
