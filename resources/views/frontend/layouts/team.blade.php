<!-- Recent game section  -->
<section class="recent-game-section spad set-bg" data-setbg="{{asset('frontend/img/recent-game-bg.png')}}">
    <div class="container">
        <div class="section-title">
            <h2>Recent Team</h2>
        </div>
        <div class="row">
<<<<<<< Updated upstream
            @foreach ($team as $item)
            <div class="col-lg-4 col-md-6" style="margin-bottom: 25px">
                <div class="recent-game-item">
                    <div class="rgi-thumb set-bg" data-setbg="{{asset('frontend/img/team4.jpg')}}">
                        <div class="cata racing">{{$item->nama_game}}</div>
                    </div>
                    <div class="rgi-content">
                        <h5>{{$item->nama_team}}</h5>
                        <ul>
                            <p>Jumlah Anggota : {{$item->total_player}}</p>
                        </ul>
=======
            @foreach ($games as $item)
            <div class="col-lg-4 col-md-6" style="margin-bottom: 25px">
                <div class="recent-game-item">
                    <div class="rgi-thumb set-bg" data-setbg="{{asset('frontend/img/recent-game/1.jpg')}}">
                        <div class="cata new">new</div>
                    </div>
                    <div class="rgi-content">
                        <h5>{{$item->nama_game}}</h5>
                        <p>{{$item->keterangan}}</p>
                        <a href="#" class="comment">Tim</a>
                        <div class="rgi-extra">
                            <div class="rgi-star"><img src="{{asset('frontend/img/icons/star.png')}}" alt=""></div>
                            <div class="rgi-heart"><img src="{{asset('frontend/img/icons/heart.png')}}" alt=""></div>
                        </div>
>>>>>>> Stashed changes
                    </div>
                </div>	
            </div>
            @endforeach
<<<<<<< Updated upstream
=======
            {{-- <div class="col-lg-4 col-md-6">
                <div class="recent-game-item">
                    <div class="rgi-thumb set-bg" data-setbg="{{asset('frontend/img/recent-game/2.jpg')}}">
                        <div class="cata racing">racing</div>
                    </div>
                    <div class="rgi-content">
                        <h5>Susce pulvinar metus nulla, vel  facilisis sem </h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit amet, consectetur elit. </p>
                        <a href="#" class="comment">3 Comments</a>
                        <div class="rgi-extra">
                            <div class="rgi-star"><img src="{{asset('frontend/img/icons/star.png')}}" alt=""></div>
                            <div class="rgi-heart"><img src="{{asset('frontend/img/icons/heart.png')}}" alt=""></div>
                        </div>
                    </div>
                </div>	
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="recent-game-item">
                    <div class="rgi-thumb set-bg" data-setbg="{{asset('frontend/img/recent-game/3.jpg')}}">
                        <div class="cata adventure">Adventure</div>
                    </div>
                    <div class="rgi-content">
                        <h5>Suspendisse ut justo tem por, rutrum</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit amet, consectetur elit. </p>
                        <a href="#" class="comment">3 Comments</a>
                        <div class="rgi-extra">
                            <div class="rgi-star"><img src="{{asset('frontend/img/icons/star.png')}}" alt=""></div>
                            <div class="rgi-heart"><img src="{{asset('frontend/img/icons/heart.png')}}" alt=""></div>
                        </div>
                    </div>
                </div>	
            </div> --}}
>>>>>>> Stashed changes
        </div>
    </div>
</section>
<!-- Recent game section end -->