@extends('layouts.front')
@section('title','Home')
@section('content')
<div class="gambo-Breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="all-product-grid">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="panel-group accordion" id="accordion0">
					@foreach($allCategories as $value)					
					<div class="panel panel-default">
						<div class="panel-heading" id="headingOne">
							<div class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-target="#{{$value->slug}}" href="#" aria-expanded="false" aria-controls="{{$value->slug}}">
								<span class="iconify" data-icon="carbon:category" data-inline="false"></span>{{$value->name}}
								</a>
							</div>
						</div>
						<div id="{{$value->slug}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion0" style="">
							<div class="panel-body">
							@foreach($value->subCategory as $tag) 
				               	<div class="color-pink">{{ $tag['name'] }}</div>
				       		@endforeach
							</div>
						</div>
					</div>
					@endforeach				
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
