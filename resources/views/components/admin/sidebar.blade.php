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
            <li class="{{(Request::segment(1) === 'dashboard') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('dashboard')}}">
                    <i class="fas fa-columns"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">DATA</li>
            <li class="{{(Request::segment(1) === 'categories') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('categories')}}">
                    <i class="fas fa-cubes"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li class="{{(Request::segment(1) === 'articles') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('articles')}}">
                    <i class="far fa-newspaper"></i>
                    <span>Articles</span>
                </a>
            </li>
            <li class="{{(Request::segment(1) === 'projects') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('projects')}}">
                    <i class="fas fa-project-diagram"></i>
                    <span>Projects</span>
                </a>
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
