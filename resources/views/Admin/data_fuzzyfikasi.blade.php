@extends('layouts.admin')
@section('css')
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="{{ route('home_admin') }}"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Data Fuzzyfikasi</li>
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
    <div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">Data Fuzzyfikasi </h3>
            <div class="box-tools pull-right">
                <a href="{{ route('kelola_fuzzyfikasi') }}" class="button btn btn-xs btn-primary" onclick="return confirm('apakah anda yakin ?')"><i class="fa fa-edit"></i> Kelola Data Fuzzyfikasi</a> &nbsp;
                <a href="{{ route('hapus_fuzzyfikasi') }}" class="button btn btn-xs btn-danger" onclick="return confirm('apakah anda yakin ?')"><i class="fa fa-trash"></i> Hapus Semua Data Fuzzyfikasi</a>
            </div>
        </div>
    <div class="box-body table-responsive">
    <div class="row">
      <div class="col-xs-6">
          <div class="box box-danger">
              <div class="box-header">
                <h3 class="box-title">Kenyataan</h3>
              </div>
              <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="data-kenyataan">
                      <thead>
                        <tr>
                          <th>Atribut</th>
                          <th>C</th>
                          <th>A</th>
                          <th>B</th>
                          <th>Defuzzyfikasi</th>  
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($kenyataan as $key => $value)
                        <tr>
                          <td>{{ $value->atribut_kenyataan }}</td>
                          <td>{{ round($value->c_kenyataan,3) }}</td>
                          <td>{{ round($value->a_kenyataan,3) }}</td>
                          <td>{{ round($value->b_kenyataan,3) }}</td>
                          <td>{{ round($value->defuzzyfikasi_kenyataan,3) }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
              </div>
            </div>          
      </div>
      <div class="col-xs-6">
          <div class="box box-danger">
              <div class="box-header">
                <h3 class="box-title"> Harapan</h3>
              </div>
              <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="data-harapan">
                      <thead>
                        <tr>
                          <th>Atribut</th>
                          <th>C</th>
                          <th>A</th>
                          <th>B</th>
                          <th>Defuzzyfikasi</th>  
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($harapan as $key => $value)
                        <tr>
                          <td>{{ $value->atribut_harapan }}</td>
                          <td>{{ round($value->c_harapan,3) }}</td>
                          <td>{{ round($value->a_harapan,3) }}</td>
                          <td>{{ round($value->b_harapan,3) }}</td>
                          <td>{{ round($value->defuzzyfikasi_harapan,3) }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
              </div>
            </div>          
      </div>
    </div>
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
  var table = $('#data-kenyataan').DataTable();
  var table = $('#data-harapan').DataTable();
</script>
@endsection