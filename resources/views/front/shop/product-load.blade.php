<div class="row post">

				@if($totalProducts > 0)
				@foreach($products->chunk(4) as $chunk)
					  @foreach($chunk as $product)
				<div class="col-lg-3 col-md-6">
					<div class="product-item mb-30">
						<a href="{{ route('shopdetail', $product->sku) }}" class="product-img">
							<img src="{{ asset('public/product/mainimage/'.$product->thumbnail) }}" alt="">
							<div class="product-absolute-options">
								<span class="offer-badge-1">2% off</span>
								<span class="like-icon" title="wishlist" onclick="addToWishList({{ $product->id }})"></span>
							</div>
						</a>
						<div class="product-text-dt">
							<p>Available<span>(In Stock)</span></p>
							<h4>{{ $product->name }} {{ $product->sku }}</h4>
							<div class="product-price">₹ {{ $product->price }} <span>$13</span></div>
							
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
				 @if($loop->last) 
				 	@php 
				 	$lastid = $product->id 
				 	@endphp
				 @endif
				 @endforeach
			 	@endforeach

			
				<div class="col-md-12">
					<div class="more-product-btn">
						@if($totalProducts > 8)
						<button class="show-more-btn hover-btn load-more" data-id="{{ $lastid }}" onclick="window.location.href = '#';">Load More</button>
						<input type="hidden" name="skipVal" id="skipVal" value="8">
						@endif
					</div>
				</div>
				@else
				<div class="col-md-12">
					<div class="more-product-btn contact-title">
						No Products Added
					</div>
				</div>

				@endif

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
});
@endsection
