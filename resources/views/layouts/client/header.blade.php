<header class="header-area intelligent-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="logo floatleft">
                    <a href="{{ route('home') }}">
                        <img alt="NPPK Logo" src="{{ asset('client/assets/images/logo/logo.png') }}" style="width: 250px; height: auto;">
                    </a>
                </div>
                <div class="header-search floatright">
                    <div class="header-buttons floatright" style="margin-left: 1.5rem;">
                        <a href="#" class="btn btn-lg btn-join">Join NPPK</a>
                        <a href="#" class="btn btn-lg btn-donate">Donate Now</a>
                    </div>
                </div>
                <div class="main-menu floatright">
                    @include('layouts.client.navigation')
                </div>
            </div>
        </div>
    </div>
</header>
<!-- mobile-menu-area start -->
<div class="mobile-menu-area d-block d-lg-none">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu">
                    @include('layouts.client.mobile_navigation')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mobile-menu-area end -->
