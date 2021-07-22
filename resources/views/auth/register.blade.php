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
                              <input type="text" name="name" class="form-control">
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
                              <input type="number" name="nohp" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAlamat">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="5" class="form-control" value="{{old('alamat')}}"></textarea>
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
                           <div class="col-md-6">
                              <label for="exampleInputKonf">Password</label>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
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
