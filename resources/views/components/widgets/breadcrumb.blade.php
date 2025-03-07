<!-- Breadcrumb Widget -->
<div class="breadcrumb-area bg-overlay" style="background-image: url({{ asset($background_image ?? 'assets/images/bg/breadcrumb.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text text-center">
                    @if(isset($subtitle))
                        <h2 class="page-title">{{ $subtitle }}</h2>
                    @endif
                    <ul class="breadcrumb-list">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        @if(isset($current_page))
                            <li>{{ $current_page }}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
