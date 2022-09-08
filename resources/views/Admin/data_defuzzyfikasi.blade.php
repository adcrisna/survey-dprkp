@extends('layouts.admin')
@section('css')
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="{{ route('home_admin') }}"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Data Defuzzyfikasi</li>
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
                <h3 class="box-title">Data Defuzzyfikasi </h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('kelola_defuzzyfikasi') }}" class="button btn btn-xs btn-primary" onclick="return confirm('apakah anda yakin ?')"><i class="fa fa-edit"></i> Kelola Data Defuzzyfikasi</a> &nbsp;
                    <a href="{{ route('hapus_defuzzyfikasi') }}" class="button btn btn-xs btn-danger" onclick="return confirm('apakah anda yakin ?')"><i class="fa fa-trash"></i> Hapus Semua Data Defuzzyfikasi</a>
                </div>
              </div>
              <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="data-defuzzyfikasi">
                      <thead>
                        <tr>
                          <th>Atribut</th>
                          <th>Nilai Defuzzyfikasi Kenyataan</th>
                          <th>Nilai Defuzzyfikasi Harapan</th>
                          <th>GAP</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($defuzzyfikasi as $key => $value)
                        <tr>
                          <td>{{ $value->atribut_defuzzyfikasi }}</td>
                          <td>{{ round($value->nilai_kenyataan,3) }}</td>
                          <td>{{ round($value->nilai_harapan,3) }}</td>
                          <td>{{ round($value->gap_defuzzyfikasi,3) }}</td>
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
  var table = $('#data-defuzzyfikasi').DataTable();
</script>
@endsection