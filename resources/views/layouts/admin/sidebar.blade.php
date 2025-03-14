<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
            <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>
</ul>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                
                

                <!-- Content Management -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="ri-pages-line"></i> <span data-key="t-pages">Pages</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-all-pages">All Pages</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-add-page">Add Page</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Navigation Management -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMenus" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMenus">
                        <i class="ri-menu-line"></i> <span data-key="t-menus">Menus</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMenus">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.menus.index') }}" class="nav-link" data-key="t-all-menus">All Menus</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.menus.create') }}" class="nav-link" data-key="t-add-menu">Add Menu</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Widgets Management -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarWidgets" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarWidgets">
                        <i class="ri-layout-grid-line"></i> <span data-key="t-widgets">Widgets</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarWidgets">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-all-widgets">All Widgets</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-add-widget">Add Widget</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Users Management -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUsers" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUsers">
                        <i class="ri-user-line"></i> <span data-key="t-users">Users</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarUsers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-all-users">All Users</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-add-user">Add User</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Settings -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#">
                        <i class="ri-settings-3-line"></i> <span data-key="t-settings">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

