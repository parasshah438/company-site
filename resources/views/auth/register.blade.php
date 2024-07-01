@extends('layouts.front')

@section('content')
<main class="main">

    <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">Register</h2>
            <ul class="breadcrumb-menu">
                <li><a href="index.html">Home</a></li>
                <li class="active">Register</li>
            </ul>
        </div>
    </div>


    <div class="login-area py-120">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div class="login-form">
                    <div class="login-header">
                        <img src="assets/img/logo/logo.png" alt>
                        <p>Create your motex account</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label>Full Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" autocomplete="mobile" autofocus>

                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('mobile')}}</strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('password')}}</strong>
                            </span>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>


                        <div class="form-check form-group">
                            <input class="form-check-input" type="checkbox" value id="agree">
                            <label class="form-check-label" for="agree">
                                I agree with the <a href="javascript:void(0);">Terms Of Service.</a>
                            </label>
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="theme-btn"><i class="far fa-paper-plane"></i>
                                Register</button>
                        </div>
                    </form>
                    <div class="login-footer">
                        <p>Already have an account? <a href="{{route('login')}}">Login.</a></p>
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