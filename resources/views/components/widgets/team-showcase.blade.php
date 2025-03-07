<!-- Team/Leadership Showcase Widget -->
<section class="meet-area pt-80 mb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2>{{ $title ?? 'Our Leadership' }}</h2>
                    @if(isset($description))
                        <p>{{ $description }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($members ?? [] as $member)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="meet-all text-center">
                    <div class="meet-img">
                        <img src="{{ asset($member['image'] ?? 'assets/images/team/default.jpg') }}" alt="{{ $member['name'] ?? 'Team Member' }}">
                        @if(isset($member['social_links']))
                        <div class="meet-icon">
                            <ul>
                                @foreach($member['social_links'] as $platform => $link)
                                <li><a href="{{ $link }}"><i class="fa fa-{{ $platform }}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="meet-text">
                        <h3>{{ $member['name'] ?? '' }}</h3>
                        <span>{{ $member['position'] ?? '' }}</span>
                        @if(isset($member['description']))
                        <p>{{ $member['description'] }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
