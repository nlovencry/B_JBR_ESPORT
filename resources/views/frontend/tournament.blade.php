@include('frontend/layouts/head')
@include('frontend/layouts/header')
    <!-- Review section -->
	<section class="review-section review-dark spad set-bg" data-setbg="{{asset('frontend/img/review-bg-2.jpg')}}">
		<div class="container">
			<div class="section-title text-white">
				<h2>Recent Tournament</h2>
			</div>
			<div class="row text-white">
				@foreach ($tour as $item)
                <div class="col-lg-3 col-md-6" style="padding-bottom: 30px;">
					<div class="review-item">
						<div class="review-cover set-bg" data-setbg="{{ asset('images/'.$item->gambar)}}">
							<div class="cata new">{{$item->nama_game}}</div>
						</div>
						<div class="review-text">
							<h5><a href="{{route('tournament.show',$item->id_event)}}">{{$item->nama_event}}</a></h5>
                            <p>{{$item->tanggal_mulai}}</p>
                            <p>{{$item->slot}} Slot</p>
						</div>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</section>
	<!-- Review section end -->
@include('frontend/layouts/latest')
@include('frontend/layouts/footer')