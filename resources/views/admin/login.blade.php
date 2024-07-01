<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url('public/admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('public/admin_assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{url('public/admin_assets/bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{url('public/admin_assets/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{url('public/admin_assets/plugins/iCheck/square/blue.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css">
   .error {
    border: 2px solid #f00 !important;
    }
  </style>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="javascript:void(0);"><b>Admin</b></a>
  </div>
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
  <div class="login-box-body">
    <p class="login-box-msg">Sign in</p>
    <form method="post" autocomplete="off" id="loginform" action="{{route('admin.login.submit')}}">
    @csrf
      <div class="form-group has-feedback">
        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email Address" autocomplete="off" autofocus>
        <span class="text-danger" role="alert">      
            {{ $errors->first('email') }}
        </span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password" placeholder="Password" autocomplete="off">    
        <span class="invalid-feedback" role="alert">
            {{ $errors->first('password') }}
        </span>
      </div>
      <div class="form-group has-feedback">
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

      <div class="row">
        <div class="col-xs-8">
            <a href="{{ route('admin.password.request') }}">I forgot my password</a><br>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="{{url('public/admin_assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('public/admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/admin_assets/plugins/iCheck/icheck.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/admin_assets/js/jquery.validate.js')}}"></script>
<script>
$(document).bind('cut copy paste', function (e) {
    e.preventDefault();
});
$(document).on("contextmenu",function(e){
    return false;
});
$("input").on("keypress", function(e) {
    if ((e.which === 32 && !this.value.length) || (e.which === 60 || e.which === 61 || e.which === 62))
        e.preventDefault();
});  
$(".alert-success,.alert-danger").fadeTo(5000,5000).slideUp(1000, function(){
    $(".alert-success,.alert-danger").slideUp(1000);
});  
$('#loginform').validate({
    rules:{
        email:{
            required:true,
        },        
        password:{
            required:true,
        },
        captcha:{
            required:true,
        }
    },
    errorPlacement: function(){
            return false;
    },
});
$(".btn-refresh").click(function(){
  $.ajax({
     type:'GET',
     url:'admin/refresh_captcha',
     success:function(data){
        $(".captcha span").html(data.captcha);
     }
  });
});  
</script>
</body>
</html>
