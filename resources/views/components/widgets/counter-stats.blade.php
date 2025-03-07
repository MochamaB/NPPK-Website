<!-- Counter Stats Widget -->
<section class="counter_area ptb-70">
    <div class="container">
        <div class="row">
            @foreach($stats ?? [] as $stat)
            <div class="col-lg-4 col-md-4 col-12">
                <div class="counter-all">
                    <div class="counter-icon">
                        <i class="fa {{ $stat['icon'] ?? 'fa-users' }}"></i>
                    </div>
                    <div class="counter-text">
                        <h2 class="counter">{{ $stat['count'] ?? '0' }}</h2>
                        <span>{{ $stat['label'] ?? '' }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
