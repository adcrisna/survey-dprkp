@extends('layouts.admin')
@section('css')
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="{{ route('home_admin') }}"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Data Harapan</li>
    </ol>
    <br/>
  </section>
  <section class="content">
           @if(\Session::has('msg_simpan'))
           <h5> <div class="alert alert-info">
              {{ \Session::get('msg_simpan')}}
            </div></h5>
            @endif
            @if(\Session::has('msg_hapus'))
           <h5> <div class="alert alert-danger">
              {{ \Session::get('msg_hapus')}}
            </div></h5>
            @endif
            @if(\Session::has('msg_update'))
           <h5> <div class="alert alert-warning">
              {{ \Session::get('msg_update')}}
            </div></h5>
            @endif
    <div class="row">
      <div class="col-xs-12">
          <div class="box box-danger">
              <div class="box-header">
                <h3 class="box-title">Data Harapan</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-form-tambah-harapan"><i class="fa fa-plus"> Tambah Data Harapan</i></button> &nbsp; 
                        <a href="{{ route('kelola_harapan') }}" class="button btn btn-xs btn-primary" onclick="return confirm('apakah anda yakin ?')"><i class="fa fa-edit"></i> Kelola Data Harapan</a>
                    </div>
              </div>
              <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="data-harapan">
                      <thead>
                        <tr>
                            <th style="display:none;">ID</th>
                            <th>Simbol Harapan</th>
                            <th>Tidak</th>
                            <th>Kurang</th>
                            <th>Sesuai</th>
                            <th>Sangat</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>   
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($harapan as $key => $value)
                        <tr>
                            <td style="display:none;">{{ $value->harapan_id }}</td>
                            <td>{{ $value->simbol_harapan }}</td>
                            <td>{{ $value->tidak_harapan }}</td>
                            <td>{{ $value->kurang_harapan }}</td>
                            <td>{{ $value->sesuai_harapan }}</td>
                            <td>{{ $value->sangat_harapan }}</td>
                            <td>{{ $value->jumlah_harapan }}</td>
                            <td>
                                <button class="btn btn-xs btn-success btn-edit-harapan"><i class="fa fa-edit"> Ubah</i></button> &nbsp;
                                <a href="{{ route('hapus_harapan',$value->harapan_id) }}"><button class="btn btn-xs btn-danger" onclick="return confirm('apakah anda ingin menghapus data ini ?')" ><i class="fa fa-trash"> Hapus</i></button></a> 
                            </td> 
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
              </div>
            </div>          
      </div>
    </div>
  </section>
  <div class="modal fade" id="modal-form-tambah-harapan" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Form Tambah Harapan</h4>
        </div>
        <div class="modal-body">
           <form action="{{ route('simpan_harapan') }}" method="post">
            {{ csrf_field() }}

          <div class="form-group has-feedback">
            <input type="text" name="simbol_harapan" class="form-control" placeholder="Simbol Harapan" required>
          </div>
          <div class="form-group has-feedback">
            <input type="number" name="tidak" class="form-control" placeholder="Tidak" required>
          </div>
          <div class="form-group has-feedback">
            <input type="number" name="kurang" class="form-control" placeholder="Kurang" required>
          </div>
          <div class="form-group has-feedback">
            <input type="number" name="sesuai" class="form-control" placeholder="Sesuai" required>
          </div>
          <div class="form-group has-feedback">
            <input type="number" name="sangat" class="form-control" placeholder="Sangat" required>
          </div>
          <div class="form-group has-feedback">
            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
          </div>
          <div class="row">
            <div class="col-xs-4 col-xs-offset-8">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
            </div>
            </div>
           </form>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
    <div class="modal fade" id="modal-form-edit-harapan" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Form Edit Kecamatan</h4>
        </div>
        <div class="modal-body">
           <form action="{{ route('edit_harapan') }}" method="post">
            {{ csrf_field() }}
          <div class="form-group has-feedback">
            <input type="number" name="harapan_id"  readonly class="form-control" readonly>
          </div>
          <div class="form-group has-feedback">
            <label>Simbol Harapan</label>
            <input type="text" name="simbol_harapan" class="form-control" required>
          </div>
          <div class="form-group has-feedback">
            <label>Tidak</label>
            <input type="number" name="tidak" class="form-control"required>
          </div>
          <div class="form-group has-feedback">
            <label>Kurang</label>
            <input type="number" name="kurang" class="form-control" required>
          </div>
          <div class="form-group has-feedback">
            <label>Sesuai</label>
            <input type="number" name="sesuai" class="form-control" required>
          </div>
          <div class="form-group has-feedback">
            <label>Sangat</label>
            <input type="number" name="sangat" class="form-control" required>
          </div>
          <div class="form-group has-feedback">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
          </div>
          <div class="row">
            <div class="col-xs-4 col-xs-offset-8">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
            </div>
            </div>
           </form>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('javascript')
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
  var table = $('#data-harapan').DataTable();

  $('#data-harapan').on('click','.btn-edit-harapan',function(){
    row = table.row( $(this).closest('tr') ).data();
    console.log(row);
    $('input[name=harapan_id]').val(row[0]);
    $('input[name=simbol_harapan]').val(row[1]);
    $('input[name=tidak]').val(row[2]);
    $('input[name=kurang]').val(row[3]);
    $('input[name=sesuai]').val(row[4]);
    $('input[name=sangat]').val(row[5]);
    $('input[name=jumlah]').val(row[6]);
    $('#modal-form-edit-harapan').modal('show');
  });

  $('#modal-form-tambah-harapan').on('show.bs.modal',function(){
    $('input[name=simbol_harapan]').val('');
    $('input[name=tidak]').val('');
    $('input[name=kurang]').val('');
    $('input[name=sesuai]').val('');
    $('input[name=sangat]').val('');
    $('input[name=jumlah]').val('');
  });
</script>
@endsection