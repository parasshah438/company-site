<header id="header" class="fixed-top" style="background-color: #f9f9f9;">
    <div class="container-fluid p0">
        <div class="row justify-content-center">
            <div class="col-xl-12 d-flex align-items-center">
                <a href="{{route('front.index')}}">
                    <div class="logo">
                        @if($gs->site_logo != null)
                        <img src="{{asset('public/uploads/logo')}}/{{$gs->site_logo}}" 
                        alt="{{ config('app.sitename') }}" style="width: 120px;" title="{{ config('app.sitename') }}">
                        @endif
                    </div>
                </a>
                @php
                $services_category = \App\Models\ServiceCategory::get();
                @endphp
                <nav class="nav-menu d-none d-lg-block ml-auto">
                    <ul class="nav-menu-list">
                        <li class="{{request()->is('/') ? 'active' : ''}}"><a href="{{url('/')}}">Home</a>
                        </li>
                        <li class="drop-down mega-menu"> <a href="javascript:void(0);">Service</a>
                            <ul class="p-r-20 p-l-20">
                                <li>
                                    <div class="container2">
                                        <div class="row">
                                            @foreach($services_category as $val)
                                            <div class="col-lg-6 col-xl-3 col-md-6">
                                                <div class="list-box">
                                                    <div class="media">
                                                        <img class="align-self-center mr-2 xl-img-15 lg-img-15 md-img-15 sm-img-10 xs-img-15 xxs-img-25" src="{{asset('/public/servicecategory')}}/{{$val->image}}" alt="E-commerce Development" title="E-commerce Development">
                                                        <div class="media-body">
                                                            <h5 class="mt-0 mb-0">{{$val->title}}</h5>
                                                        </div>
                                                    </div>

                                                    @php
                                                        $services =  \App\Models\Service::where('category_id',$val->id)->get();
                                                    @endphp

                                                    <div class="list-icon info_list">

                                                        @foreach($services as $sval)
                                                        <span><a href="{{url('/')}}/service/{{$sval->url}}" target="_blank">
                                                            {{$sval->title}}
                                                        </a></span>
                                                        @endforeach
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="{{request()->is('portfolio') ? 'active' : ''}}"><a href="{{route('front.portfolio')}}">OUR Portfolio</a>
                        </li>
                        <li class="drop-down {{request()->is('page/career') ? 'active' : ''}}">
                            <a href="javascript:void(0);">Career</a>
                            <ul class="p-r-20 p-l-20 drop-single">
                                <div class="list-box">
                                    <div class="list-icon info_list p-t-0">
                                        <span><a href="{{url('/')}}/page/career">Current Openings</a></span>
                                        <!-- <span><a href="javascript:void(0)">Life @ {{ config('app.sitename') }}</a></span> -->
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li class="" onclick="">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#applymodal">We're Hiring</a>
                        </li>
                        <li class="{{request()->is('page/about-us') ? 'active' : ''}}"><a href="{{url('/')}}/page/about-us">About us</a>
                        </li>
                        <li class=""><a data-toggle="modal" data-target="#modal_aside_left" href="javascript:void(0);">Contact us</a>
                        </li>
                    </ul>
                </nav>
                
            </div>
        </div>
    </div>
</header>