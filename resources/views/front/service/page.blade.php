@extends('layouts.front')
@section('title',$data->title ? $data->title : 'Top App, Game & Web Development Service')
@section('content')
 
<section id="hero" class="d-flex hero_banner mob_app_dev align-items-center">
    <div id="particles-js"></div>
    <div class="container2">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-md-12 d-flex flex-column justify-content-center">
                <div class="text-box">
                    <h1>{{$data->title}}</h1>
                    <p>{!!$data->short_description!!}</p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-md-12">
                <div class="text-center">
                    <img src="{{asset('public/uploads/services')}}/{{$data->image}}" class="img-fluid xl-img-85 lg-img-85" alt="Flutter Game Development" title="Flutter Game Development">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="career about">
    <div class="container2">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="title">
                    <h2>{!!$data->title1!!}</h2>
                </div>
                {!!$data->description1!!}
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 order-lg-1">
                <div class="title">
                    <h2>{!!$data->title2!!}</h2>
                </div>
                {!!$data->description2!!}
            </div>
        </div>
    </div>
</section>

@if(count($service_list))
<section class="career employees p-t-0">
    <div class="container2">
        <div class="title">
            <h2>We Follow</h2>
        </div>
        <div class="row justify-content-center">
            @foreach($service_list as $val)
            <div class="col-xl-24 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="employee-box">
                    <img src="{{asset('public/uploads/services_photos')}}/{{$val->services_image}}" class="img-fluid" alt="Customize Games" title="Customize Games">
                    <h4>{{$val->services_title}}</h4>
                    {!!$val->services_description!!}
                </div>
            </div>
            @endforeach
      </div>
  </div>
</section>
@endif      
@endsection