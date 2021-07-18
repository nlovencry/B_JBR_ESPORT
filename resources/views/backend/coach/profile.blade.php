@extends('backend/coach/layouts/template')
@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('images/'.$users->foto)}}"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{$users->name}}</h3>
                <p class="text-muted text-center">Coach</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Game</b> <a class="text-muted float-right">{{$users->nama_game}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Team</b> <a class="text-muted float-right">{{$users->total_team}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b><a class="text-muted float-right">{{$users->email}}</a>
                  </li>
                </ul>
                <a href="{{ route('profile.show',$users->id)}}" class="btn btn-primary btn-block"><i class="fas fa-lock"></i><b> Ganti Password</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">About Me</h3>
                  <h5 class="card-title float-right"><a href="{{ route('profile.edit',$users->id)}}"><i class="fas fa-user-edit"></i><b> Edit</b></a></h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <strong><i class="fas fa-user"></i> Nama Lengkap</strong>
                  <p class="text-muted">
                    {{$users->name}}
                  </p>
                  <hr>
                  <strong><i class="fas fa-venus-mars"></i> Jenis Kelamin</strong>
                  <p class="text-muted">
                      @if ($users->jenis_kelamin == 1)
                        Laki-laki
                      @else
                        Perempuan
                      @endif
                  </p>
                  <hr>
                  <strong><i class="fas fa-birthday-cake"></i> Usia</strong>
                  <p class="text-muted">{{$users->usia}} Tahun</p>
                  <hr>
                  <strong><i class="fas fa-phone"></i> Nomor HP</strong>
                  <p class="text-muted">{{$users->nohp}}</p>
                  <hr>
                  <strong><i class="fas fa-map-marker-alt"></i> Alamat</strong>
                  <p class="text-muted">{{$users->alamat}}</p>
                  <hr>
                  <strong><i class="fas fa-star-half-alt"></i> Winrate</strong>
                  <p class="text-muted"><img src="{{ asset('images/'.$users->winrate)}}" id="previewImg" alt="foto" style="max-width: 300px; max-height:250px"></p>
                </div>
                <!-- /.card-body -->
              </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection