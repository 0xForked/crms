<div class="section-header">
    <h1>@yield('title')</h1>
    <div class="section-header-breadcrumb">
        @foreach (Request::segments() as $segment)
            @if (!is_numeric($segment))
                <div class="breadcrumb-item">
                    @if ($loop->first)
                        <a href="{{ URL::to("/$segment") }}">{{ ucfirst($segment) }}</a>
                    @else
                        {{ ucfirst($segment) }}
                    @endif
                </div>
            @endif
        @endforeach
    </div>
</div>
