@include('frontend/layouts/head')
@include('frontend/layouts/header')
    <!-- Page section -->
	<section class="page-section community-page set-bg" data-setbg="{{asset('frontend/img/community-bg.jpg')}}">
		<div class="community-warp spad">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
                        @foreach ($dataplayer as $p)
                        @endforeach
						<h3 class="community-top-title">Members ({{$p->total_player}})</h3>
					</div>
				</div>
				<ul class="community-post-list">
                    @foreach ($datacoach as $coach)
					<li>
						<div class="community-post">
							<div class="author-avator set-bg" data-setbg="{{asset('images/'.$coach->foto)}}"></div>
							<div class="post-content">
								<h5>{{$coach->name}}</h5>
								<div class="post-date">Coach</div>
								<p>Usia : {{$coach->usia}}</p>
                                <p>Jenis Kelamin : @if ($coach->jenis_kelamin == 1)
                                    Laki-Laki
                                @else
                                    Perempuan
                                @endif</p>
                                <p>Alamat : {{$coach->alamat}}</p>
                                <p>Winrate : </p><img src="{{asset('images/'.$coach->winrate)}}" alt="winrate" style="max-width: 350px; max-height:300px">
							</div>
						</div>
					</li>
                    @endforeach
                    @if ($p->total_player != 0)
                    @foreach ($player as $member)
                        <li>
                            <div class="community-post">
                                <div class="author-avator set-bg" data-setbg="{{asset('images/'.$member->foto)}}"></div>
                                <div class="post-content">
                                    <h5>{{$member->name}}</h5>
                                    <div class="post-date">Member</div>
                                    <p>Usia : {{$member->usia}}</p>
                                    <p>Jenis Kelamin : @if ($member->jenis_kelamin == 1)
                                        Laki-Laki
                                    @else
                                        Perempuan
                                    @endif</p>
                                    <p>Alamat : {{$member->alamat}}</p>
                                    <p>Winrate : </p><img src="{{asset('images/'.$member->winrate)}}" alt="winrate" style="max-width: 350px; max-height:300px">
                                </div>
                            </div>
                        </li>
                    @endforeach
                    @endif
				</ul>
			</div>
		</div>
	</section>
	<!-- Page section end -->
@include('frontend/layouts/latest')
@include('frontend/layouts/footer')