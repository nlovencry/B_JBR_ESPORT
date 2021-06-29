@extends('backend/coach/layouts/template')
@section('content')
<div class="container-fluid">
  <!-- /.row -->
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Ubah Jadwal Latihan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ isset($datajadwal) ? route ('datajadwal.update', $datajadwal->id_jadwal) : route('datajadwal.store') }}">
          {!! csrf_field() !!}
          {!! isset($datajadwal) ? method_field('PUT') : '' !!} 
          <div class="card-body">
            <input type="hidden" name="id_jadwal" value="{{$datajadwal->id_jadwal}}"><br>
            <div class="form-group">
                <label for="exampleInputTgl">Tanggal</label>
                <input type="date" class="form-control" value="{{ isset($datajadwal) ? $datajadwal->tanggal : ''}}" name="tanggal">
            </div>
            <div class="form-group">
                <label for="exampleInputNama">Nama Jadwal</label>
                <input type="text" class="form-control" value="{{ isset($datajadwal) ? $datajadwal->nama_jadwal : ''}}" name="nama_jadwal">
            </div>
            <div class="form-group">
                <label for="exampleInputWaktu">Waktu</label>
                <input type="time" class="form-control" value="{{ isset($datajadwal) ? $datajadwal->waktu_mulai : ''}}" name="waktu_mulai">
            </div>
            <div class="form-group">
              <label for="exampleInputKet">Keterangan</label>
              <textarea name="keterangan" id="" rows="7" class="form-control" required>{{ isset($datajadwal) ? $datajadwal->keterangan : ''}}</textarea>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div>
@endsection