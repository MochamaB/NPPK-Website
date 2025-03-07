<!-- Hero Slider Widget -->
<div class="slider-area">
    <div class="slider-active">
        <div class="single-slider" style="background-image: url({{ asset('assets/images/slider/slider-1.jpg') }})">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="slider-text">
                            <h2>{{ $title ?? 'Welcome to NPPK' }}</h2>
                            <p>{{ $description ?? 'Building a Better Future Together' }}</p>
                            @if(isset($button_text))
                            <a class="button lg-btn" href="{{ $button_link ?? '#' }}">{{ $button_text }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
