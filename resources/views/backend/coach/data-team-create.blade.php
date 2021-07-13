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
                        <label for="exampleInputGame1">Pilih Game</label>
                        <select name="id_game" class="form-control" required>
                        @foreach ($datagame as $game)
                            <option value="{{$game->id_game}}">{{$game->nama_game}}</option>
                        @endforeach 
                        </select>
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
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div>
@endsection