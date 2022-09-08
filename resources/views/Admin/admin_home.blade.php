@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/morris/morris.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/morris/morris.css') }}">
@endsection

@section('content')
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="{{ route('home_admin') }}"><i class="fa fa-home"></i> Dashboard</a></li>
    </ol>
  </section>
  <section class="content">
    <br/>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Data Survey</span>
              <span class="info-box-number">{{ count($survey) }}</span>
            </div>
          </div>
        </div>
        <div class="col-xs-9">
        <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Data Survey</h3>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
          </div>
      </div>
    </div>
    <br/>
  </section>
@endsection

@section('javascript')
<script src="{{ asset('adminlte/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/morris/morris.min.js') }}"></script>
<script type="text/javascript">
  var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: 'Tidak', a: {{ $tidak_harapan }}, b: {{ $tidak_kenyataan }} },
        {y: 'Kurang', a: {{ $kurang_harapan }}, b: {{ $kurang_kenyataan }} },
        {y: 'Sesuai', a: {{ $sesuai_harapan }}, b: {{ $sesuai_kenyataan }} },
        {y: 'Sangat', a: {{ $sangat_harapan }}, b: {{ $sangat_kenyataan }} },
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Harapan', 'Kenyataan'],
      hideHover: 'auto'
      });
</script>
@endsection