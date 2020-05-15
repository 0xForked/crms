{{--$invoices->user->billingaddress--}}
@if(true)
    <p class="bill-to">Bill To,</p>
{{--    $invoices->user->billingaddress->name--}}
    @if(true)
        <p class="bill-user-name">
            BILLING_ADDRESS_NAME
{{--            {{$invoices->user->billingaddress->name}}--}}
        </p>
    @endif
    <p class="bill-user-address">
{{--        $invoices->user->billingaddress->address_street_1--}}
        @if(true)
            ADDRESS_STREET_1
{{--            {!! nl2br(htmlspecialchars($invoices->user->billingaddress->address_street_1)) !!}<br>--}}
        @endif
{{--        $invoices->user->billingaddress->address_street_2--}}
        @if(true)
            ADDRESS_STREET_2
{{--            {!! nl2br(htmlspecialchars($invoices->user->billingaddress->address_street_2)) !!}<br>--}}
        @endif
{{--        $invoices->user->billingaddress->city && $invoices->user->billingaddress->city--}}
        @if(true)
            CITY
{{--            {{$invoices->user->billingaddress->city}},--}}
        @endif
{{--        $invoices->user->billingaddress->state && $invoices->user->billingaddress->state--}}
        @if(true)
            STATE
{{--            {{$invoices->user->billingaddress->state}}.--}}
        @endif
{{--        $invoices->user->billingaddress->zip--}}
        @if(true)
            ZIP
{{--            {{$invoices->user->billingaddress->zip}}<br>--}}
        @endif
{{--        $invoices->user->billingaddress->country && $invoices->user->billingaddress->country->name--}}
        @if(true)
            COUNTRY
{{--            {{$invoices->user->billingaddress->country->name}}<br>--}}
        @endif
{{--$invoices->user->billingaddress->phone--}}
        @if(TRUE)
            <p class="bill-user-phone">
                Phone : PHONE
{{--                {{$invoices->user->billingaddress->phone}}--}}
            </p>
        @endif
    </p>
@endif
