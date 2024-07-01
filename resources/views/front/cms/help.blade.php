@extends('layouts.front')
@section('title','Help')
@section('content')
<div class="help-page-search-form">
	<div class="container">
		<div class="form-wrapper">
			<h2 class="title">How can we help you?</h2>
			<p>Browse help topics or use the search bar</p>
			<form action="#">
				<input type="text" id="search" name="search" placeholder="Search">
			</form>
		</div>
	</div>
</div>            
<div class="help-articles">
	<div class="container">
		<div class="row product-list-view">
			@if(count($help))
			@foreach($help as $val)
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-help-box">
					<a href="#">
						<h4>{{$val->title}}</h4>
						{!!$val->description!!}
					</a>
				</div> <!-- /.single-help-box -->
			</div> <!-- /.col- -->
			@endforeach
			@endif
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</div>
@endsection

@section('script')
$(document).ready(function(){

$('#search').on('keyup', function(){
			var search = $(this).val();			
			$.ajax({
                url:  "{{ url('/search') }}",
                "type" : "POST",                
                data:{             
                   search:search,	           
                   _token: '{{csrf_token()}}'
                },
                success:function(response){
                   	if(response.success == '1'){   
                   		 $(".homeloader").hide();                    
                       $('.product-list-view').html(response.html);
                  	}                  
                },
           });
		});
});		
@endsection
