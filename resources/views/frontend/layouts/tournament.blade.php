<!-- Tournaments section -->
<section class="tournaments-section spad">
    <div class="container">
        <div class="tournament-title">Tournaments</div>
        <div class="row">
        @foreach ($event as $item)
            <div class="col-md-6">
                <div class="tournament-item mb-4 mb-lg-0">
                    <div class="ti-notic">{{$item->nama_game}}</div>
                    <div class="ti-content">
                        <div class="ti-thumb set-bg" data-setbg="{{ asset('images/'.$item->gambar)}}"></div>
                        <div class="ti-text">
                            <h4>{{$item->nama_event}}</h4>
                            <ul>
                                <li><span>Tournament Register:</span> {{$item->tgl_mulai_pendaftaran}}</li>
                                <li><span>Tournament Begins:</span> {{$item->tanggal_mulai}}</li>
                                <li><span>Participants:</span> {{$item->slot}} slot</li>
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