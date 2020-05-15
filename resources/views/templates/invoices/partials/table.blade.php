<table width="100%" class="table2" cellspacing="0" border="0">
    <tr class="main-table-header">
        <th width="2%" class="ItemTableHeader" style="text-align: right; color: #55547A; padding-right: 20px">#</th>
        <th width="40%" class="ItemTableHeader" style="text-align: left; color: #55547A; padding-left: 0px">Items</th>
        <th class="ItemTableHeader" style="text-align: right; color: #55547A; padding-right: 20px">Quantity</th>
        <th class="ItemTableHeader" style="text-align: right; color: #55547A; padding-right: 20px">Price</th>
{{--        $invoices->discount_per_item === 'YES'--}}
        @if(true)
            <th class="ItemTableHeader" style="text-align: right; color: #55547A; padding-left: 10px">Discount</th>
        @endif
        <th class="ItemTableHeader" style="text-align: right; color: #55547A;">Amount</th>
    </tr>
    @php
        $index = 1;
        $items = (object) [
            (object) [
                'name' => 'asd',
                'quantity'  => '2',
                'description' => 'Walnut tastes best with rice vinegar and lots of nutmeg.',
                'price' => '22',
                'discount' => '22',
                'total' => '22'
            ],
            (object) [
                'name' => 'qwe',
                'quantity'  => '2',
                'description' => 'Walnut tastes best with rice vinegar and lots of nutmeg.',
                'price' => '22',
                'discount' => '22',
                'total' => '22'
            ]
        ];
    @endphp
    @foreach ($items as $item)
        <tr class="item-details">
            <td
                class="inv-item items"
                style="text-align: right; color: #040405; padding-right: 20px; vertical-align: top;"
            >
                {{$index}}
            </td>
            <td
                class="inv-item items"
                style="text-align: left; color: #040405;padding-left: 0px"
            >
                <span>{{ $item->name }}</span><br>
                <span style="text-align: left; color: #595959; font-size: 9px; font-weight:300; line-height: 12px;">{!! nl2br(htmlspecialchars($item->description)) !!}</span>
            </td>
            <td
                class="inv-item items"
                style="text-align: right; color: #040405; padding-right: 20px"
            >
                {{$item->quantity}}
            </td>
            <td
                class="inv-item items"
                style="text-align: right; color: #040405; padding-right: 20px"
            >
                Rp. {{$item->price}}
{{--                {!! format_money_pdf($item->price, $invoices->user->currency) !!}--}}
            </td>
{{--            $invoices->discount_per_item === 'YES'--}}
            @if(true)
                <td class="inv-item items" style="text-align: right; color: #040405; padding-left: 10px">
                    {{$item->discount}}%
                </td>
            @endif
            <td
                class="inv-item items"
                style="text-align: right; color: #040405;"
            >
                Rp. {{$item->total}}
{{--                {!! format_money_pdf($item->total, $invoices->user->currency) !!}--}}
            </td>
        </tr>
        @php
            $index += 1
        @endphp
    @endforeach
</table>

<hr class="items-table-hr">

{{--@if(count($items) > 12) page-break @endif--}}
<table width="100%" cellspacing="0px" style="margin-left:420px; margin-top: 10px" border="0" class="table3 ">
    <tr>
        <td class="no-border" style="color: #55547A; padding-left:10px;  font-size:12px;">Subtotal</td>
        <td class="no-border items padd2"
            style="padding-right:10px; text-align: right;  font-size:12px; color: #040405; font-weight: 500;">
{{--            Total --}}
{{--            {!! format_money_pdf($invoices->sub_total, $invoices->user->currency) !!}--}}
        </td>
    </tr>

{{--    @if ($invoices->tax_per_item === 'YES')--}}
{{--        @for ($i = 0; $i < count($labels); $i++)--}}
{{--            <tr>--}}
{{--                <td class="no-border" style="padding-left:10px; text-align:left; font-size:12px;  color: #55547A;">--}}
{{--                    {{$labels[$i]}}--}}
{{--                </td>--}}
{{--                <td class="no-border items padd2" style="padding-right:10px; font-weight: 500; text-align: right; font-size:12px;  color: #040405">--}}
{{--                    {!! format_money_pdf($taxes[$i], $invoices->user->currency) !!}--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endfor--}}
{{--    @else--}}
{{--        @foreach ($invoices->taxes as $tax)--}}
{{--            <tr>--}}
{{--                <td class="no-border" style="padding-left:10px; text-align:left; font-size:12px;  color: #55547A;">--}}
{{--                    {{$tax->name.' ('.$tax->percent.'%)'}}--}}
{{--                </td>--}}
{{--                <td class="no-border items padd2" style="padding-right:10px; font-weight: 500; text-align: right; font-size:12px;  color: #040405">--}}
{{--                    {!! format_money_pdf($tax->amount, $invoices->user->currency) !!}--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    @endif--}}

{{--    @if ($invoices->discount_per_item === 'NO')--}}
{{--        <tr>--}}
{{--            <td class="no-border" style="padding-left:10px; text-align:left; font-size:12px; color: #55547A;">--}}
{{--                @if($invoices->discount_type === 'fixed')--}}
{{--                    Discount--}}
{{--                @endif--}}
{{--                @if($invoices->discount_type === 'percentage')--}}
{{--                    Discount ({{$invoices->discount}}%)--}}
{{--                @endif--}}
{{--            </td>--}}
{{--            <td class="no-border items padd2" style="padding-right:10px; font-weight: 500; text-align: right; font-size:12px;  color: #040405">--}}
{{--                @if($invoices->discount_type === 'fixed')--}}
{{--                    {!! format_money_pdf($invoices->discount_val, $invoices->user->currency) !!}--}}
{{--                @endif--}}
{{--                @if($invoices->discount_type === 'percentage')--}}
{{--                    {!! format_money_pdf($invoices->discount_val, $invoices->user->currency) !!}--}}
{{--                @endif--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    @endif--}}
    <tr>
        <td style="padding:3px 0px"></td>
        <td style="padding:3px 0px"></td>
    </tr>
    <tr>
        <td class="no-border total-border-left"
            style="padding-left:10px; padding-bottom:10px; text-align:left; padding-top:20px; font-size:12px;  color: #55547A;"
        >
            <label class="total-bottom"> Total </label>
        </td>
        <td
            class="no-border total-border-right items padd8"
            style="padding-right:10px; font-weight: 500; text-align: right; font-size:12px;  padding-top:20px; color: #5851DB"
        >
            ITEM_TOTAL
{{--            {!! format_money_pdf($invoices->total, $invoices->user->currency)!!}--}}
        </td>
    </tr>
</table>
