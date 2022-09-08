@extends('layouts.admin')
@section('css')
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="{{ route('home_admin') }}"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Data Survey</li>
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
                <h3 class="box-title">Data Survey</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('kelola_survey') }}" class="button btn btn-xs btn-primary" onclick="return confirm('apakah anda yakin ?')"><i class="fa fa-edit"></i> Kelola Data Survey</a>
                    </div>
              </div>
              <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="data-kategori">
                      <thead>
                        <tr>
                          <th>Nama Lengkap</th>
                          <th>No HP/WA</th>
                          <th>Gender</th>
                          <th>Umur</th>
                          <th>Pelayanan</th>
                          <th>Pekerjaan</th>
                          <th>P1</th>
                          <th>P2</th>
                          <th>P3</th>
                          <th>P4</th>
                          <th>P5</th>
                          <th>P6</th>
                          <th>P7</th>
                          <th>P8</th>
                          <th>P9</th>
                          <th>Kritik Saran</th>
                          <th>Aksi</th>       
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($survey as $key => $value)
                        <tr>
                          <td>{{ $value->nama_lengkap }}</td>
                          <td>{{ $value->no_hp }}</td>
                          <td>{{ $value->jenis_kelamin }}</td>
                          <td>{{ $value->umur }}</td>
                          <td>{{ $value->jenis_pelayanan }}</td>
                          <td>{{ $value->pekerjaan }}</td>
                          <td>{{ $value->p1 }}</td>
                          <td>{{ $value->p2 }}</td>
                          <td>{{ $value->p3 }}</td>
                          <td>{{ $value->p4 }}</td>
                          <td>{{ $value->p5 }}</td>
                          <td>{{ $value->p6 }}</td>
                          <td>{{ $value->p7 }}</td>
                          <td>{{ $value->p8 }}</td>
                          <td>{{ $value->p9 }}</td>
                          <td>{{ $value->kritik_saran }}</td>
                          <td width="70px">
                            <a href="{{ route('hapus_survey',$value->data_survey_id) }}"><button class="btn btn-xs btn-danger" onclick="return confirm('apakah anda ingin menghapus data ini ?')" ><i class="fa fa-trash"> Hapus</i></button></a> 
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
@endsection

@section('javascript')
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
  var table = $('#data-kategori').DataTable();
</script>
@endsection