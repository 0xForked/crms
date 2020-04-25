<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th rowspan="2" class="text-center" width="80">#</th>
            <th rowspan="2">Number</th>
            <th colspan="2" class="text-center">Date</th>
            <th rowspan="2">Customer</th>
            <th rowspan="2">Amount</th>
            <th rowspan="2" class="text-center">Status</th>
            <th rowspan="2" width="150"></th>
        </tr>
        <tr>
            <th scope='col' class="text-center">Issued</th>
            <th scope='col' class="text-center">Due</th>
        </tr>
        @foreach($invoices as $item)
            <tr>
                <td>{{$index->loop}}</td>
                <td>{{$item->invoice_number}}</td>
                <td>{{$item->invoice_date}}</td>
                <td>{{$item->customer->name}}</td>
                <td>{{$item->due_amount}}</td>
                <td>
                        <span class="badge badge-primary">
                            {{$item->status}}
                        </span>
                </td>
                <td>
                    {{--  add some menu here  --}}
                </td>
            </tr>
        @endforeach
    </table>
</div>
