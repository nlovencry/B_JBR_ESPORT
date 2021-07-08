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
          <h3 class="card-title">Tambah Data Game</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('datagame.store') }}">
          {!! csrf_field() !!}
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputGame1">Nama Game</label>
              <input type="text" class="form-control" placeholder="Masukkan Nama Game" name="nama_game">
            </div>
            <div class="form-group">
              <label for="exampleInputKet">Keterangan</label>
              <textarea name="keterangan" id="" rows="7" class="form-control"></textarea>
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