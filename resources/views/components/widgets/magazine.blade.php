<!-- Magazine Widget -->
<section class="magazine ptb-80" style = "background-color: #fff;"   >
    <div class="container">
        <div class="row">
            <!-- Latest Campaign News -->
            <div class="col-lg-4 col-md-12">
                <div class="latest-news">
                    <h3>Latest Campaign News</h3>
                    @foreach($data['campaign_news'] ?? [] as $news)
                    <div class="latest-news-all">
                        <div class="latest-news-left">
                            <img src="{{ asset($news['image']) }}" alt="{{ $news['title'] }}">
                        </div>
                        <div class="latest-news-right">
                            <p>{{ $news['title'] }}</p>
                            <div class="news">
                                <span class="news-left">{{ $news['author'] }}</span>
                                <span class="news-right">{{ $news['date'] }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <a href="{{ $data['campaign_news_link'] ?? '#' }}">View All</a>
                </div>
            </div>

            <!-- NPPK Magazine -->
            <div class="col-lg-4 col-md-12">
                <div class="latest-news magazin-mrg">
                    <h3>NPPK Magazine</h3>
                    @foreach($data['magazine_articles'] ?? [] as $article)
                    <div class="latest-news-all">
                        <div class="latest-news-left">
                            <img src="{{ asset($article['image']) }}" alt="{{ $article['title'] }}">
                        </div>
                        <div class="latest-news-right">
                            <p>{{ $article['title'] }}</p>
                            <div class="news">
                                <span class="news-left">{{ $article['author'] }}</span>
                                <span class="news-right">{{ $article['date'] }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <a href="{{ $data['magazine_link'] ?? '#' }}">View All</a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-4 col-md-12">
                <div class="latest-news">
                    <h3>Contact Us</h3>
                    <form id="contact-form" class="contact-form" action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control2" name="name" required placeholder="Name" type="text">
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control2" name="email" required placeholder="Email*" type="email">
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control2" name="telephone" required placeholder="Tel" type="text">
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control2" name="subject" required placeholder="Subject" type="text">
                            </div>
                            <div class="col-lg-12">
                                <div class="home-2-text-area">
                                    <textarea class="form-control2" name="message" required placeholder="Leave me a message"></textarea>
                                    <button class="submit" type="submit">
                                        send
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.magazine {
    background-color: #f6f6f6;
}
.latest-news h3 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 30px;
    text-transform: uppercase;
}
.latest-news-all {
    display: flex;
    margin-bottom: 20px;
}
.latest-news-left {
    flex: 0 0 80px;
    margin-right: 15px;
}
.latest-news-left img {
    width: 100%;
    height: auto;
    border-radius: 5px;
}
.latest-news-right p {
    margin: 0 0 5px;
    font-size: 14px;
    font-weight: 500;
}
.news {
    font-size: 12px;
    color: #666;
}
.news-left {
    margin-right: 15px;
}
.latest-news a {
    display: inline-block;
    margin-top: 20px;
    color: #007bff;
    text-decoration: none;
}
.latest-news a:hover {
    text-decoration: underline;
}
.form-control2 {
    width: 100%;
    padding: 8px 12px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
}
textarea.form-control2 {
    height: 120px;
    resize: none;
}
.submit {
    background: #007bff;
    color: #fff;
    border: none;
    padding: 10px 25px;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.3s;
}
.submit:hover {
    background: #0056b3;
}
.magazin-mrg {
    margin: 0;
}
@media (max-width: 991px) {
    .latest-news {
        margin-bottom: 40px;
    }
}
</style>
