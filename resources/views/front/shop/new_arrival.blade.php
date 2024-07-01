@extends('layouts.front')
@section('title','New Arrival Products')
@section('content')
<div class="gambo-Breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('front.index')}}">Home</a></li>
						<li class="breadcrumb-item active" aria-current=>New Arrival Products</li>
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
						<h2>New Arrival Products</h2>
					</div>

					@include('front.shop.productsorting')

				</div>
			</div>
		</div>
		<div class="product-list-view">
			<div class="row">
				@if(count($products))
				@foreach($products as $product)
				<div class="col-lg-3 col-md-6">
					<div class="product-item mb-30">
						<a href="javascript:void(0);" class="product-img">
							<img src="{{ asset('public/product/mainimage/'.$product->thumbnail) }}" alt="{{$product->thumbnail}}">
							<div class="product-absolute-options">
								<span class="offer-badge-1">New</span>
								<span class="like-icon" title="wishlist"  onclick="addToWishList({{ $product->id }})"></span>
							</div>
						</a>
						<div class="product-text-dt">
							<p>Available<span>(In Stock)</span></p>
							<a href="{{route('shopdetail', $product->sku)}}">
							<h4>{{$product->name}}</h4>
							</a>
							<div class="product-price">₹ {{$product->price}}<span></span></div>
							<div class="qty-cart">
								@if(isset($product['productInventory']['qty']) && $product['productInventory']['qty'] > 0)
								<button type="button" class="add-cart-btn hover-btn add-to-cart-btn" data-productid = "{{ $product->id }}"><i class="uil uil-shopping-cart-alt"></i>Add to Cart</button>
								@else
								<button class="add-cart-btn hover-btn" disabled><i class="uil uil-shopping-cart-alt"></i>Out of Stock</button>
								@endif
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@endif
				<div class="col-md-12">
					<div class="more-product-btn">
						<button class="show-more-btn hover-btn" onclick="window.location.href = '#';">Show More</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@section('scripts')
$(document).ready(function(){
$('.add-to-cart-btn').click(function (e) {
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
        beforeSend: function() {
            $(".homeloader").show();
        },
        success: function (response) {
        	$(".homeloader").hide();
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
});
@endsection
@endsection
