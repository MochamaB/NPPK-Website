<!-- Events Timeline Widget -->
<section class="event-area ptb-80">
    <div class="container">
        @if(isset($title) || isset($description))
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title mb-35">
                    @if(isset($title))
                        <h2>{{ $title }}</h2>
                    @endif
                    @if(isset($description))
                        <p>{{ $description }}</p>
                    @endif
                </div>
            </div>
        </div>
        @endif

        @foreach($events ?? [] as $index => $event)
        <div class="row">
            <div class="two-hover {{ $index % 2 == 0 ? 'fst' : 'res-1' }} col-lg-6 mb-30">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="event-img">
                            <img src="{{ asset($event['image'] ?? 'assets/images/events/default.jpg') }}" alt="{{ $event['title'] ?? 'Event Image' }}">
                            @if(isset($event['date']))
                            <div class="event-time">
                                <span>{{ date('d', strtotime($event['date'])) }}</span>
                                {{ date('M', strtotime($event['date'])) }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="event-text">
                            <h3><a href="{{ $event['link'] ?? '#' }}">{{ $event['title'] ?? '' }}</a></h3>
                            @if(isset($event['time']))
                            <div class="event-meta">
                                <span><i class="fa fa-clock-o"></i>{{ $event['time'] }}</span>
                            </div>
                            @endif
                            @if(isset($event['location']))
                            <div class="event-meta">
                                <span><i class="fa fa-map-marker"></i>{{ $event['location'] }}</span>
                            </div>
                            @endif
                            <p>{{ $event['description'] ?? '' }}</p>
                            @if(isset($event['link']))
                            <a class="button" href="{{ $event['link'] }}">Read More</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
