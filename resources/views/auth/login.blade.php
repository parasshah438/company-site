@extends('layouts.front')

@section('content')
<main class="main">

    <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">Login</h2>
            <ul class="breadcrumb-menu">
                <li><a href="index.html">Home</a></li>
                <li class="active">Login</li>
            </ul>
        </div>
    </div>


    <div class="login-area py-120">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div class="login-form">
                    <div class="login-header">
                        <img src="assets/img/logo/logo.png" alt>
                        <p>Login with your motex account</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                            <span class="invalid-feedback" role="alert">
                                <strong> {{$errors->first('password')}}</strong>
                            </span>
                        </div>
                       
                        <div class="d-flex align-items-center">
                            <button type="submit" class="theme-btn"><i class="far fa-sign-in"></i> Login</button>
                        </div>
                    </form>
                    <div class="login-footer">
                        <p>Don't have an account? <a href="{{route('register')}}">Register.</a></p>
                        <!-- <div class="social-login">
                            <p>Continue with social media</p>
                            <div class="social-login-list">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-google"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection