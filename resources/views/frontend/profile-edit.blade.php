@include('frontend/layouts/head')
@include('frontend/layouts/header')
    <!-- Page section -->
	<section class="page-section community-page set-bg" data-setbg="{{asset('frontend/img/community-bg2.jpg')}}">
		<div class="community-warp spad">
			<div class="container">
				<div class="row">
                    <form method="POST" action="{{ route ('profil.update', Auth::user()->id)}}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {!! isset($player) ? method_field('PUT') : '' !!}
					<div class="col-md-6">
						<h3 class="community-top-title">Profile</h3>
					</div>
                    <div class="col-md-6 text-lg-right">
						
					</div>
				</div>
				<div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="review-item">
                            <div class="ti-content">
                                <div class="review-cover set-bg" data-setbg="{{asset('images/'.$player->foto)}}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6">
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <input type="hidden" class="form-control" value="{{Auth::user()->id}}" name="id">
                                <input type="hidden" class="form-control" value="{{$player->id_player}}" name="id_player">
                                <label for="name"><b>Game</b></label>
                                <input type="hidden" class="form-control" value="{{$player->id_game}}" name="id_game">
                                <input type="text" class="form-control" value="{{$player->nama_game}}" readonly>
                            </div>
                        </div>
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>Team</b></label>
                                <input type="hidden" class="form-control" value="{{$player->id_team}}" name="id_team">
                                <input type="text" class="form-control" value="{{$player->nama_team}}" readonly>
                            </div>
                        </div>
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>Email</b></label>
                                <input type="email" class="form-control" value="{{ isset($player) ? $player->email : ''}}" name="email">
                            </div>
                        </div>
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>Nama Lengkap</b></label>
                                <input type="text" class="form-control" value="{{ isset($player) ? $player->name : ''}}" name="name">
                            </div>
                        </div> 
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>Jenis Kelamin</b></label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="1" {{ $player->jenis_kelamin == 1 ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="2" {{ $player->jenis_kelamin == 2 ? 'selected' : '' }}>Perempuan</option>
                                  </select>
                            </div>
                        </div>
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>Usia</b></label>
                                <input type="number" class="form-control" value="{{ isset($player) ? $player->usia : ''}}" name="usia">
                            </div>
                        </div> 
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>No WhatsApp</b></label>
                                <input type="number" class="form-control" value="{{ isset($player) ? $player->nohp : ''}}" name="nohp">
                            </div>
                        </div>
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>Alamat Lengkap</b></label>
                                <textarea name="alamat" id="alamat" class="form-control">{{ isset($player) ? $player->alamat : ''}}</textarea>
                            </div>
                        </div>
                        <div class="review-item" style="padding-bottom: 10px;">
                            <div class="ti-content">
                                <label for="name"><b>No HP Orang Tua</b></label>
                                <input type="number" class="form-control" value="{{ isset($player) ? $player->nohp_ortu : ''}}" name="nohp_ortu">
                            </div>
                        </div>
                        <div class="review-item" style="padding-bottom: 20px;">
                            <div class="ti-content">
                                <label for="name"><b>Foto</b></label>
                                <input type="hidden" id="foto" name="foto" value="{{ isset($player) ? $player->foto : ''}}">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewFile(this)">
                                    <label class="custom-file-label" for="exampleInputFile">{{ isset($player) ? $player->foto : ''}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="review-item" style="padding-bottom: 20px;">
                            <div class="ti-content">
                                <label for="name"><b>Winrate</b></label>
                                <input type="hidden" id="foto" name="winrate" value="{{ isset($player) ? $player->winrate : ''}}">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="winrate" name="winrate" onchange="previewFile(this)">
                                    <label class="custom-file-label" for="exampleInputFile">{{ isset($player) ? $player->winrate : ''}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-13 text-lg-right">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </div>
			    </div>
            </div>
		</div>
	</section>
	<!-- Page section end -->
@include('frontend/layouts/latest')
@include('frontend/layouts/footer')
@push('js')
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backend/dist/js/demo.js')}}"></script>
    <!-- Page specific script -->
    <script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>
<script>
  function previewFile(input) {
    var File = $("input[type=file]").get(0).files[0];
      if (file) {
        var reader = new FileReader();
        reader.onload = function(){
          $('#previewImg').attr("src", reader.result);
        }
        reader.readAsDataURL(File);
      }
  } 
</script>
@endpush