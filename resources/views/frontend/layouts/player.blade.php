<!-- Review section -->
<section class="review-section spad set-bg" data-setbg="{{asset('frontend/img/review-bg.png')}}">
    <div class="container">
        <div class="section-title">
            <div class="cata new">new</div>
            <h2>Recent Player</h2>
        </div>
        <div class="row">
            @foreach ($player as $item)
            <div class="col-lg-3 col-md-6">
                <div class="review-item">
                    <div class="ti-content">
                        <div class="review-cover set-bg" data-setbg="{{ asset('images/'.$item->foto)}}">
                    </div>
                        <div class="review-text">
                            <h5>{{$item->name}}</h5>
                        </div>
                            <center>
                                <p>{{$item->nama_game}}</p>
                            </center>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Review section end -->