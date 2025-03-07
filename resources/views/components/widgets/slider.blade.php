<!-- Hero Slider Widget -->
<section class="slider-main-area">
    <div class="main-slider an-si">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider-2" class="slides">
                @foreach($slides as $index => $slide)
                    <img src="{{ asset($slide['background_image']) }}" alt="{{ $slide['title'] }}" title="#slider-direction-{{ $index + 1 }}" />
                @endforeach
            </div>
            
            @foreach($slides as $index => $slide)
                <div id="slider-direction-{{ $index + 1 }}" class="t-cn slider-direction Builder">
                    <div class="container">
                        <div class="slide-all {{ $index > 0 ? 'slide'.($index+1) : '' }}">
                            <!-- layer 1 -->
                            <div class="layer-1">
                                <h3 class="title5 {{ $index > 0 ? 'moment' : '' }}">{{ $slide['title'] }}</h3>
                            </div>
                            <!-- layer 2 -->
                            <div class="layer-2">
                                <h1 class="title6">{{ $slide['description'] }}</h1>
                            </div>
                            <!-- layer 3 -->
                            @if(isset($slide['button_text']) && isset($slide['button_link']))
                            <div class="layer-3">
                                <a class="min1" href="{{ $slide['button_link'] }}">{{ $slide['button_text'] }}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>