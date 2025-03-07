<!-- Call to Action Widget -->
<section class="donate-area bg-overlay" style="background-image: url({{ asset($background_image ?? 'assets/images/bg/donate.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="donate-text text-center">
                    <h2>{{ $title ?? 'Join Our Movement' }}</h2>
                    <p>{{ $description ?? 'Together we can make a difference. Join NPPK today and be part of the change.' }}</p>
                    @if(isset($primary_button))
                    <a class="button lg-btn" href="{{ $primary_button['link'] ?? '#' }}">{{ $primary_button['text'] ?? 'Donate Now' }}</a>
                    @endif
                    @if(isset($secondary_button))
                    <a class="button lg-btn btn-transparent" href="{{ $secondary_button['link'] ?? '#' }}">{{ $secondary_button['text'] ?? 'Learn More' }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
