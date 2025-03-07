<!-- What We Do Widget -->
<section class="what-area section-margin ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>{{ $title ?? 'What We Do' }}</h2>
                    @if(isset($description))
                        <p>{{ $description }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($items ?? [] as $item)
            <div class="col-md-4 col-sm-6">
                <div class="single-what text-center">
                    <div class="what-icon">
                        <i class="fa {{ $item['icon'] ?? 'fa-star' }}"></i>
                    </div>
                    <div class="what-text">
                        <h3>{{ $item['title'] ?? '' }}</h3>
                        <p>{{ $item['description'] ?? '' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
