@extends('layouts.front')
@section('title','Home')
@section('content')
<div class="gambo-Breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Home</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Checkout</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="all-product-grid">
	<div class="container">
		<div class="row">
			@if($totalcart > 0 )
			<div class="col-lg-8 col-md-7">
			@else
			<div class="col-lg-12 col-md-7">
			@endif
				<div id="checkout_wizard" class="checkout accordion left-chck145">
					<div class="checkout-step">
						<div class="row">
							@if( $totalcart > 0 )
							<div class="pdpt-title">
							<h3>My Cart 
							(@if( $totalcart > 0 ) {{$cart_total->items_count}} @else 0 @endif)</h3>
							</div>
							@endif
							<div class="col-lg-12 col-md-12">							
								<div class="pdpt-bg">
									<div class="active-offers-body">
										<div class="table-responsive">
											<table class="table ucp-table earning__table">
												@if( $totalcart > 0 )
												<thead class="thead-s">
													<tr>
														<th scope="col"></th>
														<th scope="col">Product</th>
														<th scope="col">Price</th>
														<th scope="col">Quantity</th>
														<th scope="col">Total</th>
														<th scope="col"></th>
													</tr>
												</thead>
												<tbody>
											    
	                                    		@foreach ($cart_details as $carts)		
													<tr>
														<td>
															<div class="cart-product-img">
																<img src="{{ asset('public/product/mainimage/'.$carts->thumbnail) }}" alt="">
																<div class="offer-badge">4% OFF</div>
															</div>
														</td>
														<td>
															<h4>{{ $carts->name }}</h4>	
														</td>
														<td>
															<h4><div class="cart-item-price">₹ {{ $carts->price }}</div></h4>	
														</td>
														 <td class="gg" style="display:none;"> {{ $carts->prodid }}</td>
				                                        <input type="hidden" class="fproduct_id" value="{{ $carts->prodid }}"> 

				                                        <td class="citemid" style="display:none;"> {{ $carts->citemid }}</td>

														<td class="qty">                          
															<div class="qty-group">
																<div class="quantity buttons_added">
																	<input type="button" value="-" class="minus minus-btn">
																	<input type="number" step="1" class="input-text qty text"
																	name="qtydata" id="qtydata" 
																	value="{{ $carts->quantity }}" min="1">
																	<input type="button" value="+" class="plus plus-btn">
																</div>
															</div>
														</td>
														<td>
															<h4><div class="cart-item-price price settotalcls{{ $carts->citemid }}">₹ {{ $carts->total }}</div></h4>	
														</td>
														<td>
															<a href="#" class="cart-close delete_cart_data">	<i class="uil uil-trash-alt"></i>
															</a>
														</td>
													</tr>
												@endforeach
				                                @else

				    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
				                                <tr><td colspan="7" class="aligncenter"><strong>Your cart is empty 😧</strong></td></tr>
				                                @endif											
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@if($totalcart > 0)
			<div class="col-lg-4 col-md-5">
				<div class="pdpt-bg mt-0">
						<div class="pdpt-title">
							<h4>Order Summary</h4>
						</div>
						<div class="total-checkout-group">
							<div class="cart-total-dil">
								<h4>GNGHUBS Gift N Grocery Hubs</h4>
								<span>$15</span>
							</div>
							<div class="cart-total-dil pt-3">
								<h4>Delivery Charges</h4>
								<span>$1</span>
							</div>
						</div>
						<div class="cart-total-dil saving-total">
							<h4>Total Saving</h4>
							<span>$3</span>
						</div>
						<div class="main-total-cart">
							<h2>Total</h2>
							<span class="s_total">₹ {{ $cart_total->sub_total }} </span>
						</div>	
				</div>
				<div class="request-products">
					<div class="form-group">
						<a href="{{route('checkout')}}"><button class="next-btn16 hover-btn mt-3 rqst-btn" type="submit">Check Out</button></a>
						
					</div>
				</div><a href="{{route('front.index')}}" class="promo-link45">Continue shopping</a>
			</div>
			@else
			<div class="col-lg-12">
				<div class="request-products">
				</div><a href="{{route('front.index')}}" class="promo-link45">Continue shopping</a>
			</div>
			@endif
		</div>
	</div>
</div>
@section('scripts')
function setquantity(quantity,product_id,cartitemid){

        /*alert(quantity);
        alert(product_id);*/
         $.ajax({               
            url: "{{url("/updatequantity")}}",
            method: "POST",                
            data: {
                'quantity': quantity,
                'product_id': product_id,      
                'cartitemid':cartitemid,
               	"_token": "{{ csrf_token() }}",              
            },
            success: function (response) {
               if(response.success == 1){  
                var cart_id = response.cartitemid;
                var totalcls = $('.settotalcls'+cart_id);
                $('.g_total').text(response.g_total);
                $('.s_total').text(response.s_total);         
                totalcls.text(response.itemwise_total);         
                        
                //window.location.reload();
                }
            }
        });
}
$(document).on('click','.plus-btn',function(){
        var quantity = $(this).prev().val();               
        var product_id =  $(this).parents('tr').find('.gg').text();
        var citemid =  $(this).parents('tr').find('.citemid').text();
        setquantity(quantity,product_id,citemid);
});
$(document).on('click','.minus-btn',function(){
        var quantity = $(this).next().val();
        var product_id =  $(this).parents('tr').find('.gg').text();
        var citemid =  $(this).parents('tr').find('.citemid').text();
        setquantity(quantity,product_id,citemid);        
});

$(document).ready(function(){
    $("#qtydata").on("keypress keyup",function(){
        if($(this).val() == '0'){
          $(this).val('');  
        }
    });
    $("#qtydata").keypress(function (event) {
       $(this).val($(this).val().replace(/[^\d].+/, ""));
                if ((event.which < 48 || event.which > 57)) {
                    event.preventDefault();
                }
    });
    $(document).on('keyup', '#qtydata', function(e){
            e.preventDefault();           
            var quantity = $(this).val();            
            var product_id =  $(this).parents('tr').find('.gg').text();
            var citemid =  $(this).parents('tr').find('.citemid').text();
            
            setquantity(quantity,product_id,citemid);
    });
	$('.delete_cart_alldata').click(function (e) {
	    e.preventDefault();

	    $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
	    $.ajax({               
	        url: "{{url("/delete-allfrom-cart")}}",
	        method: "POST",                                
	        success: function (response) {
	         
	           if(response.success == 1){                 
	              window.location.reload();                       
	              $.notify(response.message, "success");          
	            }
	        }
	    });
	});

  	$('.delete_cart_data').click(function (e) {
            e.preventDefault();

            $(this).closest('tr').remove();     
            var product_id =  $(this).parents('tr').find('.gg').text();
            var citemid =  $(this).parents('tr').find('.citemid').text();
            var quantity = $(this).parents('tr').find('#qtydata').val();      
            
            var data = {                               
                "citemid": citemid,
                "product_id": product_id,
                "_token": "{{ csrf_token() }}",              
            };

            $.ajax({               
                url: "{{url("/delete-from-cart")}}",
                method: "POST",                
                data: data,
                success: function (response) {
                   cartcountercall();	
                   if(response.success == 1){                  
                    var cart_id = response.cartitemid;
                    var totalcls = $('.settotalcls'+cart_id);
                    $('.g_total').text(response.g_total);
                    $('.s_total').text(response.s_total);    
                    $('.itmqty').text(response.itmqty);      
                    $.notify(response.message,
                	{align:"center", verticalAlign:"top",type:"success",color: "#fff",
                	background: "#155724",delay:3000}); 
                	if(response.count == 0){
        				window.location.reload();
        			}
                    }
                }
            });       
    });      
});
@endsection
@endsection
