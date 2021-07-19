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
          <h3 class="card-title">Tambah Jadwal Latihan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('datajadwal.store') }}">
          {!! csrf_field() !!}
          <div class="card-body">
            <div class="row">
              <input type="hidden" class="form-control" value="{{$datagame->id_game}}" name="id_game">
              <input type="hidden" class="form-control" value="{{$coach->id_coach}}" name="id_coach">
              <div class="col-12">
                <label for="exampleInputGame1">Pilih Team</label>
                <select name="id_team" class="form-control" required>
                  @foreach ($datateam as $team)
                    <option value="{{$team->id_team}}">{{$team->nama_team}}</option>
                  @endforeach 
                </select>
              </div>
            </div>
            <div class="form-group">
                <label for="exampleInputNama">Nama Jadwal</label>
                <input type="text" class="form-control" placeholder="Nama Jadwal Latihan" name="nama_jadwal">
            </div>
            <div class="form-group">
              <label for="exampleInputWaktu">Tanggal</label>
              <input type="date" class="form-control" placeholder="Pilih Tanggal" name="tanggal">
            </div>
            <div class="form-group">
                <label for="exampleInputWaktu">Waktu</label>
                <input type="time" class="form-control" placeholder="Pilih Waktu" name="waktu_mulai">
            </div>
            <div class="form-group">
              <label for="exampleInputKet">Keterangan</label>
              <textarea name="keterangan" id="" rows="7" class="form-control"></textarea>
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