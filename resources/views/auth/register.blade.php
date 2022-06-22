@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <strong>Whoops!</strong> There were some problems with your input. <br><br>
                      <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
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
                              <input type="email" name="email" class="form-control" value="{{old('email')}}">
                            </div>
                            <div class="col-7">
                              <label for="exampleInputNama">Nama Lengkap</label>
                              <input type="text" name="name" class="form-control" value="{{old('name')}}">
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
                              <input type="number" name="usia" class="form-control" value="{{old('usia')}}">
                            </div>
                            <div class="col-4">
                              <label for="exampleInputNoHP">No HP</label>
                              <input type="number" name="nohp" class="form-control" value="{{old('nohp')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAlamat">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="5" class="form-control">{{old('alamat')}}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-4">
                              <label for="exampleInputIzin">Izin Orang Tua</label>
                              <select name="izin_ortu" class="form-control">
                                  <option value="1">Ya</option>
                                  <option value="2">Tidak</option>
                              </select>
                            </div>
                            <div class="col-4">
                              <label for="exampleInputOffline">Bersedia Offline</label>
                              <select name="bersedia_offline" class="form-control">
                                  <option value="1">Ya</option>
                                  <option value="2">Tidak</option>
                              </select>
                            </div>
                            <div class="col-4">
                              <label for="exampleInputNoHP">No HP OrangTua</label>
                              <input type="number" name="nohp_ortu" class="form-control" value="{{old('nohp_ortu')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG" class="custom-file-input" id="foto" name="foto" onchange="previewFile2(this)">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                            </div>
                            <span id="text-foto"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Winrate</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG" class="custom-file-input" id="winrate" name="winrate" onchange="previewFile(this)">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                            </div>
                            <span id="text-winrate"></span>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <label for="exampleInputKonf">Password</label>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                              <label for="exampleInputKonf">Konfirmasi Password</label>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12"><br>
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Register') }}
                            </button>
                          </div>
                        </div>
                        <center>
                          <div class="row">
                            <div class="col-md-12">
                              <a class="nav-link" href="{{ route('login') }}">Sudah punya akun? {{ __('Login') }} disini</a>
                            </div>
                          </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
  function previewFile2(input) {
    var fu2 = document.getElementById("foto");
    document.getElementById("text-foto").textContent=fu2.value;
  } 
</script>
<script>
  function previewFile(input) {
    var fu1 = document.getElementById("winrate");
    document.getElementById("text-winrate").textContent=fu1.value;
  } 
</script>
@endpush