@extends('backend/coach/layouts/template')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ganti Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('profile.ubah') }}">
                {!! csrf_field() !!}
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
                  <input type="hidden" name="id" value="{{$users->id}}">
                  <div class="row">
                    <div class="col-md-12">
                       <label for="exampleInputKonf">Masukkan Password Baru</label>
                       <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                         @error('password')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                       <label for="exampleInputKonf">Konfirmasi Password</label>
                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                     </div>
                 </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ url('profile')}}" class="btn btn-secondary">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
    </div>
</div>
@endsection