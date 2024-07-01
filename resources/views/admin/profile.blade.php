@extends('layouts.admin')
@section('title', 'Profile')  
@section('pagespecificstyles')  
@stop
  <!-- Content Wrapper. Contains page content -->
  @section('content')
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <img src="{{ asset('public/admin_assets/admin_profile/'.Auth::guard('admin')->user()->image) }}" class="profile-user-img img-responsive img-circle" alt="Avatar">

              <h3 class="profile-username text-center">{{Auth::guard('admin')->user()->name }}</h3>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Last Login Date</b> <a class="pull-right">
                    {{ date('Y-m-D',strtotime(Auth::guard('admin')->user()->last_login_at)) }}
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Last login From</b> <a class="pull-right">{{Auth::guard('admin')->user()->last_login_ip }}</a>
                </li>
                <li class="list-group-item">
                  <b>Last Login Ago</b> <a class="pull-right">
                    {{ \Carbon\Carbon::parse(Auth::guard('admin')->user()->last_login_at)->diffForHumans() }}
                  </a>
                </li>
              </ul>
           </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
            {{ $errors->first('email') }}
        </div>       
    @endif
    @foreach($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
              {{ $error }}
          </div>
    @endforeach
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Profile</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="settings">
                <form class="form-horizontal" enctype="multipart/form-data" method="post" autocomplete="off">
                  @csrf
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">{{ __('Name') }}</label>
                    <div class="col-sm-10">
                      <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{Auth::guard('admin')->user()->name }}" >
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  
                  <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">
                  {{ __('Email') }}</label>
                    <div class="col-sm-10">
                      <input id="email" type="text" class="form-control" name="email" value="{{Auth::guard('admin')->user()->email }}" >

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror                  
                    </div>
                  </div>
                  <div class="form-group">
                  <label for="mobile" class="col-sm-2 control-label">
                  {{ __('Mobile') }}</label>
                    <div class="col-sm-10">
                      <input id="mobile" type="number" class="form-control" name="mobile" value="{{Auth::guard('admin')->user()->mobile }}" >
                      @error('mobile')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror                  
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">{{ __('Image') }}</label>
                    <div class="col-sm-10">
                     <input id="image" type="file" class="form-control" name="image" value="{{Auth::guard('admin')->user()->image }}" >
                     @if(Auth::guard('admin')->user()->image == "")
                    <img src="{{ asset('public/front_assets/img/no-image.png') }}" class="avatar" alt="Avatar" width=100px>
                    @else 
                    <img src="{{ asset('public/admin_assets/admin_profile/'.Auth::guard('admin')->user()->image) }}" class="avatar" alt="Avatar" width=100px>
                    @endif  

                  @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                    </div>
                  </div>

                  <div class="form-group has-feedback">
                    <label for="image" class="col-sm-2 control-label">{{ __('Captcha') }}</label>
                    <div class="col-sm-10">
                    <div class="captcha">
                    <span>{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>
                    </div>
                    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                        @if ($errors->has('captcha'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('captcha') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success">{{ __('submit') }}</button>
                          <button type="reset" class="btn  btn-warning">{{ __('Reset') }}</button>
                          <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Back</a>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  @endsection
  <!-- /.content-wrapper -->
@section('pagespecificscripts')
<script>
    $(document).ready(function(){
        $("#password").focus(function() {
            $('.msg').css('display','block');
        }).blur(function() {
            $('.msg').css('display','none');
        }); 
    }); 
    $(".btn-refresh").click(function(){
      $.ajax({
         type:'GET',
         url:'refresh_captcha',
         success:function(data){
            $(".captcha span").html(data.captcha);
         }
      });
    }); 
</script>
@stop

 

