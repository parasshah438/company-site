@extends('layouts.admin')
@section('title', 'Logo setting')  
  <!-- Content Wrapper. Contains page content -->
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       @yield('title')
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Logo setting</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
            {{ $errors->first('email') }}
        </div>       
    @endif
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">

     <!--  <div id='app'>   -->
      <form method="post" autocomplete="off" enctype="multipart/form-data">
      @csrf 
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <div class="col-md-12">
              
              <div class="form-group col-md-6">
                <label>Header Logo</label>
                <input type="file" name="site_logo" id="site_logo" class="form-control">
                <div>{{ $errors->first('site_logo') }}</div>
                <img width="100px;" src="{{asset('public/uploads/logo')}}/{{$data->site_logo}}" alt="Logo">
              </div>

              <div class="form-group col-md-6">
                <label>Footer Logo</label>
                <input type="file" name="footer_logo" id="footer_logo" class="form-control">
                <div>{{ $errors->first('footer_logo') }}</div>
                <img width="100px;" src="{{asset('public/uploads/logo')}}/{{$data->footer_logo}}" alt="Logo">
              </div>

              
            </div>
            <!-- /.col -->

            
            
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button id="btnadd" type="submit" class="btn btn-primary">Sunmit</button>
        </div>
      <!-- </form> -->
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection


 

