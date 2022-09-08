@extends('layouts.admin')
@section('css')
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="{{ route('home_admin') }}"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Data Hasil</li>
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
                <h3 class="box-title">Data Hasil </h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('print_hasil') }}" class="button btn btn-xs btn-warning" target="_blank"><i class="fa fa-edit"></i> Print Hasil</a> &nbsp;
                    <a href="{{ route('hapus_hasil') }}" class="button btn btn-xs btn-danger" onclick="return confirm('apakah anda yakin ?')"><i class="fa fa-trash"></i> Hapus Semua Data Hasil</a>
                </div>
              </div>
              <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="data-defuzzyfikasi">
                      <thead>
                        <tr>
                          <th>Dimensi</th>
                          <th>Atribut</th>
                          <th>Kenyataan</th>
                          <th>Harapan</th>
                          <th>GAP</th>
                        </tr>
                        <tr>
                          <th></th>
                          <th style="display: none;">{{ $total1 = 0 }}</th>
                          <th style="display: none;">{{ $total2 = 0 }}</th>
                          <th style="display: none;">{{ $total3 = 0 }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($hasil as $key => $value)
                        <tr>
                            <td>{{ $value->dimensi }}</td>
                            <td>
                                @if ($value->dimensi == "Tangibles")
                                  P1. Apakah saudara tahu tentang kotak saran dan
                                  pengaduan dalam pelayanan ini.<br/>
                                  P2. Apakah saudara puas terhadap kelayakan dan
                                  kenyamanan ruang pelayanan (kebersihan,
                                  kelayakan kursi ruang tunggu, pendingin
                                  udara, dsb)
                                @elseif ($value->dimensi == "Reliability") 
                                  P3. Apakah saudara puas mengenai waktu dan
                                  ketepatan pelayanan<br/>
                                  P4. Apakah Saudara tahu tentang persyaratan pelayanan<br/>
                                  P5. Apakah saudara puas mengenai waktu dan
                                  ketepatan pelayanan
                                @elseif ($value->dimensi == "Responsiveness") 
                                  P6. Apakah saudara puas dengan pelayanan yang diberikan petugas
                                @elseif ($value->dimensi == "Assurance") 
                                  P7. Apakah produk layanan sudah sesuai dengan ketentuan yang ditetapkan<br/>
                                  P8. Apakah biaya pelayanan sudah sesuai dengan
                                  ketentuan
                                @elseif ($value->dimensi == "Emphaty") 
                                 P9. Apakah saudara puas dengan sikap petugas dalam memberikan pelayanan
                                @endif
                                </td>
                            <td>{{ round($value->hasil_kenyataan,3) }}</td>
                            <td>{{ round($value->hasil_harapan,3) }}</td>
                            <td>{{ round($value->hasil_gap,3) }}</td>
                            <td style="display:none;">{{ round($total1 += $value->hasil_kenyataan,3) }}</td>
                            <td style="display:none;">{{ round($total2 += $value->hasil_harapan,3) }}</td>
                            <td style="display:none;">{{ round($total3 += $value->hasil_gap,3) }}</td>
                        </tr>
                        @endforeach
                        <tr style="background-color: yellow;">
                            <th>Total</th>
                            <th></th>
                            <th>{{ round($total1/5,3) }}</th>
                            <th>{{ round($total2/5,3) }}</th>
                            <th>{{ round($total3/5,3) }}</th>
                        </tr>
                        <tr style="background-color: green;">
                            <th>Dengan Hasil</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th width="200">
                            @if (round($total3/5,3) < -1.000)
                              Tidak Puas
                            @elseif (round($total3/5,3) <=0.000 && round($total3/5,3) >= -1.000 )
                              Kurang Puas
                            @elseif (round($total3/5,3) >=0.000 && round($total3/5,3) <= 1.000 )
                              Cukup Puas
                            @elseif (round($total3/5,3) > 1.000)
                              Sangat Puas
                            @endif
                            </th>
                        </tr>
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