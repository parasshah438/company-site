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
    <a href="javascript:void(0);"><b>Forgot Password</b></a>
  </div>
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
  <div class="login-box-body">
    <p class="login-box-msg">Don't worry! Just fill in your ema and we'll send you a link to reset your password</p>
    <form  action="{{ route('admin.password.email') }}" method="post" autocomplete="off" id="loginform">
      @csrf
      <div class="form-group has-feedback">
       <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email Address" autofocus>     
      </div>
      <div class="row">        
        <!-- /.col -->
        <div class="col-xs-4">
            <a href="{{ route('admin.login') }}">Back to login</a><br>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
        </div>
        <!-- /.col -->
      </div>
    </form>    
  </div>
  <!-- /.login-box-body -->
</div>
<script src="{{url('public/admin_assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('public/admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/admin_assets/plugins/iCheck/icheck.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/admin_assets/js/jquery.validate.js')}}"></script>
<script type="text/javascript">
$(document).bind('cut copy paste', function (e) {
    e.preventDefault();
});
$(document).on("contextmenu",function(e){
    return false;
});  
$(".alert-success,.alert-danger").fadeTo(3000, 500).slideUp(500, function(){
    $(".alert-success,.alert-danger").slideUp(3000);
}); 
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