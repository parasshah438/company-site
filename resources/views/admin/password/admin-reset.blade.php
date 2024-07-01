@extends('layouts.nobanner')
@section('title', 'Confirm Reset Password')
@section('pagespecificstyles')  
@stop
@section('content')
<body class="hold-transition login-page">
<div class="login-box">  
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ route('admin.password.request') }}" method="post" autocomplete="off" id="loginform">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="form-group has-feedback">
       <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email Address" autofocus>
       <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <span class="invalid-feedback" role="alert">      
                    {{ $errors->first('email') }}
            </span>

       
      </div>

       <div class="form-group has-feedback">

        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password" placeholder="Password">
        <span class="invalid-feedback" role="alert">
            {{ $errors->first('password') }}
        </span>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>


      <div class="form-group has-feedback">

        <input id="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Retype Password">
        <span class="invalid-feedback" role="alert">
            {{ $errors->first('password_confirmation') }}
        </span>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
        </div>
        <!-- /.col -->
      </div>
    </form>    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection

@section('pagespecificscripts')

<script type="text/javascript">
$('#loginform').validate({
    rules:{
        email:{
            required:true,
        },        
    },
   errorPlacement: function(){
            return false;
        },
});
</script>
</body>
</html>
@stop