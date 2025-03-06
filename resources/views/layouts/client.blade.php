<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from htmldemo.net/miata/miata/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Mar 2025 19:29:42 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> NPPK || Home Version One</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- favicon
		============================================ -->		
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
	   
		<!-- Styles -->
        @include('layouts.client.styles')
		<!-- modernizr JS
		============================================ -->		
        <script src="{{ asset('assets/js/vendor/modernizr-3.11.7.min.js') }}"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Add your site or application content here -->
        <div class="wrapper">
            <!-- Header -->
            @include('layouts.client.header')
            <!-- mobile-menu-area end -->
            <div class="header-space"></div> 

           <!-- Main Content -->
    @yield('content')
           <!-- Footer -->
    @include('layouts.client.footer')
            <!-- start scrollUp
            ============================================ -->
            <div id="toTop">
                <i class="fa fa-chevron-up"></i>
            </div>
           
        </div>
        
        @include('layouts.client.scripts')
    </body>

<!-- Mirrored from htmldemo.net/miata/miata/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Mar 2025 19:30:17 GMT -->
</html>
