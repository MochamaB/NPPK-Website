<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'NPPK Admin') }}</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" type="text/css" />
    
    <!-- Toastify CSS -->
    <link href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" rel="stylesheet" type="text/css" />
    
    <!-- Flatpickr CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet" type="text/css" />
    
    <!-- Additional CSS -->
    @stack('styles')
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        
        @include('layouts.admin.topbar')
        
        @include('layouts.admin.sidebar')
        
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @if(isset($breadcrumb))
                        {{ $breadcrumb }}
                    @else
                        @php
                            $breadcrumbData = App\Services\BreadcrumbService::generate();
                        @endphp
                        @include('layouts.admin.breadcrumb', [
                            'title' => $title ?? $breadcrumbData['title'],
                            'items' => $breadcrumbItems ?? $breadcrumbData['items']
                        ])
                    @endif
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            
            @include('layouts.admin.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
     
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    
    <!-- Properly include libraries that were previously loaded with document.write -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/dist/toastify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js@10.0.2/public/assets/scripts/choices.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>
    
    <!-- Modified plugins.js will be loaded after these libraries -->
    <script src="{{ asset('admin/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
    
    <!-- Sidebar dropdown functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add active class to parent when child is active
            var currentUrl = window.location.href;
            var menuLinks = document.querySelectorAll('.menu-dropdown .nav-link');
            
            menuLinks.forEach(function(link) {
                if (link.getAttribute('href') !== '#' && currentUrl.includes(link.getAttribute('href'))) {
                    // Add active class to the link
                    link.classList.add('active');
                    
                    // Find parent dropdown and expand it
                    var parentDropdown = link.closest('.menu-dropdown');
                    if (parentDropdown) {
                        parentDropdown.classList.add('show');
                        var parentToggle = document.querySelector('[data-bs-toggle="collapse"][href="#' + parentDropdown.id + '"]');
                        if (parentToggle) {
                            parentToggle.setAttribute('aria-expanded', 'true');
                        }
                    }
                }
            });
        });
    </script>
    
    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>
