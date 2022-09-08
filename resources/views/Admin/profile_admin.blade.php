@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
@endsection

@section('content')
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="{{ route('home_admin') }}"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Profile</li>
    </ol>
  </section>
  <br/>
  <br/>
  <section class="content">
            @if(\Session::has('msg_update_profile'))
           <h5> <div class="alert alert-warning">
              {{ \Session::get('msg_update_profile')}}
            </div></h5>
            @endif
            @if(\Session::has('msg_gagal_foto'))
           <h5> <div class="alert alert-danger">
              {{ \Session::get('msg_gagal_foto')}}
            </div></h5>
            @endif
    <div class="row">
      <div class="col-xs-12">
         <div class="box">
          <div class="box-header">
                <h3 class="box-title">Profile Bagian Admin</h3>
          </div>
          <div class="box-body table-responsive">
            <form action="{{ route('update_profile') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="form-group has-feedback">
            <input type="hidden" name="id" readonly class="form-control" value="{{ $admin->id }}" readonly>
          </div>
          <div class="form-group has-feedback">
                <label>Nama :</label>
                <input type="text" name="nama" class="form-control" value="{{ $admin->nama_user }}" require>
            </div>
            <div class="form-group has-feedback">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="{{ $admin->username }}" readonly>
            </div>
            <div class="form-group has-feedback">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder=" Masukan Password Baru">
            </div>
          <div class="row">
            <div class="col-xs-2 col-xs-offset-5">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
            </div>
          </div>
        </form>
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
@endsection