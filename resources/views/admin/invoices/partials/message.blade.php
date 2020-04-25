<div class="text-center p-5 mx-auto">
    @if(app('request')->input('status') === TRASHED)
        <h1> Trash is Empty! </h1>
    @elseif(app('request')->input('status') === strtolower(PAID))
        <h1> You haven't any paid transactions! </h1>
    @elseif(app('request')->input('status') === strtolower(PROCEED))
        <h1> You haven't any proceed transactions! </h1>
    @elseif(app('request')->input('status') === strtolower(NOTIFIED))
        <h1> You haven't any notified transactions! </h1>
    @elseif(app('request')->input('status') === strtolower(DRAFT))
        <h1> You haven't any drafted transactions! </h1>
    @elseif(app('request')->input('number'))
        <h1> Invoice with filtered number is not found! </h1>
    @elseif(app('request')->input('customer'))
        <h1> Invoice with filtered customer is not found! </h1>
    @else
        <h1> You haven't create any transactions yet! </h1>
    @endif
</div>
