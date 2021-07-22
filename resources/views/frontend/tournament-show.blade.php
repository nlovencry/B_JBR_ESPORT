@include('frontend/layouts/head')
@include('frontend/layouts/header')
    <!-- Review section -->
	<section class="review-section review-dark spad set-bg" data-setbg="{{asset('frontend/img/review-bg-2.jpg')}}">
		<div class="container">
			@foreach ($tour as $item)
			<div class="community-top-title text-white">
				<h2>{{$item->nama_event}}</h2>
			</div>
			<div class="row text-white">
                <div class="col-lg-5 col-md-6">
					<div class="review-item">
						<div class="review-cover set-bg" data-setbg=""><img src="{{ asset('images/'.$item->gambar)}}" id="previewImg" alt="foto" style="max-width: 400px; max-height:350px"></div>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="review-item">
						<label for="">Game</label>
						<input type="text" class="form-control" value="{{$item->nama_game}}" readonly>
					</div>
					<div class="review-item">
						<label for="">Tanggal Mulai Pendaftaran</label>
						<input type="text" class="form-control" value="{{$item->tgl_mulai_pendaftaran}}" readonly>
					</div>
					<div class="review-item">
						<label for="">Tanggal Akhir Pendaftaran</label>
						<input type="text" class="form-control" value="{{$item->tgl_akhir_pendaftaran}}" readonly>
					</div>
					<div class="review-item">
						<label for="">Tanggal Mulai Tournament</label>
						<input type="text" class="form-control" value="{{$item->tanggal_mulai}}" readonly>
					</div>
					<div class="review-item">
						<label for="">Tanggal Akhir Tournament</label>
						<input type="text" class="form-control" value="{{$item->tanggal_akhir}}" readonly>
					</div>
					<div class="review-item">
						<label for="">Slot</label>
						<input type="text" class="form-control" value="{{$item->slot}}" readonly>
					</div>
					<div class="review-item">
						<label for="">Hadiah</label>
						<input type="text" class="form-control" value="{{$item->price}}" readonly>
					</div>
					<div class="review-item">
						<label for="">Keterangan</label>
						<textarea name="keterangan" id="" cols="30" rows="10" class="form-control" readonly>{{$item->keterangan}}</textarea>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</section>
	<!-- Review section end -->
@include('frontend/layouts/latest')
@include('frontend/layouts/footer')