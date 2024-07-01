@extends('layouts.front')
@section('title','Career')
@section('content')
	

<section id="hero" class="d-flex align-items-center">
                        <div id="particles-js"></div>
                        <div class="container2">
                            <div class="row align-items-center">
                                <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="hero_txt">
                                    <h3>Join us</h3>
                                    <h1>
                                      <a>Find Your Next Perfect Role</a>
                                    </h1>
                                    <p>Begin your career with Vasundhara Infotech, we offer the best industry
                                        experience & career opportunity to grow with us.</p>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="hero-img-box text-center">
                                        <img src="public/assets/img/career/technology.svg" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!-- End Hero -->
        <!--<section id="" class="d-flex hero_banner career align-items-center">
            <div class="container2">
                <div class="txt-box">
                    <h2 class="themes-color">WE ARE</h2>
                    <h1>HIRING</h1>
                    <h2>APPLY FOR JOB NOW !!!</h2>
                </div>
            </div>
        </section>--><!-- End Hero -->

    <section class="career about">
        <div class="container2">
            <div class="title">
                <h2>Career At {{ config('app.sitename') }}</h2>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="text-center p-b-20">
                        <img src="public/assets/img/career/career_at_image.svg" class="img-fluid" alt="Career">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 order-lg-1">
                    <ul class="info_list">
                        <li>
                            <p>
                                Be part of a team of dedicated tech professionals who change and
                                care for each other on a daily basis at every stage of your career.</p>
                        </li>
                        <li>
                            <p>
                                Join our friendly team and take the challenge. Let’s start businesses
                                and help new entrepreneurs.
                            </p>
                        </li>
                        <li>
                            <p>
                                Be part of an experienced team of highly trained IT
                                professional experts.</p>
                        </li>
                        <li>
                            <p>
                                As the development grows day by day, we are especially looking
                                for new, small, innovative, and imaginative minds.
                            </p>
                        </li>
                        <li>
                            <p>
                                Please contact us if you think you would like to work as a developer.
                            </p>
                        </li>
                        <li>
                            <p>
                                Be a part of our team in a diverse work atmosphere, focused on fostering business by delivering outstanding service.
                            </p>
                        </li>
                        <li>
                            <p>
                                To broaden your learning, experience, and abilities, get an opportunity in our organization.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @php 
    $care = \App\Models\Care::get();
    @endphp
    @if(count($care))
    <section class="career employees p-t-0">
        <div class="container2">
            <div cass="title">
                <h2>Care Of Employees</h2>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row justify-content-center">
                        @foreach($care as $val)
                        <div class="col-xl-24 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="employee-box">
                                <img src="{{asset('public/values')}}/{{$val->image}}" class="img-fluid xl-img-45 lg-img-45 md-img-50 sm-img-25 xs-img-35 xxs-img-45" alt="Vasundhara Infotech">
                                <h4>{{$val->title}}</h4>
                                {{$val->description}}
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
