@extends('layouts.front')

@section('content')
<main class="main">

    <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">My Profile</h2>
            <ul class="breadcrumb-menu">
                <li><a href="index.html">Home</a></li>
                <li class="active">My Profile</li>
            </ul>
        </div>
    </div>


    <div class="user-profile py-120">
        <div class="container">
            <div class="row">
            @include('user.sidebar')
                <div class="col-lg-9">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                    @endforeach
                    <div class="user-profile-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-profile-card">
                                    <h4 class="user-profile-card-title">Profile Info</h4>
                                    <div class="user-profile-form">
                                        <form method="POST" autocomplete="off">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" autocomplete="name" autofocus>

                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{$errors->first('name')}}</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Mobile</label>
                                                        <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{Auth::user()->mobile}}" autocomplete="mobile" autofocus>

                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{$errors->first('mobile')}}</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" autocomplete="email">

                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{$errors->first('email')}}</strong>
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                            <button type="submit" class="theme-btn my-3"><span class="far fa-user"></span> Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection