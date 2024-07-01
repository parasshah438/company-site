@extends('layouts.front')
@section('title',$data->title)
@section('content')
  
<section id="hero" class="d-flex align-items-center">
<div id="particles-js"></div>
        <div class="container2">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="hero_txt">
                    <h3>Recognize us</h3>
                    <h1>
                      <a>{{$data->title}}</a>
                    </h1>
                    
                    {!!$data->short_description!!}

                    </div>
                </div>
                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="hero-img-box text-center">
                        <img src="{{asset('public/uploads/pages')}}/{{$data->image}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>      
</section>

<section class="privacy_policy">

{!!$data->description!!}

</section> 

    @if($sku == 'career')
    @php 
    $care = \App\Models\Care::get();
    @endphp
    
    @if(count($care))
    <section class="career employees p-t-0">
        <div class="container2">
            <div cass="title" align="center">
                <h2>Care Of Employees</h2>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row justify-content-center">
                        @foreach($care as $val)
                        <div class="col-xl-24 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="employee-box">
                                <img src="{{asset('public/values')}}/{{$val->image}}" class="img-fluid xl-img-45 lg-img-45 md-img-50 sm-img-25 xs-img-35 xxs-img-45" alt="{{ config('app.sitename') }}">
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
    


    @php 
    $job = \App\Models\Job::get();
    @endphp
    @if(count($job))
    <section class="cur_opening p-t-0">
        <div class="container2">
            <div class="title">
                <h2>Current Openings</h2>
            </div>
            <div class="table-responsive vertical scrollhide">
                <!-- Table starts here -->
                <table class="table table-bordered m-0">
                    <thead class="title-bg">
                    <tr>
                        <th>Technology</th>
                        <th>Position</th>
                        <th>Experience</th>
                        <th>Qualification</th>
                        <th>Apply Now</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($job as $jobs)
                        <tr>
                            <td data-title="Technology">{{$jobs->title}}</td>
                            <td data-title="Position">{{$jobs->position}}</td>
                             <td data-title="Experience">{{$jobs->experience}}</td>
                            <td data-title="Qualification">{{$jobs->qualification}}</td>
                            <td class="btn-mobile-view"><a class="btn btn-primary" data-toggle="modal" data-target="#applymodal" onclick="openApplyModel()">Apply Now</a></td>
                        </tr>
                        @endforeach                                       
                        </tbody>
                </table>
            </div>
        </div>
    </section>
    @endif
    @endif
@endsection