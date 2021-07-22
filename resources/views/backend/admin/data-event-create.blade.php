@extends('backend/admin/layouts/template')
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
                <h3 class="card-title">Tambah Data Tournament</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('dataevent.store')}}" enctype="multipart/form-data">
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
                  <div class="row">
                    <label for="exampleInputGame1">Pilih Game</label>
                    <select name="id_game" class="form-control" required>
                      @foreach ($datagame as $game)
                        <option value="{{$game->id_game}}">{{$game->nama_game}}</option>
                      @endforeach 
                    </select>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label for="exampleInputNama">Nama Tournament</label>
                      <input type="text" name="nama_event" class="form-control" placeholder="Nama Tournament" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label for="exampleInputTanggal">Tanggal Mulai Pendaftaran</label>
                      <input type="date" name="tgl_mulai_pendaftaran" class="form-control" placeholder="Pilih Tanggal" required>
                    </div>
                    <div class="col-6">
                      <label for="exampleInputTanggal">Tanggal Akhir Pendaftaran</label>
                      <input type="date" name="tgl_akhir_pendaftaran" class="form-control" placeholder="Pilih Tanggal" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label for="exampleInputTanggal">Tanggal Mulai</label>
                      <input type="date" name="tanggal_mulai" class="form-control" placeholder="Pilih Tanggal" required>
                    </div>
                    <div class="col-6">
                        <label for="exampleInputTanggal">Tanggal Akhir</label>
                        <input type="date" name="tanggal_akhir" class="form-control" placeholder="Pilih Tanggal" required>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label for="exampleInputPrice">Slot/Participant</label>
                      <input type="number" name="slot" class="form-control" placeholder="Slot" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label for="exampleInputPrice">Hadiah</label>
                      <input type="number" name="price" class="form-control" placeholder="Total Hadiah" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label for="exampleInputKet">Keterangan</label>
                      <textarea name="keterangan" id="keterangan" rows="5" class="form-control" placeholder="Keterangan Tournament"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Poster</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="gambar" onchange="previewFile(this)">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ url('dataevent')}}" class="btn btn-secondary">Cancel</a>
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
@endpush