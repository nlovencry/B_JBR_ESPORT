@include('frontend/layouts/head')
@include('frontend/layouts/header')
    <!-- Page section -->
	<section class="page-section community-page set-bg" data-setbg="img/community-bg.jpg">
		<div class="community-warp spad">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="community-top-title">Jadwal Latihan</h3>
					</div>
				</div>
				<ul class="community-post-list">
                    @foreach ($datajadwal as $jadwal)
					<li>
						<div class="community-post">
							<div class="author-avator set-bg" data-setbg="{{asset('images/'.$jadwal->foto)}}"></div>
							<div class="post-content">
								<h5>{{$jadwal->name}}<span>posted an schedule</span></h5>
								<div class="post-date">{{date("d-m-Y", strtotime($jadwal->waktu_mulai));}}</div>
								<p>{{$jadwal->nama_jadwal}}</p>
                                <p>Waktu Presensi : {{date("H:i", strtotime($jadwal->waktu_mulai));}} - {{date("H:i", strtotime($jadwal->waktu_akhir));}}</p>
                                <p>{{$jadwal->keterangan}}</p>
							</div>
						</div>
                    </li>
                    @endforeach
				</ul>
			</div>
		</div>
	</section>
	<!-- Page section end -->
@include('frontend/layouts/latest')
@include('frontend/layouts/footer')