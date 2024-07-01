@extends('layouts.front')
@section('title','404')
@section('content')

<section id="hero" class="d-flex align-items-center">
    <div id="particles-js"></div>
    <div class="container2">
        <div class="row align-items-center">
            <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="hero_txt">
                    <h3>404</h3>
                    <h1>
                      <a>WE ARE SORRY, PAGE NOT FOUND!</a>
                    </h1>
                    <p>THE PAGE YOU ARE LOOKING FOR MIGHT HAVE BEEN REMOVED HAD ITS NAME CHANGED
OR IS TEMPORARILY UNAVAILABLE.</p>
                </div>
                <div class="form-group">
                    <a href="{{url('/')}}" class="btn btn-primary">Back To Homepage</a>
                </div>
            </div>
            <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="hero-img-box text-center">
                    <img src="public/front_assets/img/404.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
