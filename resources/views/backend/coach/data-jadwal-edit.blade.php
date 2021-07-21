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
            <input type="hidden" name="id_jadwal" value="{{$datajadwal->id_jadwal}}">
            <input type="hidden" class="form-control" value="{{$datajadwal->id_game}}" name="id_game">
              <input type="hidden" class="form-control" value="{{$datajadwal->id_coach}}" name="id_coach">
            <div class="row">
              <div class="col-12">
                <label for="exampleInputGame1">Pilih Team</label>
                <select name="id_team" class="form-control" required>
                  @foreach ($datateam as $team)
                    <option {{  $datajadwal->id_team == $team->id_team ? "selected" : ''}} value="{{ $team->id_team }}">{{$team->nama_team}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputNama">Nama Jadwal</label>
              <input type="text" class="form-control" value="{{ isset($datajadwal) ? $datajadwal->nama_jadwal : ''}}" name="nama_jadwal">
          </div>
            <div class="form-group">
                <label for="exampleInputTgl">Tanggal</label>
                <input type="date" class="form-control" value="{{ isset($datajadwal) ? date("Y-m-d", strtotime($datajadwal->waktu_mulai)) : ''}}" name="tanggal">
            </div>
            <div class="form-group">
                <label for="exampleInputWaktu">Waktu</label>
                <input type="time" class="form-control" value="{{ isset($datajadwal) ? date("H:i", strtotime($datajadwal->waktu_mulai)) : ''}}" name="waktu_mulai">
            </div>
            <div class="form-group">
              <label for="exampleInputKet">Keterangan</label>
              <textarea name="keterangan" id="" rows="7" class="form-control" required>{{ isset($datajadwal) ? $datajadwal->keterangan : ''}}</textarea>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url('datajadwal')}}" class="btn btn-secondary">Cancel</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div>
@endsection