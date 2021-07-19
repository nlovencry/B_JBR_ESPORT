<!-- Hero section -->
<section class="hero-section">
    <div class="hero-slider owl-carousel">
        @foreach ($games as $item)
        <div class="hs-item set-bg" data-setbg="{{asset('frontend/img/slide.png')}}">
            <div class="hs-text">
                <div class="container">
                    <h2>{{$item->nama_game}}</h2>
                    <p>{{$item->keterangan}}</p>
                    <a href="#" class="site-btn">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
        <!-- <div class="hs-item set-bg" data-setbg="{{asset('frontend/img/slider-2.jpg')}}">
            <div class="hs-text">
                <div class="container">
                    <h2>The Best <span>Games</span> Out There</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada <br> lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. <br>Suspendisse cursus faucibus finibus.</p>
                    <a href="#" class="site-btn">Read More</a>
                </div>
            </div>
        </div>  -->
    </div>
</section>
<!-- Hero section end -->

<!-- Latest news section -->
<div class="latest-news-section">
    <div class="ln-title">News Event</div>
    <div class="news-ticker">
        <div class="news-ticker-contant">
            @foreach ($eventfoot as $tour)
                <div class="nt-item"><span class="new">NEW</span>{{$tour->nama_event}}</div>
            @endforeach
        </div>
    </div>
</div>
<!-- Latest news section end -->