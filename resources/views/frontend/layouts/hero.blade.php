<!-- Hero section -->
<section class="hero-section">
    <div class="hero-slider owl-carousel">
        @foreach ($games as $item)
        <div class="hs-item set-bg" data-setbg="{{asset('frontend/img/slide.png')}}">
            <div class="hs-text">
                <div class="container">
                    <h2>{{$item->nama_game}}</h2>
                    <p>{{$item->keterangan}}</p>
                    @if (Auth::user())
                    <a href="{{ route('logout') }}" class="site-btn"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @else
                    <a href="{{ route('login')}}" class="site-btn">Login / Register</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- Hero section end -->

<!-- Latest news section -->
<div class="latest-news-section">
    <div class="ln-title">News Tournament</div>
    <div class="news-ticker">
        <div class="news-ticker-contant">
            @foreach ($event as $tour)
                <div class="nt-item"><span class="racing">{{$tour->nama_game}}</span>{{$tour->nama_event}}</div>
            @endforeach
        </div>
    </div>
</div>
<!-- Latest news section end -->