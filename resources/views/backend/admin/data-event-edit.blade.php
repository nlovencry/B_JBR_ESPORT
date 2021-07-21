@extends('backend/admin/layouts/template')
@section('content')
<div class="container-fluid">
  <!-- /.row -->
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Ubah Data Tournament</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ isset($dataevent) ? route ('dataevent.update', $dataevent->id_event) : route('dataevent.store') }}" enctype="multipart/form-data">
          {!! csrf_field() !!}
          {!! isset($dataevent) ? method_field('PUT') : '' !!} 
          <div class="card-body">
            <input type="hidden" name="id_event" value="{{$dataevent->id_event}}">
            <div class="row">
              <div class="col md-12">
              <label for="exampleInputGame1">Pilih Game</label>
              <select name="id_game" class="form-control" required>
                @foreach ($datagame as $game)
                  <option value="{{ isset($dataevent) ? $dataevent->id_game : ''}}">{{$game->nama_game}}</option>
                @endforeach
              </select>
              </div>
            </div>
            <div class="form-group">
                <label for="exampleInputGame1">Nama Tournament</label>
                <input type="text" class="form-control" value="{{ isset($dataevent) ? $dataevent->nama_event : ''}}" name="nama_event" required>
            </div>
            <div class="row">
              <div class="col md-6">
                <label for="exampleInputGame1">Tanggal Mulai Pendaftaran</label>
                <input type="date" class="form-control" value="{{ isset($dataevent) ? $dataevent->tgl_mulai_pendaftaran : ''}}" name="tgl_mulai_pendaftaran" required>
              </div>
              <div class="col md-6">
                <label for="exampleInputGame1">Tanggal Akhir Pendaftaran</label>
                <input type="date" class="form-control" value="{{ isset($dataevent) ? $dataevent->tgl_akhir_pendaftaran : ''}}" name="tgl_akhir_pendaftaran" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputGame1">Tanggal Mulai</label>
                <input type="date" class="form-control" value="{{ isset($dataevent) ? $dataevent->tanggal_mulai : ''}}" name="tanggal_mulai" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputGame1">Tanggal Akhir</label>
                <input type="date" class="form-control" value="{{ isset($dataevent) ? $dataevent->tanggal_akhir : ''}}" name="tanggal_akhir" required>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputGame1">Slot/Participant</label>
              <input type="number" class="form-control" value="{{ isset($dataevent) ? $dataevent->slot : ''}}" name="slot" required>
          </div>
            <div class="form-group">
                <label for="exampleInputGame1">Hadiah</label>
                <input type="number" class="form-control" value="{{ isset($dataevent) ? $dataevent->price : ''}}" name="price" required>
            </div>
            <div class="form-group">
              <label for="exampleInputKet">Keterangan</label>
              <textarea name="keterangan" id="" rows="7" class="form-control" required>{{ isset($dataevent) ? $dataevent->keterangan : ''}}</textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Poster</label>
              <div class="input-group">
                <input type="hidden" id="img" name="img" value="{{ isset($dataevent) ? $dataevent->gambar : ''}}">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="previewFile(this)">
                  <label class="custom-file-label" for="exampleInputFile">{{ isset($dataevent) ? $dataevent->gambar : ''}}</label>
                </div>
              </div>
              <img src="{{ asset('images/'.$dataevent->gambar)}}" id="previewImg" alt="foto" style="max-width: 150px; margin-top: 20px; max-height:200px">
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