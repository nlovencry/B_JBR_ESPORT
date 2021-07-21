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
          <h3 class="card-title">Tambah Anggota</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route ('detailteam.update',$id_team) }}">
            {!! csrf_field() !!}
            {!!  method_field('PUT') !!} 
            <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    {{-- <input type="text" class="form-control" value="{{$detailteam->id_team}}" name="id_team"> --}}
                    <label for="exampleInputGame1">Pilih Member</label>
                    <input type="hidden" name="id_team" value="{{ $id_team }}">
                    <select name="id_player" class="form-control" required>
                      @foreach ($dataplayer as $player)
                        <option value="{{$player->id_player}}">{{$player->name}}</option>
                      @endforeach 
                    </select>
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