{{--$invoice->user->billingaddress--}}
@if(true)
    <p class="bill-to">Bill To,</p>
{{--    $invoice->user->billingaddress->name--}}
    @if(true)
        <p class="bill-user-name">
            BILLING_ADDRESS_NAME
{{--            {{$invoice->user->billingaddress->name}}--}}
        </p>
    @endif
    <p class="bill-user-address">
{{--        $invoice->user->billingaddress->address_street_1--}}
        @if(true)
            ADDRESS_STREET_1
{{--            {!! nl2br(htmlspecialchars($invoice->user->billingaddress->address_street_1)) !!}<br>--}}
        @endif
{{--        $invoice->user->billingaddress->address_street_2--}}
        @if(true)
            ADDRESS_STREET_2
{{--            {!! nl2br(htmlspecialchars($invoice->user->billingaddress->address_street_2)) !!}<br>--}}
        @endif
{{--        $invoice->user->billingaddress->city && $invoice->user->billingaddress->city--}}
        @if(true)
            CITY
{{--            {{$invoice->user->billingaddress->city}},--}}
        @endif
{{--        $invoice->user->billingaddress->state && $invoice->user->billingaddress->state--}}
        @if(true)
            STATE
{{--            {{$invoice->user->billingaddress->state}}.--}}
        @endif
{{--        $invoice->user->billingaddress->zip--}}
        @if(true)
            ZIP
{{--            {{$invoice->user->billingaddress->zip}}<br>--}}
        @endif
{{--        $invoice->user->billingaddress->country && $invoice->user->billingaddress->country->name--}}
        @if(true)
            COUNTRY
{{--            {{$invoice->user->billingaddress->country->name}}<br>--}}
        @endif
{{--$invoice->user->billingaddress->phone--}}
        @if(TRUE)
            <p class="bill-user-phone">
                Phone : PHONE
{{--                {{$invoice->user->billingaddress->phone}}--}}
            </p>
        @endif
    </p>
@endif
