<!-- What We Do Widget -->
<section class="what-area section-margin ptb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="what-top">
                                <div class="section-title">
                                    <h1>{{ $title }}</h1>
                                    <div class="what-icon">
                                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    </div>
                                </div>
                                @if(isset($description))
                    <p>{{ $description }}</p>
                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                    @foreach($items as $item)
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="what-bottom">
                                <div class="btn-icon">
                                    <div class="then-icon">
                                        <a href="#">
                                            <i class="fa fa-crosshairs" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mission-text">
                                    <h3>{{ $item['title'] }}</h3>
                                </div>
                                <p>{{ $item['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                    </div>
            
                </div>
            </section>
