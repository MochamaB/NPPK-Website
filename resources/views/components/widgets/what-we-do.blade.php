<!-- What We Do Widget -->
<div class="service-area ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title mb-35">
                    <h2>{{ $title }}</h2>
                    @if(isset($description))
                    <p>{{ $description }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($items as $item)
            <div class="col-md-4 col-sm-6">
                <div class="single-service text-center">
                    <div class="service-icon">
                        <i class="{{ $item['icon'] }}"></i>
                    </div>
                    <div class="service-text">
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['description'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
