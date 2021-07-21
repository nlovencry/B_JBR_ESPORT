<!-- Footer top section -->
<section class="footer-top-section">
    <div class="container">
        <div class="footer-top-bg">
            <img src="{{asset('frontend/img/footer-top-bg.png')}}" alt="">
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="footer-logo text-white">
                    <img src="{{asset('frontend/img/footer-pdpkn.png')}}" alt="">
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget">
                    <h4 class="fw-title">Latest Tournament</h4>
                        @foreach ($eventfoot as $item)
                        <div class="latest-blog">
                            <div class="lb-item">
                                <div class="lb-thumb set-bg" data-setbg="{{ asset('images/'.$item->gambar)}}"></div>
                                    <div class="lb-content">
                                        <p>{{$item->tanggal_mulai}}</p>
                                        <p>{{$item->nama_event}}</p>
                                        <p>{{$item->slot}} Slot</p>
                                        <p><div class="lb-date">Prizes: {{$item->price}}</div></p>
                                    </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget">
                    <h4 class="fw-title">News Player</h4>
                    <div class="top-comment">
                        @foreach ($playerfoot as $item)
                        <div class="tc-item">
                            <div class="tc-thumb set-bg" data-setbg="{{ asset('images/'.$item->foto)}}"></div>
                            <div class="tc-content">
                                <p><a href="#">{{$item->name}}</a></p>
                                <p><span>Game:  </span>{{$item->nama_game}}</p>
                                <p><span>Usia:  </span>{{$item->usia}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer top section end -->