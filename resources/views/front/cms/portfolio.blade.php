@extends('layouts.front')
@section('title','Portfolio')
@section('content')

<section id="hero" class="d-flex align-items-center">
	<div id="particles-js"></div>
	<div class="container2">
		<div class="row align-items-center">
			<div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="hero_txt">
					<h3>Portfolio</h3>
					<p>Take a look at our products and client's projects</p>
				</div>
			</div>
			<div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="hero-img-box text-center">
					<img src="{{asset('public/assets/img/portfolio/portfolif.png')}}" class="img-fluid" alt="">
				</div>
			</div>
		</div>
	</div>
</section>
<section class="p-t-0 p-b-0">
	<div class="blog-nav">
		<div class="container2">
			<div class="nav-scroller">
				<nav class="nav d-flex justify-content-between">
					<ul class="snip1226" id="portfolio-flters">
						<li data-filter="*" class="filter-active"><a href="javascript:void(0);" class="filmenu active  link" data-hover="All">ALL</a>
						</li>
						@foreach($data as $val)
						<li id="{{$val->id}}" data-filter=".{{$val->id}}"><a href="javascript:void(0);" class="filmenu link  ">
                             {{$val->name}}</a>
						</li>
						@endforeach
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<div class="container2">
		<div class="row portfolio-container blog-grid portfolio-grid">
			
			@foreach($portfolios as $val)
			
			<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 portfolio-item {{$val->category_id}}">
                  <div class="card item android logo">
                    <div class="hvrbox">
                      <img
                        src="{{asset('public/portfolios')}}/{{$val->image}}"
                        alt=""
                        class="card-img-top img-fluid portfolio-img"
                      />
                      <div class="hvrbox-layer_top hvrbox-layer_slidedown">
                        <div class="hvrbox-text">
                          <ul class="portfolio_link">
                            <li>
                              <a
                                href="{{$val->url}}"
                                target="_blank"
                                ><i class="bx bx-world"></i
                              ></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <h4 class="s">{{$val->title}}</h4>
                    </div>
                  </div>
                </div>




			@endforeach
		</div>
	</div>
</section>
@endsection