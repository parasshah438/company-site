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
								<li class="breadcrumb-item active" aria-current="page">Checkout</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div class="all-product-grid">
			<div class="container">
				<div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <div id="messages"></div>
        </div>
    </div>
				<div class="row">
					<div class="col-lg-8 col-md-7">
					<form name="frmfront" id="frmfront" method="post" action="" class="form-horizontal" data-bv-message="This value is not valid"data-bv-feedbackicons-valid="glyphicon glyphicon-ok"data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
					@csrf	
						<div id="checkout_wizard" class="checkout accordion left-chck145">
							<div class="checkout-step">
								<div class="checkout-card" id="headingOne"> 
									<span class="checkout-step-number">1</span>
									<h4 class="checkout-step-title"> 
										<button class="wizard-btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Personal Information :</button>
									</h4>
								</div>
								<div id="collapseOne" class="collapse in show" data-parent="#checkout_wizard">
									<div class="checkout-step-body">
										<div class="collapse" id="edit-number">
											<div class="row">
												<div class="col-lg-8">

													
												</div>
											</div>
										</div>
										<div class="otp-verifaction">
											<div class="row">
												<div class="col-lg-6 col-md-12">
													<div class="form-group">
														<label class="control-label">Name*</label>
														<input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" value="{{auth()->user()->name}}">
													</div>
												</div>
												<div class="col-lg-6 col-md-12">
													<div class="form-group">
														<label class="control-label">Email Address*</label>
														<input id="email" name="email" type="text" placeholder="Email Address" class="form-control input-md" value="{{auth()->user()->email}}">
													</div>
												</div>
												<div class="col-lg-6 col-md-12">
													<div class="form-group">
														<label class="control-label">Phone*</label>
														<input id="phone" name="phone" type="text" placeholder="Phone number Address" class="form-control input-md" value="{{auth()->user()->phone}}">
													</div>
												</div>
											
															<div class="col-lg-6 col-md-12">
																<div class="form-group">
																	<label class="control-label">Pin Code*</label>
																	<input id="pincode" name="pincode" type="text" placeholder="Pin Code" class="form-control input-md" autofocus required data-bv-notempty-message="Name is required" data-bv-regexp="true"="true" data-bv-regexp-regexp="^[a-zA-Z\s]+$" data-bv-regexp-message="Only Alphabet allowed." maxlength="50">
																</div>
															</div>

															
															<div class="col-lg-12 col-md-12">
																<div class="form-group">
																	<label class="control-label">Address*</label>
																	<textarea id="address" name="address" placeholder="Address" class="form-control input-md" required=""></textarea>
																</div>
															</div>
															<div class="col-lg-6 col-md-12">
																<div class="form-group">
																	<label class="control-label">Country*</label>
																	<select name="country_id" id="country_id" class="form-control input-md">
																	<option value="">Select country</option>
																	@foreach($countries as $value)
																	<option value="{{$value->id}}">{{$value
																		->name}}</option>
																	@endforeach		
																	</select>
																</div>
															</div>
															<div class="col-lg-6 col-md-12">
																<div class="form-group">
																	<label class="control-label">State*</label>
																	<select id="state_id" name="state_id" class="form-control">
																    <option value=""> Choose state</option>
																      
																    </select>
																</div>
															</div>
															<div class="col-lg-6 col-md-12">
																<div class="form-group">
																	<label class="control-label">City*</label>
																	<select id="city_id" name="city_id" class="form-control">
																    <option value=""> Choose city</option>
																      
																    </select>
																</div>
															</div>
															<div class="col-lg-6 col-md-12">
																<div class="form-group">
																	<label class="control-label">Landmark / Area *</label>
																	<input id="area_name" name="area_name" type="text" placeholder="Landmark / Area" class="form-control input-md" required="">
																</div>
															</div>
															<div class="col-lg-6 col-md-12">
																<div class="form-group">
																	<label class="control-label">City*</label>
																	<select id="address_type" name="address_type" class="form-control">
																    <option value="">Choose Address Type</option>
																    <option value="home">Home</option>
																    <option value="office">Office</option>
																    <option value="other">Other</option>
																    </select>
																</div>
															</div>
							
															<div class="col-md-12">
																<div class="form-group">
																	<label class="control-label">Payment Type*</label>
														<ul class="radio--group-inline-container_1">
															<li>
																<input id="payment_method" value="cod" name="payment_method" type="radio">  Cash on Delivery	
															</li>
															<li>
																<input id="payment_method" value="razorpay" name="payment_method" type="radio">Razorpay
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="request-products">
							<div class="form-group">
								<button type="submit" id="submit" class="next-btn16 hover-btn mt-3 rqst-btn">Place Order</button>
							</div>
						</div>
					</form>	
					</div>
					<div class="col-lg-4 col-md-5">
						<div class="pdpt-bg mt-0">
							<div class="pdpt-title">
								<h4>Order Summary</h4>
							</div>
							<div class="total-checkout-group">
								<div class="cart-total-dil">
									<h4>{{$cart->items_count}} Items price</h4>
									<span>₹ {{number_format($cart->grand_total,2)}}</span>
								</div>
								<!-- <div class="cart-total-dil pt-3">
									<h4>Delivery Charges</h4>
									<span>$1</span>
								</div> -->
							</div>
							<!-- <div class="cart-total-dil saving-total ">
								<h4>Total Saving</h4>
								<span>$3</span>
							</div> -->
							<div class="main-total-cart">
								<h2>Grand Total</h2>
								<span>₹ {{number_format($cart->grand_total,0)}}</span>
							</div>
							<div class="payment-secure">
								<i class="uil uil-padlock"></i>Secure checkout
							</div>
						</div>
						<a href="#" class="promo-link45">Have a promocode?</a>
						<div class="checkout-safety-alerts">
							<p><i class="uil uil-sync"></i>100% Replacement Guarantee</p>
							<p><i class="uil uil-check-square"></i>100% Genuine Products</p>
							<p><i class="uil uil-shield-check"></i>Secure Payments</p>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>		
@section('scripts')
$(document).ready(function(){
$('#country_id').change(function(){
var country_id = $(this).val();    
if(country_id){
    $.ajax({
       type:"GET",
       url:"{{ url('get_state')}}",
       data:{country_id:country_id},
       success:function(result){               
        if(result){
            $("#state_id").empty();
            $("#state_id").append('<option>Choose state</option>');
            $.each(result,function(key,value){
                $("#state_id").append('<option value="'+value.id+'">'+value.name+'</option>');
            });
        }else{
           $("#state_id").empty();
        }
       }
    });
}else{
    $("#state_id").empty();
    }      
});

$('#state_id').change(function(){
var state_id = $(this).val();    
if(state_id){
    $.ajax({
       type:"GET",
       url:"{{ url('get_city')}}",
       data:{state_id:state_id},
       success:function(result){               
        if(result){
            $("#city_id").empty();
            $("#city_id").append('<option>Choose city</option>');
            $.each(result,function(key,value){
                $("#city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
            });
        }else{
           $("#city_id").empty();
        }
       }
    });
}else{
    $("#city_id").empty();
    }      
});

$("#frmfront").validate({
  rules: {
    pincode:{
      required: true,
    },
    email: {
      required: true,
      email:true,
    },
    address:{
      required: true,
    },
    country_id:{
      required: true,
    },
    state_id:{
      required: true,
    },
    city_id:{
      required: true,
    },
    payment_method:{
      required: true,
    },
  },
  messages: {
    name: {
      required: "Name is required",
    },
    email: {
      required: "Email is required",   
      email:"Email is not valid",
    },
    batch:{
      required:"Batch name is required",
    },
    country:{
      required:"Country is required",
    },
    city:{
      required:"City is required",
    },
    bg:{
      required:"Blood Group is required",
    },
    address:{
      required:"Address is required",
    },
    contact:{
      required:"Mobile number is required",
    },
    image:{
      required:"Image is required",
    },
    password:{
      required:"Password is required",
    },
    cpassword:{
      equalTo: "Password is not match",
    },
  },
});

 // $('body').on('click','#submits',function(e){
 //            e.preventDefault();
 //            var amount = 100;
 //            var total_amount = amount * 100;
 //            var options = {
 //                "key": "{{ env('RAZOR_KEY') }}", // Enter the Key ID generated from the Dashboard
 //                "amount": total_amount, // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
 //                "currency": "INR",
 //                "name": "NiceSnippets",
 //                "description": "Test Transaction",
 //                "image": "https://www.nicesnippets.com/image/imgpsh_fullsize.png",
 //                "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
 //                "handler": function (response){
 //                    $.ajaxSetup({
 //                        headers: {
 //                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 //                        }
 //                    });
 //                    $.ajax({
 //                        type:'POST',
 //                        url:"{{ route('store_checkout') }}",
 //                        data:{razorpay_payment_id:response.razorpay_payment_id,amount:amount},
 //                        success:function(data){
 //                            $('.success-message').text(data.success);
 //                            $('.success-alert').fadeIn('slow', function(){
 //                               $('.success-alert').delay(5000).fadeOut(); 
 //                            });
 //                            $('.amount').val('');
 //                        }
 //                    });
 //                },
 //                "prefill": {
 //                    "name": "Mehul Bagda",
 //                    "email": "mehul.bagda@example.com",
 //                    "contact": "818********6"
 //                },
 //                "notes": {
 //                    "address": "test test"
 //                },
 //                "theme": {
 //                    "color": "#F37254"
 //                }
 //            };
 //            var rzp1 = new Razorpay(options);
 //            rzp1.open();
 //        });

});
@endsection
