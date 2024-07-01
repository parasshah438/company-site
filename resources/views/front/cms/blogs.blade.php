@extends('layouts.front')
@section('title','Home')
@section('content')
<div class="theme-inner-banner">
	<div class="custom-container-one">
		<h2 class="banner-title">OUR BLOG</h2>
		<p>Latest News Feed</p>
	</div> <!-- /.custom-container-one -->
</div>
<section class="main-our-blog">
		<div class="container">
			<div class="main-blog-slider">
				<div class="row blog-slider">
					@if(count($blog))
					@foreach($blog as $val)
					<div class="col-lg-4">
                        <div class="blog-box wow fadeup-animation" data-wow-delay="0.4s">
                            <div class="blog-img-box">
                                <div class="blog-img back-img" style="background-image:url('public/images/blog/<?php echo $val->image; ?>')"></div>
                                <div class="blog-date">
                                    <a href="javascript:void(0);" title="7 March, 2021"><i class="fa fa-calendar" aria-hidden="true"></i>{{date("d M, Y", strtotime($val->created_at))}}
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <h3 class="h3-title"><a href="#" title="Blog title">{{$val->title}}</a></h3>
                                <a href="#" title="READ MORE">READ MORE <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
					@endif
				</div>
			</div>
		</div>
	</section>
@endsection
