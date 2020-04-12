<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
        <div class="search-element">
           <h5 class="text-white mt-2">#aasite-v2 [back-office]</h5>
        </div>
    </form>
    <ul class="navbar-nav navbar-right">
        <li>
            <a
                href="{{url('accounts')}}"
                class="nav-link nav-link-lg nav-link-user"
            >
                <img alt="image" src="{{ asset('assets/img/sites/aasumitro.jpg') }}" class="rounded-circle mr-1">
                <div class="d-inline-block">
                    {{'@'.auth()->user()->username}}
                </div>
            </a>
        </li>
    </ul>
</nav>
