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
                <!-- Dashboard (always visible) -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                
                <!-- Menu Categories from Config -->
                @foreach(config('admin_menu.categories') as $category)
                    <li class="menu-title"><span data-key="t-menu">{{ $category['title'] }}</span></li>
                    
                    @foreach($category['items'] as $item)
                        <li class="nav-item">
                            @if(isset($item['children']))
                                <!-- Dropdown Menu Item -->
                                <a class="nav-link menu-link {{ request()->routeIs($item['children'][0]['route'] ?? '') ? 'active' : '' }}" 
                                   href="#{{ $item['id'] }}" data-bs-toggle="collapse" 
                                   role="button" 
                                   aria-expanded="{{ request()->routeIs($item['children'][0]['route'] ?? '') ? 'true' : 'false' }}" 
                                   aria-controls="{{ $item['id'] }}">
                                    <i class="{{ $item['icon'] }}"></i> <span data-key="t-{{ strtolower($item['title']) }}">{{ $item['title'] }}</span>
                                </a>
                                <div class="collapse menu-dropdown {{ request()->routeIs($item['children'][0]['route'] ?? '') ? 'show' : '' }}" id="{{ $item['id'] }}">
                                    <ul class="nav nav-sm flex-column">
                                        @foreach($item['children'] as $child)
                                            <li class="nav-item">
                                                <a href="{{ $child['route'] ? route($child['route']) : '#' }}" 
                                                   class="nav-link {{ request()->routeIs($child['route'] ?? '') ? 'active' : '' }}" 
                                                   data-key="t-{{ strtolower(str_replace(' ', '-', $child['title'])) }}">
                                                    {{ $child['title'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                <!-- Single Menu Item -->
                                <a class="nav-link menu-link {{ request()->routeIs($item['route'] ?? '') ? 'active' : '' }}" 
                                   href="{{ $item['route'] ? route($item['route']) : '#' }}">
                                    <i class="{{ $item['icon'] }}"></i> <span data-key="t-{{ strtolower($item['title']) }}">{{ $item['title'] }}</span>
                                </a>
                            @endif
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
