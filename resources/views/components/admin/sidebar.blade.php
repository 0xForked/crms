<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Laravel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img src="{{  asset('assets/img/sites/logo.png') }}" alt="logo" width="30">
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">DASHBOARD</li>
            <li class="dropdown {{(Request::segment(1) === 'dashboard') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{(Request::segment(2) === 'generals') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('dashboard/generals')}}">
                            General
                        </a>
                    </li>
                    <li class="{{(Request::segment(2) === 'analytics') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('dashboard/analytics')}}">
                            Analytics
                        </a>
                    </li>
                    <li class="{{(Request::segment(2) === 'transactions') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('dashboard/transactions')}}">
                            Transactions
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">DATA</li>
            <li class="{{(Request::segment(1) === 'media') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('media.index')}}">
                    <i class="fas fa-camera-retro"></i>
                    <span>Media</span>
                </a>
            </li>
            <li class="dropdown {{
                ((Request::segment(1) === 'articles') ||
                    (Request::segment(1) === 'categories'))
                ? 'active'
                : ''
            }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="far fa-newspaper"></i>
                    <span>Blog</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{(Request::segment(1) === 'categories') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('categories')}}">
                            Categories
                        </a>
                    </li>
                    <li class=" {{(Request::segment(1) === 'articles') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('articles')}}">
                            Articles
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{
                ((Request::segment(1) === 'projects') ||
                    (Request::segment(1) === 'customers') ||
                    (Request::segment(1) === 'invoices'))
                ? 'active'
                : ''
            }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-project-diagram"></i>
                    <span>Work</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{(Request::segment(1) === 'projects') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('projects')}}">
                            Projects
                        </a>
                    </li>
                    <li class="{{(Request::segment(1) === 'customers') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('customers')}}">
                            Customers
                        </a>
                    </li>
                    <li class="{{(Request::segment(1) === 'invoices') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('invoices')}}">
                            Invoices
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">SITE</li>
            <li class="{{(Request::segment(1) === 'settings') ? 'active' : ''}}">
                    <a class="nav-link" href="{{url('settings')}}">
                    <i class="fas fa-cogs"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
