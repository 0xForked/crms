{{--@if($invoices->user->shippingaddress)--}}
{{--    <p class="ship-to">Ship To,</p>--}}
{{--    @if($invoices->user->shippingaddress->name)--}}
{{--        <p class="ship-user-name">--}}
{{--            {{$invoices->user->shippingaddress->name}}--}}
{{--        </p>--}}
{{--    @endif--}}
{{--    <p class="ship-user-address">--}}
{{--        @if($invoices->user->shippingaddress->address_street_1)--}}
{{--            {!! nl2br(htmlspecialchars($invoices->user->shippingaddress->address_street_1)) !!}<br>--}}
{{--        @endif--}}

{{--        @if($invoices->user->shippingaddress->address_street_2)--}}
{{--            {!! nl2br(htmlspecialchars($invoices->user->shippingaddress->address_street_2)) !!}<br>--}}
{{--        @endif--}}

{{--        @if($invoices->user->shippingaddress->city && $invoices->user->shippingaddress->city)--}}
{{--            {{$invoices->user->shippingaddress->city}},--}}
{{--        @endif--}}

{{--        @if($invoices->user->shippingaddress->state && $invoices->user->shippingaddress->state)--}}
{{--            {{$invoices->user->shippingaddress->state}}.--}}
{{--        @endif--}}

{{--        @if($invoices->user->shippingaddress->zip)--}}
{{--            {{$invoices->user->shippingaddress->zip}}<br>--}}
{{--        @endif--}}

{{--        @if($invoices->user->shippingaddress->country && $invoices->user->shippingaddress->country->name)--}}
{{--            {{$invoices->user->shippingaddress->country->name}}<br>--}}
{{--@endif--}}

{{--@if($invoices->user->phone)--}}
{{--    <p class="ship-user-phone">--}}
{{--        Phone :{{$invoices->user->shippingaddress->phone}}--}}
{{--    </p>--}}
{{--    @endif--}}

{{--    </p>--}}
{{--@endif--}}
