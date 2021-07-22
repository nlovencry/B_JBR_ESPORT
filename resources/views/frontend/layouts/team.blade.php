<!-- Recent game section  -->
<section class="recent-game-section spad set-bg" data-setbg="{{asset('frontend/img/recent-game-bg.png')}}">
    <div class="container">
        <div class="section-title">
            <h2>Recent Team</h2>
        </div>
        <div class="row">
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
                    </div>
                </div>	
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Recent game section end -->