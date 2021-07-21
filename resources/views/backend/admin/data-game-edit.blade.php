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
          <h3 class="card-title">Ubah Data Game</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ isset($datagame) ? route ('datagame.update', $datagame->id_game) : route('datagame.store') }}">
          {!! csrf_field() !!}
          {!! isset($datagame) ? method_field('PUT') : '' !!} 
          <div class="card-body">
            <input type="hidden" name="id_game" value="{{$datagame->id_game}}"><br>
            <div class="form-group">
              <label for="exampleInputGame1">Nama Game</label>
              <input type="text" class="form-control" value="{{ isset($datagame) ? $datagame->nama_game : ''}}" name="nama_game" required>
            </div>
            <div class="form-group">
              <label for="exampleInputKet">Keterangan</label>
              <textarea name="keterangan" id="" rows="7" class="form-control" required>{{ isset($datagame) ? $datagame->keterangan : ''}}</textarea>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url('datagame')}}" class="btn btn-secondary">Cancel</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div>
@endsection