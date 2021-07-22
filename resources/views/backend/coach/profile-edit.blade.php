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
                <h3 class="card-title">Edit Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route ('profile.update', $users->id_coach)}}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                {!! isset($users) ? method_field('PUT') : '' !!} 
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
                  <input type="hidden" name="id_coach" value="{{$users->id_coach}}">
                  <input type="hidden" name="id" value="{{$users->id}}">
                  <div class="row">
                    <div class="col-12">
                      <label for="exampleInputGame1">Pilih Game</label>
                      <input type="hidden" name="id_game" id="" value="{{$users->id_game}}">
                      <input type="text" name="nama_game" id="" value="{{$users->nama_game}}" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-5">
                        <label for="exampleInputEmail">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ isset($users) ? $users->email : ''}}" required>
                      </div>
                      <div class="col-7">
                        <label for="exampleInputNama">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" value="{{ isset($users) ? $users->name : ''}}" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5">
                      <label for="exampleInputJk">Jenis Kelamin</label>
                      <select name="jenis_kelamin" class="form-control" required>
                        <option value="1" {{ $users->jenis_kelamin == 1 ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="2" {{ $users->jenis_kelamin == 2 ? 'selected' : '' }}>Perempuan</option>
                      </select>
                    </div>
                    <div class="col-3">
                      <label for="exampleInputUsia">Usia</label>
                      <input type="number" name="usia" class="form-control" value="{{ isset($users) ? $users->usia : ''}}" required>
                    </div>
                    <div class="col-4">
                      <label for="exampleInputNoHP">No HP</label>
                      <input type="number" name="nohp" class="form-control" value="{{ isset($users) ? $users->nohp : ''}}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputAlamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="5" class="form-control">{{ isset($users) ? $users->alamat : ''}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <input type="hidden" id="foto" name="foto" value="{{ isset($users) ? $users->foto : ''}}">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewFile(this)">
                        <label class="custom-file-label" for="exampleInputFile">{{ isset($users) ? $users->foto : ''}}</label>
                      </div>
                    </div>
                    <img src="{{ asset('images/'.$users->foto)}}" id="previewImg" alt="foto" style="max-width: 150px; margin-top: 20px; max-height:200px">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Winrate</label>
                    <div class="input-group">
                      <input type="hidden" id="foto" name="winrate" value="{{ isset($users) ? $users->winrate : ''}}">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="winrate" name="winrate" onchange="previewFile2(this)">
                        <label class="custom-file-label" for="exampleInputFile">{{ isset($users) ? $users->winrate : ''}}</label>
                      </div>
                    </div>
                    <img src="{{ asset('images/'.$users->winrate)}}" id="previewImg2" alt="foto" style="max-width: 150px; margin-top: 20px; max-height:200px">
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
<script>
  function previewFile2(input) {
    var File = $("input[type=file]").get(0).files[0];
      if (file) {
        var reader = new FileReader();
        reader.onload = function(){
          $('#previewImg2').attr("src", reader.result);
        }
        reader.readAsDataURL(File);
      }
  } 
</script>
@endpush