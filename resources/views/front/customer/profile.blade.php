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
					<a href="{{route('customer.profile')}}" class="user-item {{ \Request::routeIs('customer.profile') ? 'active' : '' }}"><i class="uil uil-user"></i>Profile</a>
					<a href="dashboard_my_orders.html" class="user-item"><i class="uil uil-box"></i>My Orders</a>
					<a href="dashboard_my_rewards.html" class="user-item"><i class="uil uil-gift"></i>My Rewards</a>
					<a href="dashboard_my_wallet.html" class="user-item"><i class="uil uil-wallet"></i>My Wallet</a>
					<a href="dashboard_my_wishlist.html" class="user-item"><i class="uil uil-heart"></i>Shopping Wishlist</a>
					<a href="dashboard_my_addresses.html" class="user-item"><i class="uil uil-location-point"></i>My Address</a>
					<a href="sign_in.html" class="user-item"><i class="uil uil-exit"></i>Logout</a>
				</div>
			</div>
		</div>
		<div class="col-lg-9 col-md-8">
			<div class="dashboard-right">
				<div class="row">
					<div class="col-lg-12 col-md-12">
					@if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
						<div class="pdpt-bg">
							<div class="pdpt-title">
								<h4>Profile</h4>
							</div>
							<div class="add-cash-body">
							<form method="post" action="{{route('customer.profile.update')}}" autocomplete="off" id="user_profile">
							@csrf	
								<div class="row">
									<div class="col-lg-6 col-md-12">
										<div class="form-group mt-1">
											<label class="control-label">Name*</label>
											<div class="ui search focus">
												<div class="ui left icon input swdh11 swdh19">
													<input class="prompt srch_explore" type="text" name="name" value="{{auth()->user()->name}}" id="name" maxlength="64" placeholder="Name">															
												</div>
											</div>
										</div>
									</div> 
									<div class="col-lg-6 col-md-12">
										<div class="form-group mt-1">
											<label class="control-label">Email*</label>
											<div class="ui search focus">
												<div class="ui left icon input swdh11 swdh19">
													<input class="prompt srch_explore" type="text" name="email" value="{{auth()->user()->email}}" id="email" maxlength="64" placeholder="Email">	
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-12">
										<div class="form-group mt-1">
											<label class="control-label">Phone Number*</label>
											<div class="ui search focus">
												<div class="ui left icon input swdh11 swdh19">
													<input class="prompt srch_explore" type="text" name="phone" value="{{auth()->user()->phone}}" id="phone" maxlength="64" placeholder="Phone">															
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-12">
										<div class="form-group mt-1">
											<label class="control-label">Password*</label>
											<div class="ui search focus">
												<div class="ui left icon input swdh11 swdh19">
													<input class="prompt srch_explore" type="password" name="password" value="" id="password">

												</div>
												<div class="text-danger msg" style="display: block;"> If you don't want to change password... please leave them empty</div>
											</div>
										</div>
									</div>
								</div>
								<input type="submit" class="next-btn16 hover-btn mt-3" value="Submit"></a>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>	
</div>
@endsection