<!-- News Section Widget -->
<section class="blog-area pb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>{{ $title ?? 'Latest News' }}</h2>
                    @if(isset($description))
                        <p>{{ $description }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($news_items ?? [] as $item)
            <div class="col-md-4 col-sm-6">
                <div class="single-blog">
                    <div class="blog-image">
                        <a href="{{ $item['link'] ?? '#' }}">
                            <img src="{{ asset($item['image'] ?? 'assets/images/blog/1.jpg') }}" alt="{{ $item['title'] ?? 'News Image' }}">
                        </a>
                        @if(isset($item['date']))
                        <div class="blog-date">
                            <span>{{ date('d', strtotime($item['date'])) }}</span>
                            {{ date('M', strtotime($item['date'])) }}
                        </div>
                        @endif
                    </div>
                    <div class="blog-text">
                        <h3><a href="{{ $item['link'] ?? '#' }}">{{ $item['title'] ?? '' }}</a></h3>
                        <p>{{ $item['excerpt'] ?? '' }}</p>
                        <a class="button" href="{{ $item['link'] ?? '#' }}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
