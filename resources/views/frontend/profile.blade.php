@include('frontend/layouts/head')
@include('frontend/layouts/header')
    <!-- Page section -->
	<section class="page-section community-page set-bg" data-setbg="{{asset('frontend/img/community-bg2.jpg')}}">
		<div class="community-warp spad">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="community-top-title">Profile</h3>
					</div>
                    <div class="col-md-6 text-lg-right">
						<a href="{{route('profil.edit',Auth::user()->id)}}" class="btn btn-warning">Edit Profile</a>
					</div>
				</div>
				<div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="review-item">
                            <div class="ti-content">
                                <img src="{{asset('images/'.$player->foto)}}" alt="" style="max-width: 270px; max-height: 600px"><div class="review-cover set-bg" data-setbg=""></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6">
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>Game</b></label>
                                <input type="text" class="form-control" value="{{$player->nama_game}}" readonly>
                            </div>
                        </div>
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>Team</b></label>
                                <input type="text" class="form-control" value="{{$player->nama_team}}" readonly>
                            </div>
                        </div>
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>Email</b></label>
                                <input type="text" class="form-control" value="{{$player->email}}" readonly>
                            </div>
                        </div>
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>Nama Lengkap</b></label>
                                <input type="text" class="form-control" value="{{$player->name}}" readonly>
                            </div>
                        </div> 
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>Jenis Kelamin</b></label>
                                <input type="text" class="form-control" value="@if($player->jenis_kelamin == 1)Laki-Laki @else Perempuan @endif" readonly>
                            </div>
                        </div>
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>Usia</b></label>
                                <input type="text" class="form-control" value="{{$player->usia}}" readonly>
                            </div>
                        </div> 
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>No WhatsApp</b></label>
                                <input type="text" class="form-control" value="{{$player->nohp}}" readonly>
                            </div>
                        </div>
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>Alamat Lengkap</b></label>
                                <textarea name="alamat" id="alamat" class="form-control" readonly>{{$player->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>No HP Orang Tua</b></label>
                                <input type="text" class="form-control" value="{{$player->nohp_ortu}}" readonly>
                            </div>
                        </div>
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>Winrate</b></label>
                                <p><img src="{{asset('images/'.$player->winrate)}}" alt="winrate" style="max-width: 450px; max-height:350px"></p>
                            </div>
                        </div>
                    </div>
			    </div>
            </div>
		</div>
	</section>
	<!-- Page section end -->
@include('frontend/layouts/latest')
@include('frontend/layouts/footer')