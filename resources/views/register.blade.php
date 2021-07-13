<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body style="background-color: goldenrod">
    <div class="container">
        <div class="col-md-12 mt-3 mb-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Form Register</h3>
                </div>
                <form method="POST" action="{{route('register')}}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="card-body">
                    @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                        <label for="exampleInputGame1">Pilih Game</label>
                        <select name="id_game" class="form-control" required>
                          @foreach ($datagame as $game)
                            <option value="{{$game->id_game}}">{{$game->nama_game}}</option>
                          @endforeach 
                        </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                          <label for="exampleInputEmail">Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-7">
                          <label for="exampleInputNama">Nama Lengkap</label>
                          <input type="text" name="nama_player" class="form-control" placeholder="Nama Lengkap">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                          <label for="exampleInputJk">Jenis Kelamin</label>
                          <select name="jenis_kelamin" class="form-control">
                              <option value="1">Laki-laki</option>
                              <option value="2">Perempuan</option>
                          </select>
                        </div>
                        <div class="col-3">
                          <label for="exampleInputUsia">Usia</label>
                          <input type="number" name="usia" class="form-control" placeholder="Usia">
                        </div>
                        <div class="col-4">
                          <label for="exampleInputNoHP">No HP</label>
                          <input type="number" name="nohp_player" class="form-control" placeholder="No HP">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAlamat">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="5" class="form-control" placeholder="Masukkan Alamat Lengkap"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-4">
                          <label for="exampleInputIzin">Izin Orang Tua</label>
                          <select name="izin_ortu" class="form-control">
                              <option value="1">Ya</option>
                              <option value="0">Tidak</option>
                          </select>
                        </div>
                        <div class="col-4">
                          <label for="exampleInputOffline">Bersedia Offline</label>
                          <select name="bersedia_offline" class="form-control">
                              <option value="1">Ya</option>
                              <option value="0">Tidak</option>
                          </select>
                        </div>
                        <div class="col-4">
                          <label for="exampleInputNoHP">No HP OrangTua</label>
                          <input type="number" name="nohp_ortu" class="form-control" placeholder="No HP Ortu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Foto</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewFile(this)">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Winrate</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="winrate" name="winrate" onchange="previewFile(this)">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                          <label for="exampleInputEmail">Password</label>
                          <input type="text" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="col-6">
                          <label for="exampleInputKonf">Konfirmasi Password</label>
                          <input type="text" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                    <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Login</a> sekarang!</p>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
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