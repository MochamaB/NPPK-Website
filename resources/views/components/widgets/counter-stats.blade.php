<section class="counter_area ptb-70" style = "background-color: #f6f6f6;">
                <div class="container">
                @if(isset($title) || isset($description))
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title mb-35">
                    @if(isset($title))
                        <h1>{{ $title }}</h1>
                    @endif
                    <div class="what-icon">
                                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    </div>
                    @if(isset($description))
                        <p>{{ $description }}</p>
                    @endif
                </div>
            </div>
        </div>
        @endif
                    <div class="row">
                    @foreach($stats as $stat)
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="counter-all">
                               <div class="counter-top">
                                   <a href="#"><img src="{{ asset($stat['icon']) }}" alt=""></a>
                               </div>
                                <div class="counter-bottom">
                                    <div class="counter-next">
                                        <h2>{{ $stat['label'] }}</h2>
                                    </div>
                                    <div class="counter cnt-one res">
                                        <h1>{{ $stat['count'] }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </section>
