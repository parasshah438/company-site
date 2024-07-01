@extends('layouts.front')
@section('title','User Wishlist')
@section('content')
<div class="gambo-Breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
	@include('includes.user_profile')	
<div class="">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4">
				<div class="left-side-tabs">
					<div class="dashboard-left-links">
						<a href="dashboard_overview.html" class="user-item"><i class="uil uil-apps"></i>Overview</a>
						<a href="dashboard_my_orders.html" class="user-item"><i class="uil uil-box"></i>My Orders</a>
						<a href="dashboard_my_rewards.html" class="user-item"><i class="uil uil-gift"></i>My Rewards</a>
						<a href="dashboard_my_wallet.html" class="user-item"><i class="uil uil-wallet"></i>My Wallet</a>
						<a href="dashboard_my_wishlist.html" class="user-item active"><i class="uil uil-heart"></i>Shopping Wishlist</a>
						<a href="dashboard_my_addresses.html" class="user-item"><i class="uil uil-location-point"></i>My Address</a>
						<a href="sign_in.html" class="user-item"><i class="uil uil-exit"></i>Logout</a>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-8">
				<div class="dashboard-right">
					<div class="row">
						<div class="col-md-12">
							<div class="main-title-tab">
								@if(count($wishlists))
								<button type="button" onclick="removeAllFromWishlist({{ Auth::user()->id }})" class="next-btn16 hover-btn mt-3"style="float:right;"><i class="uil uil-heart" ></i> Delete All</button>
								@endif
								<h4><i class="uil uil-heart"></i>Shopping Wishlist</h4>
							</div>
						</div>								
						<div class="col-lg-12 col-md-12">
							<div class="pdpt-bg">
								<div class="wishlist-body-dtt">
									@if(count($wishlists))
									@foreach ($wishlists as $key => $wishlist)
                                	@if ($wishlist->product != null)
									<div class="cart-item" id="wishlist_{{ $wishlist->id }}">
										<div class="cart-product-img">
											<img src="{{ asset('public/product/mainimage')}}/{{$wishlist->product->thumbnail}}" alt="">
										</div>
										<div class="cart-text">
											<a href="{{ route('shopdetail', $wishlist->product->sku) }}"><h4>{{ $wishlist->product->name }}</h4></a>
											<div class="cart-item-price">₹{{ $wishlist->product->price }}</div>
											<button type="button" class="cart-close-btn"><i class="uil uil-trash-alt" onclick="removeFromWishlist({{ $wishlist->id }})"></i></button>
										</div>		
									</div>
									@endif
									@endforeach
									@else
									<div class="cart-item">
										<div class="cart-text">
											<h4>Empty Wishlist</h4>
											<div class="cart-item-price">You have no items in your wishlist. Start adding!</div>
										</div>		
									</div>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>	
</div>	
@section('scripts')
function removeFromWishlist(id){
	if (confirm("Are you sure want to remove this product from wishlist ?")) {
	    $.post('{{ route('wishlists.remove') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
	    	wishListcounter();
	        $('#wishlist').html(data);
	        $('#wishlist_'+id).hide();
	        $.notify('Item Successfully Removed From Wishlist',
	                {align:"center", verticalAlign:"top",type:"success",color: "#fff",
	                background: "#155724",delay:3000});
	        if(data.count == 0){
	        	window.location.reload();
	        }        
	    })
	}
}
@endsection
@endsection
