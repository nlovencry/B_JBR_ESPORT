@extends('backend/admin/layouts/template')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Tournament</h3>
          <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <a href="{{ route('dataevent.create')}}" class="btn btn-primary"><span><i class="fa fa-plus"></i></span> Tambah Data</a>
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
              <th>Nama Tournament</th>
              <th>Slot/Participant</th>
              <th>Hadiah</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($dataevent as $de)
                  <tr>
                      <td>{{$no++}}</td>
                      <td>{{$de->nama_game}}</td>
                      <td>{{$de->nama_event}}</td>
                      <td>{{$de->slot}}</td>
                      <td>{{$de->price}}</td>
                      <td>
                        <form action="{{ route('dataevent.destroy', $de->id_event) }}" method="POST">
                          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail_tour{{$de->id_event}}">
                            Detail
                          </button>
                          <div class="modal fade" id="detail_tour{{$de->id_event}}">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Detail Tournament</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputNama">Nama Tournament</label>
                                      <input type="text" name="nama_event" class="form-control" value="{{ isset($de) ? $de->nama_event : ''}}" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputTanggal">Tanggal Mulai Pendaftaran</label>
                                      <input type="email" name="tgl_mulai_pendaftaran" class="form-control" value="{{ isset($de) ? $de->tgl_mulai_pendaftaran : ''}}" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputTanggal">Tanggal Akhir Pendaftaran</label>
                                      <input type="email" name="tgl_akhir_pendaftaran" class="form-control" value="{{ isset($de) ? $de->tgl_akhir_pendaftaran : ''}}" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-12">
                                        <label for="exampleInputTanggal">Tanggal Mulai</label>
                                        <input type="email" name="tanggal_mulai" class="form-control" value="{{ isset($de) ? $de->tanggal_mulai : ''}}" readonly>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-12">
                                        <label for="exampleInputTanggal">Tanggal Pendaftaran</label>
                                        <input type="email" name="tanggal_akhir" class="form-control" value="{{ isset($de) ? $de->tanggal_akhir : ''}}" readonly>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputHadiah">Slot/Participant</label>
                                      <input type="text" name="slot" class="form-control" value="{{ isset($de) ? $de->slot : ''}}" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputHadiah">Hadiah</label>
                                      <input type="text" name="price" class="form-control" value="{{ isset($de) ? $de->price : ''}}" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputKet">Keterangan</label>
                                      <textarea name="keterangan" id="keterangan" class="form-control" rows="5" readonly>{{ isset($de) ? $de->keterangan : ''}}</textarea>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputPoster">Poster</label><br>
                                      <img src="{{ asset('images/'.$de->gambar)}}" id="previewImg" alt="foto" style="max-width: 250px; max-height:250px">
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
                          <a href="{{ route('dataevent.edit',$de->id_event)}}" class="btn btn-warning btn-sm">Edit</a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
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