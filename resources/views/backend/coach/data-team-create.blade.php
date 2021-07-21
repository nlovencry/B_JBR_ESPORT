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
          <h3 class="card-title">Tambah Team</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('datateam.store')}}">
          {!! csrf_field() !!}
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputGame1">Game</label>
                        <input type="hidden" class="form-control" value="{{$datagame->id_game}}" name="id_game">
                        <input type="text" class="form-control" value="{{$datagame->nama_game}}" readonly>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <label for="exampleInputNama">Nama Coach</label>
                      <input type="hidden" class="form-control" value="{{$coach->id_coach}}" name="id_coach">
                      <input type="text" class="form-control" value="{{auth()->user()->name}}" readonly>
                  </div>
              </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputNama">Nama Team</label>
                        <input type="text" class="form-control" placeholder="Nama Team" name="nama_team">
                    </div>
                </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url('datateam')}}" class="btn btn-secondary">Cancel</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div>
@endsection