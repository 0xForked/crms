{{--$invoice->user->company--}}
@if(true)
    <h1>COMPANY_NAME</h1>
{{--    <h1> {{$invoice->user->company->name}} </h1>--}}
@endif

{{--$company_address--}}
@if(true)
    <p class="company-add">
{{--        $company_address->addresses[0]['address_street_1']--}}
        @if(true)
            COMPANY_ADDRESS_1
{{--            {!! nl2br(htmlspecialchars($company_address->addresses[0]['address_street_1'])) !!} <br>--}}
        @endif

{{--        $company_address->addresses[0]['address_street_2']--}}
        @if(true)
            COMPANY_ADDRESS_1

            {{--            {!! nl2br(htmlspecialchars($company_address->addresses[0]['address_street_2'])) !!} <br>--}}
        @endif
{{--        $company_address->addresses[0]['city']--}}
        @if(true)
            CITY
{{--            {{$company_address->addresses[0]['city']}}--}}
        @endif
{{--        $company_address->addresses[0]['state']--}}
        @if(true)
            STATE
{{--            {{$company_address->addresses[0]['state']}}--}}
        @endif
{{--        $company_address->addresses[0]['zip']--}}
        @if(true)
            ZIP
{{--            {{$company_address->addresses[0]['zip']}} <br>--}}
        @endif
{{--        $company_address->addresses[0]['country']--}}
        @if(true)
            COUNTRY
{{--            {{$company_address->addresses[0]['country']->name}} <br>--}}
        @endif
{{--        $company_address->addresses[0]['phone']--}}
        @if(true)
            PHONE
{{--            {{$company_address->addresses[0]['phone']}} <br>--}}
        @endif
    </p>
@endif
