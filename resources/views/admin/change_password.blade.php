@extends('layouts.admin')
@section('title', 'Change Password')  
@section('pagespecificstyles')  
@stop
  <!-- Content Wrapper. Contains page content -->
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Change Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">      
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <div class="tab-content">
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
              <div id="settings">
                <form class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                   @csrf

                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">{{ __('Current password') }}</label>
                    <div class="col-sm-10">
                      <input id="current_password" type="password" class="form-control" name="current_password" placeholder="Current Password" autofocus="off" maxlength="50">
                      @error('current_password')
                          <span class="invalid-feedback" role="alert">
                                  <strong class="text-danger">{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">{{ __('New password') }}</label>
                    <div class="col-sm-10">
                      <input id="new_password" type="password" class="form-control" name="new_password" placeholder="New Password" autofocus="off" maxlength="50">
                      @error('new_password')
                          <span class="invalid-feedback" role="alert">
                                  <strong class="text-danger">{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">{{ __('Confirm password') }}</label>
                    <div class="col-sm-10">
                      <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" placeholder="Current Password" autofocus="off" maxlength="50">
                      @error('new_confirm_password')
                          <span class="invalid-feedback" role="alert">
                                  <strong class="text-danger">{{ $message }}</strong>
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

 

