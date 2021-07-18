@extends('backend/admin/layouts/template')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Coach</h3>
          <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <a href="{{ route('datacoach.create')}}" class="btn btn-primary"><span><i class="fa fa-plus"></i></span> Tambah Data</a>
              </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Game</th>
              <th>Nama</th>
              <th>No HP</th>
              <th>Status</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($datacoach as $dc)
                  <tr>
                      <td>{{$no++}}</td>
                      <td>{{$dc->nama_game}}</td>
                      <td>{{$dc->name}}</td>
                      <td>{{$dc->nohp}}</td>
                      <td>
                        @if ($dc->is_active == 1)
                            {{ 'active' }}
                        @else
                            {{ 'non-active' }}
                        @endif
                      </td>
                      <td><img src="{{ asset('images/'.$dc->foto)}}" id="previewImg" alt="foto" style="max-width: 150px; max-height:150px"></td>
                      <td>
                        <form action="{{ $dc->is_active == 1 ? route('datacoach.nonactive', $dc->id) : route('datacoach.active', $dc->id)}}" method="POST">
                          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail_coach{{$dc->id_coach}}">
                            Detail
                          </button>
                          <div class="modal fade" id="detail_coach{{$dc->id_coach}}">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Detail Coach</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputEmail">Email</label>
                                      <input type="email" name="email" class="form-control" value="{{ isset($dc) ? $dc->email : ''}}" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputNama">Nama Lengkap</label>
                                      <input type="text" name="nama_coach" class="form-control" value="{{ isset($dc) ? $dc->name : ''}}" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputJK">Jenis Kelamin</label>
                                      <input type="text" name="jenis_kelamin" class="form-control" value="@if($dc->jenis_kelamin == 1)Laki-laki @else Perempuan @endif" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputUsia">Usia</label>
                                      <input type="text" name="usia" class="form-control" value="{{ isset($dc) ? $dc->usia : ''}}" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputNoHP">No HP</label>
                                      <input type="text" name="nohp_coach" class="form-control" value="{{ isset($dc) ? $dc->nohp : ''}}" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputAlamat">Alamat</label>
                                      <textarea name="alamat" id="alamat" class="form-control" rows="5" readonly>{{ isset($dc) ? $dc->alamat : ''}}</textarea>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputStatus">Status</label>
                                      <input type="text" name="is_active" class="form-control" value="@if($dc->is_active == 1)active @else non-active @endif" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputFoto">Foto</label><br>
                                      <img src="{{ asset('images/'.$dc->foto)}}" id="previewImg" alt="foto" style="max-width: 250px; max-height:250px">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputFoto">Winrate</label><br>
                                      <img src="{{ asset('images/'.$dc->winrate)}}" id="previewImg" alt="foto" style="max-width: 250px; max-height:250px">
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <a href="{{ route('datacoach.edit',$dc->id_coach)}}" class="btn btn-warning btn-sm">Edit</a>
                          @csrf
                          @method('PUT')
                          @if ($dc->is_active == 1)
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menonaktifkan User Ini?')">Non-Active</button>
                          @else
                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Mengaktifkan User Ini?')">Active</button>
                          @endif
                        </form>
                      </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
<!-- /.modal -->
@endsection
@push('js')
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush