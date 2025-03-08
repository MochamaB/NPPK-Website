<!-- Team Showcase Widget -->
<div class="team-area ptb-70">
    <div class="container">
        @if(isset($title) || isset($description))
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title mb-50">
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

        <div class="row">
            @foreach($members as $member)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                        <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}" class="img-fluid">
                        <div class="team-social">
                            @if(isset($member['social_links']))
                                @foreach($member['social_links'] as $platform => $url)
                                    <a href="{{ $url }}" target="_blank">
                                        <i class="fa fa-{{ $platform }}"></i>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4>{{ $member['name'] }}</h4>
                        <span>{{ $member['position'] }}</span>
                        @if(isset($member['description']))
                            <p class="mt-2">{{ $member['description'] }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.team-area {
    background: #f9f9f9;
}
.single-team {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}
.single-team:hover {
    transform: translateY(-5px);
}
.team-img {
    position: relative;
    overflow: hidden;
}
.team-img img {
    width: 100%;
    height: auto;
    transition: all 0.3s ease;
}
.team-social {
    position: absolute;
    bottom: -50px;
    left: 0;
    right: 0;
    background: rgba(0,0,0,0.7);
    padding: 15px 0;
    transition: all 0.3s ease;
    text-align: center;
}
.single-team:hover .team-social {
    bottom: 0;
}
.team-social a {
    color: #fff;
    margin: 0 10px;
    font-size: 16px;
    transition: all 0.3s ease;
}
.team-social a:hover {
    color: #007bff;
}
.team-content {
    padding: 20px;
}
.team-content h4 {
    margin: 0;
    color: #333;
    font-size: 20px;
    font-weight: 600;
}
.team-content span {
    display: block;
    color: #007bff;
    margin-top: 5px;
    font-size: 14px;
}
.team-content p {
    color: #666;
    font-size: 14px;
    line-height: 1.6;
    margin: 10px 0 0;
}
</style>
