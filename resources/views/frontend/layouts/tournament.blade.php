<!-- Tournaments section -->
<section class="tournaments-section spad">
    <div class="container">
        <div class="tournament-title">Recent Tournaments</div>
        <div class="row">
        @foreach ($event as $item)
            <div class="col-md-6">
                <div class="tournament-item mb-4 mb-lg-0">
                    <div class="ti-notic">Premium Tournament</div>
                    <div class="ti-content">
                        <div class="ti-thumb set-bg" data-setbg="{{ asset('images/'.$item->gambar)}}"></div>
                        <div class="ti-text">
                            <h4>{{$item->nama_event}}</h4>
                            <ul>
                                <li><span>Tournament Beggins:</span> {{$item->tanggal_pendaftaran}}</li>
                                <li><span>Tounament Ends:</span> July 01, 2018</li>
                                <li><span>Participants:</span> 10 teams</li>
                                <li><span>Tournament Author:</span> Admin</li>
                            </ul>
                            <p><span>Prizes:</span> {{$item->price}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
<!-- Tournaments section bg -->