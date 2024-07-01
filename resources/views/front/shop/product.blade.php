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
						<li class="breadcrumb-item active" aria-current="page">Vegetables & Fruits</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="all-product-grid">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="product-top-dt">
					<div class="product-left-title">
						<h2>Vegetables & Fruits</h2>
					</div>

					 @include('front.shop.productsorting')

				</div>
			</div>
		</div>
		<div class="product-list-view">

		</div>
	</div>
</div>
@section('scripts')

function loadProducts(){
    $(".homeloader").show();
	$.ajax({
        url:  "{{ url('/product-loading') }}",
        "type" : "GET",                
        data:{                        
           _token: '{{csrf_token()}}'
        },
        success:function(response){
           	if(response.success == '1'){                              
                $(".homeloader").hide();
               $('.product-list-view').html(response.html);
          	}                  
        },
    });
}
$(document).on('click','.add-to-cart-btn',function(e){
  var product_id = $(this).attr('data-productid');
    e.preventDefault();
    $.ajax({
        url: "{{url("/addto-cart")}}",
        method: "POST",
        data: {
            'quantity':1,
            'product_id': product_id,
            "_token": "{{ csrf_token() }}",
        },
        success: function (response) {
            if(response.success == 1){        
              $.notify(response.message,
                {align:"center", verticalAlign:"top",type:"success",color: "#fff",
                background: "#155724",delay:3000});       
                cartcountercall();  
            }
            if(response.success == 2){  
              $.notify(response.message, "error");        
            }
          
        },
    }); 
});

$(document).ready(function(){

    loadProducts();

    $(document).on("click",".load-more",function() {
          var id = $(this).data('id');

          var sortingValue = $("#sortProduct").val();
          var skipVal = $("#skipVal").val();

          $(".load-more").text("Loading...");

           $.ajax({         
               url: "{{ url('/product-load-more') }}",
               method:"POST",
               data:{
                     id:id,
                     sortingValue:sortingValue,
                     skipVal:skipVal,
                     _token: '{{csrf_token()}}'
                },
               success:function(data)
               {           
                $('#skipVal').val(data.newSkipVal);
                $('.load-more').remove();
                $('.post').append(data.html);

                    $('html, body').animate({
                    scrollTop: $(".scrollbtn").offset().top - 500
                }, 500);
               }
            })
    });
});

@endsection
@endsection
