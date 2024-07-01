@extends('layouts.front')
@section('title','Services')
@section('content')
<div class="theme-inner-banner">
	<div class="custom-container-one">
		<h2 class="banner-title">Our Services</h2>
	</div> <!-- /.custom-container-one -->
</div>
<div class="help-articles">
	<div class="container">
		<div class="row">
			@if(count($services))
			@foreach($services as $val)
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-help-box">
					<a href="#">
						<h4>{{$val->title ? $val->title : ''}}</h4>
						<p>{!!$val->description!!}</p>
					</a>
				</div> <!-- /.single-help-box -->
			</div> <!-- /.col- -->
			@endforeach
			@endif
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</div>
@endsection