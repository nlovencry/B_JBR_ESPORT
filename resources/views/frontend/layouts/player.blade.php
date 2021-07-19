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
                            <ul>
                                <p><span>Email Player:</span> {{$item->email}}
                                <p><span>Jenis Kelamin:</span>
                                    @if ($item->jenis_kelamin == 1)
                                    {{ 'Laki-Laki' }}
                                    @else
                                    {{ 'Perempuan' }}
                                    @endif
                                <p><span>Usia:</span> {{$item->usia}}
                                <p><span>No Hp:</span> {{$item->nohp}}
                                <p><span>Alamat:</span> {{$item->alamat}}
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Review section end -->