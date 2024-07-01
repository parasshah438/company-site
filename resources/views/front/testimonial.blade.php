@extends('layouts.front_plain')
@section('title','Home')
@section('content')
<div class="theme-inner-banner">
	<div class="custom-container-one">
		<h2 class="banner-title">Testimonial</h2>
	</div>
</div>
<section class="login-signup">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <nav class="comment-log-reg-tabmenu">
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
        </nav>

        
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade active show" id="nav-log" role="tabpanel" aria-labelledby="nav-log-tab">
                <div class="login-area">
                <div class="header-area">
                    <h4 class="title">Add Testimonial</h4>
                </div>
                <div class="login-form signin-form">
                <form name="frmfront" id="frmfront" method="post" action="{{ route('testimonial.store') }}" class="form-horizontal" data-bv-message="This value is not valid"data-bv-feedbackicons-valid="glyphicon glyphicon-ok"data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" autocomplete="off" enctype="multipart/form-data">@csrf


                <div class="row">
	      			<div class="col-md-6">	
	                  <div class="form-group form-input">
	                    <input id="name" type="text" class="form-control lgn_input set_user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus autofocus placeholder="Enter Name" autocomplete="email" required data-bv-notempty-message="Name is required">
	                    
	                  </div>
	                </div>
	                <div class="col-md-6">
	                	<div class="form-group form-input">
	                    <input id="image" type="file" class="form-control lgn_input set_user @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autocomplete="email" required data-bv-notempty-message="Image is required">
                    	
	                  </div>
	                </div>
                </div>

               
                <div class="row">
                	<div class="col-md-12">	
	                  <div class="form-group form-input">
	                    <textarea id="description" type="text" class="form-control" cols="5" rows="5" name="description" required autocomplete="description" placeholder="Enter your description" required data-bv-notempty-message="Description is required"></textarea>
	                   
	                  </div>
	                </div>
	                
                </div> 
                    <button type="submit" class="sec-btn">
                    <span>Submit</span>
                    </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
