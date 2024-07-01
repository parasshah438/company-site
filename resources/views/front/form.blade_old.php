@extends('layouts.front')
@section('title','Home')
@section('content')


<section class="">
    <div class="container">
        <div class="row">
            <div class="accordion" id="accordionExample">

                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <?php $url = Request::segment(2); ?>
                                    @if($url == 'education')
                                    <h3 class="h3-title" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span>Student Information</span><span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
                                    @else
                                    <h3 class="h3-title" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span>Payer Information</span><span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
                                    @endif
                                </div>
                                <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">

                                <form method="post"  id="customer-details" autocomplete="off" action="" enctype="multipart/form-data">
                                @csrf        
                                        <div class="row">

                                            @if($url == 'education')
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Study In *</label>
                                            
                                            <select id="country_id" name="country_id" class="form-input">
                                                <option value="">Country</option>
                                                @if(count($countries))
                                                @foreach($countries as $val)            
                                                <option value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                                @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Institute  *</label>
                                            
                                            <select id="institute" name="institute" class="form-input">
                                                <option value="">Country</option>
                                                @if(count($countries))
                                                @foreach($countries as $val)            
                                                <option value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                                @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Paying From *</label>
                                                    <select name="resident_status" id="resident_status" class="form-input">
                                                    <option value="">Paying From</option>
                                                    <option value="studen">Student</option>
                                                    <option value="family_member">Family Member</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Family Member *</label>
                                                    <select name="source_fund" id="source_fund" class="form-input">
                                                    <option value="">Family Member</option>
                                                    <option value="Mother">Mother</option>
                                                    <option value="Father">Father</option>
                                                    <option value="Brother">Brother</option>
                                                    <option value="Sister">Sister</option>
                                                    <option value="Grand Mother">Grand Mother</option>
                                                    <option value="Grand Father">Grand Father</option>
                                                    </select>
                                                </div>
                                            </div>
                                            @endif

                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Full Name *</label>
                                                    <input type="text" name="name" id="name"  class="form-control" autocomplete="true" value="{{Auth::user()->name}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Phone Number *</label>
                                                    <input type="text" class="form-input" id="phone" name="phone" value="{{Auth::user()->phone}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Email *</label>
                                                    <input type="text" name="email" id="Email"  class="form-input" value="{{Auth::user()->email}}">
                                                </div>
                                            </div>
                                            @if($url == 'personal')
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Country *</label>
                                            
                                            <select id="country_id" name="country_id" class="form-input">
                                                <option value="">Country</option>
                                                @if(count($countries))
                                                @foreach($countries as $val)            
                                                <option value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                                @endif
                                                    </select>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-sm-4">
                                                <div class="form-box">    
                                                 <label>State</label>
                                                  <select id="state_id" name="state_id" class="form-control">
                                                    <option value=""> Choose state</option>
                                                  </select>
                                                </div>  
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>City *</label>
                                                <select id="city_id" name="city_id" class="form-control">
                                                <option value="">City</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Pan Number *</label>
                                                    <input type="text"  class="form-input"  value="" id="pan_number" name="pan_number">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Upload Pan *</label>
                                                    <input type="file" class="form-input" name="pan_card_pic" id="pan_card_pic">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Aadhar Number *</label>
                                                    <input type="text"  class="form-input"  value="" id="aadhar_number" name="aadhar_number">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Upload Aadhar *</label>
                                                    <input type="file" class="form-input" name="aadhar_pic" id="aadhar_pic">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Pin Code *</label>
                                                    <input type="text"  class="form-input"  value="" maxlength="10" name="pin_code" id="pin_code">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Date of birth *</label>
                                                    <input class="form-input"  value="" type="date" id="dob" name="dob">
                                                </div>
                                            </div>
                                              
                                            <div class="col-sm-12">
                                                <div class="form-box">
                                                <label>Address *</label>
                                                <textarea name="address" class="form-input" id="address" placeholder="Address" cols="10" rows="10"></textarea>            
                                                </div>
                                            </div>
                                            
                                            
                                            
                                              
                                            <div class="col-sm-9">
                                            <div class="form-check">
                                            <input  type="checkbox" name="customer_details_checkbox" value="" id="customer_details_checkbox">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                    I confirm that I'm a tax resident of India and not of any other country.
                                                      </label>
                                                    </div>
                                            </div>  
                                            <div class="col-sm-3 text-right">
                                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                            </div>                          
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                            <div class="card-header"
                                 id="headingOne">
                                    <h3 class="h3-title" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><span>Order Details</span> <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
                            </div>
                            <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form method="post"  id="order_detail" autocomplete="off" action="" enctype="multipart/form-data">@csrf 
                                        <div class="row">
                                           <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Transfer From *</label>
                                            
                                            <select id="transfer_from" name="transfer_from" class="form-input">
                                                <option value="">Country</option>
                                                @if(count($countries))
                                                @foreach($countries as $val)            
                                                <option value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                                @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Transfer To *</label>
                                            
                                            <select id="transfer_to" name="transfer_to" class="form-input">
                                                <option value="">Country</option>
                                                @if(count($countries))
                                                @foreach($countries as $val)            
                                                <option value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                                @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                 <label>Receiving Amount *</label>
                                                    <input type="text" name="receiving_amount" id="receiving_amount" class="form-control valid" placeholder="Sending Amount" autocomplete="true" style="display: none;" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                 <label>Sending Amount *</label>
                                                    <input type="text" name="sending_amount" id="sending_amount" class="form-control valid" placeholder="Sending Amount" autocomplete="true" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                            </div>  
                                            <div class="col-sm-3 text-right">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                        </form>
                                        
                                    </div>
                            </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h3 class="h3-title collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><span>Eligibility Check</span> <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form method="post" id="eligibility_detail" autocomplete="off" action="" enctype="multipart/form-data">@csrf        
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>PURPOSE  *</label>
                                                    <input type="text"  class="form-input" id="purpose" name="purpose" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="form-box">
                                                <label style="margin-right: 30%;">Are You An Indian Resident ? *</label>
                                                    <div class="form-check form-check-inline">
                                                  <input  type="checkbox" name="indian_resident" id="indian_resident" value="Yes" checked>
                                                  <label class="form-check-label" for="inlineCheckbox1" style="margin: 0px;">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input type="checkbox" name="indian_resident" id="indian_resident" value="No">
                                                  <label class="form-check-label" for="inlineCheckbox2" style="margin: 0px;">No</label>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                              <p>DOCUMENTS REQUIRED</p>
                                            </div>  
                                            <!-- <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Pan Card</label>
                                                <input type="file" class="form-input" name="pan_card_pic" id="pan_card_pic">
                                                </div>
                                            </div> -->
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Patient Passport Front Page</label>
                                                    <input type="file"  class="form-input" name="patient_passport_front_page" id="patient_passport_front_page">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Patient Passport Back Page</label>
                                                    <input type="file"  class="form-input" name="patient_passport_back_page" id="patient_passport_back_page">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Remitter Photo Cum Address Proof</label>
                                                    <input type="file"  class="form-input" name="remitter_photo_address_proof" id="remitter_photo_address_proof">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Medical Institute Invoice</label>
                                                    <input type="file"  class="form-input" name="medical_institute_invoice" id="medical_institute_invoice">
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                      <input  type="checkbox" name="eligibility_detail_check" value="" id="eligibility_detail_check">
                                                      <label class="form-check-label" for="flexCheckDefault">
                                                      
                                                     I confirm that I'm in possession of valid documents as per the list shown above and that I haven't bought or transfered foreign currency for more than USD 2,50,000 (or equivalent in another currency) in the current financial year.
                                                      </label>
                                                </div>
                                            </div>  
                                            <div class="col-sm-3 text-right">
                                                <button class="btn btn-success" type="submit">Submit</button>
                                            </div>                          
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingfour">
                                    <h3 class="h3-title collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour"><span>Beneficiary</span> <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
                                </div>
                                <div id="collapsefour" class="collapse show" aria-labelledby="headingfour" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <form method="post" id="beneficiary_detail" autocomplete="off" action="" enctype="multipart/form-data">@csrf 
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Recipient Name *</label>
                                                <input type="text"  class="form-input"  value="" name="recipient_name" id="recipient_name">
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-box">
                                                <label>Recipient Address *</label>
                                                <input type="text"  class="form-input"  value="" name="recipient_address" id="recipient_address">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>SWIFT CODE *</label>
                                                    <input type="text"  class="form-input"  value="" id="swift_code" name="swift_code">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Bank Account Number *</label>
                                                    <input type="number"  class="form-input"  value="" maxlength="30" id="bank_number" name="bank_number">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Bank Name  *</label>
                                                    <input type="text"  class="form-input"  value="" id="bane_name" name="bane_name">
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-box">
                                                <label>Beneficiary Bank Address *</label>
                                                    <input type="text"  class="form-input"  value="" id="bank_address" name="bank_address">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Correspondent Bank Charges *</label>
                                                    <input type="text"  class="form-input"  value="" name="bank_charges" id="bank_charges">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Additional info/Student ID/REF. No. *</label>
                                                    <input type="text"  class="form-input"  value="" id="ref_number" name="ref_number">
                                                </div>
                                            </div>  
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                  <input type="checkbox" name="beneficiary_detail_check" value="" id="beneficiary_detail_check">
                                                  <label class="form-check-label" for="flexCheckDefault">
                                                I confirm that I'm a tax resident of India and not of any other country.
                                                  </label>
                                                </div>
                                            </div>  
                                              <div class="col-sm-3 text-right">
                                                <button class="btn btn-success" type="submit">Submit</button>
                                              </div>             
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingfive">
                                    <h3 class="h3-title collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive"><span>Transfer Declarations</span> <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
                                </div>
                                <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"
                                id="headingSix">
                                    <h3 class="h3-title collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"><span>Review Order</span> <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
$(document).ready(function(){    
    $("#customer-details").validate({
      rules: {
        name:{
          required: true,
          minlength:3
        },
        email: {
          required: true,
          email:true,
        },
        phone:{
          required: true,
        },
        address:{
          required: true,
        },
        source_fund:{
          required: true,
        },
        country_id:{
          required: true,
        },
        institute:{
          required: true,
        },
        state_id:{
          required: true,
        },
        city_id:{
          required: true,
        },
        pin_code:{
            required: true,
            digits:true,
        },
        pan_number:{
            required: true,
        },
        pan_card_pic:{
            required: true,
        },
        aadhar_number:{
            required: true,
        },
        aadhar_pic:{
            required: true,
        },
        resident_status:{
            required: true,
        },
        dob:{
           required: true, 
        },
        customer_details_checkbox:{
           required:true, 
        },
      },
      messages: {
        name: {
          required: "Name is required",
          minlength:"Your username must be 3 characters long",
        },
        email: {
          required: "Email address is required",   
          email:"Email address is not valid"
        },
        phone:{
          required:"Mobile is required",
          digits: true,
        },
        address:{
          required:"Address is required",
        },
        pan_number:{
          required:"Pan Number is required",
        },
        source_fund:{
          required: "Source Fund is required",
        },
        country_id:{
          required: "Country is required",
        },
        state_id:{
          required: "State is required",
        },
        city_id:{
          required: "City is required",
        },
        pin_code:{
            required: "Pincode is required",
        },
        resident_status:{
            required: "Resident status is required",
        },
        dob:{
            required: "Date of birth is required",
        },
      },
      submitHandler: function() {
        var form = $('#customer-details')[0]; 
        var data = new FormData(form); 
        $.ajax({
          url: "{{route('upate_customer_details')}}",
          type: "POST",
          data: data,
          processData: false,
          contentType: false,
          success: function(result)
          {
            $.notify(result.message,
            {align:"center", verticalAlign:"top",type:"success",color: "#fff",
                    background: "#155724",delay:3000});
          },
          error:function(result)
          {
              alert(result);
          }, 
        });   
      }
    });

    $("#eligibility_detail").validate({
      rules: {
        purpose:{
          required: true,
        },
        indian_resident: {
          required: true,
        },
        pan_card_pic:{
          required: true,
        },
        patient_passport_front_page:{
          required: true,
        },
        patient_passport_back_page:{
          required: true,
        },
        remitter_photo_address_proof:{
          required: true,
        },
        medical_institute_invoice:{
          required: true,
        },
        eligibility_detail_check:{
           required:true, 
        },
      },
      messages: {
        purpose: {
          required: "Purpose is required",
          minlength:"Your username must be 10 characters long",
        },
        email: {
          required: "Email address is required",   
          email:"Email address is not valid"
        },
        pan_card_pic:{
          required:"Pancard is required",
        },
        patient_passport_front_page:{
          required:"Patient Passport Front Page is required",
        },
        patient_passport_back_page:{
          required:"Patient Passport Back Page is required",
        },
        remitter_photo_address_proof:{
          required: "Remitter Photo Address Proof is required",
        },
        medical_institute_invoice:{
          required: "Medical Institute Invoice is required",
        },
      },
      submitHandler: function() {
        var form = $('#eligibility_detail')[0]; 
        var data = new FormData(form); 
        $.ajax({
          url: "upate_eligibility_check",
          type: "POST",
          data: data,
          processData: false,
          contentType: false,
          success: function(result)
          {
            $.notify(result.message,
            {align:"center", verticalAlign:"top",type:"success",color: "#fff",
                    background: "#155724",delay:3000});
          },
          error:function(result)
          {
              alert(result);
          }, 
        });   
      }
    });

    $("#beneficiary_detail").validate({
      rules: {
        recipient_name:{
          required: true,
        },
        recipient_address: {
          required: true,
        },
        swift_code:{
          required: true,
        },
        bane_name:{
          required: true,
        },
        bank_number:{
          required: true,
          digits:true,
        },
        bank_address:{
          required: true,
        },
        bank_charges:{
          required: true,
        },
        ref_number:{
           required:true, 
           digits:true,
        },
        beneficiary_detail_check:{
           required:true, 
        },
      },
      messages: {
        recipient_name: {
          required: "Recipient name is required",
          minlength:"Your username must be 3 characters long",
        },
        recipient_address: {
          required: "Recipient address is required",   
        },
        swift_code:{
          required:"Swift code is required",
        },
        bane_name:{
          required:"Bank name is required",
        },
        bank_number:{
          required:"Bank number is required",
        },
        bank_address:{
          required: "Bank address is required",
        },
        bank_charges:{
          required: "Bank charges is required",
        },
        ref_number:{
          required: "Additional info/Student ID/REF.No is required",
        }
      },
      submitHandler: function() {
        var form = $('#beneficiary_detail')[0]; 
        var data = new FormData(form); 
        $.ajax({
          url: "upate_beneficiary",
          type: "POST",
          data: data,
          processData: false,
          contentType: false,
          success: function(result)
          {
            $.notify(result.message,
            {align:"center", verticalAlign:"top",type:"success",color: "#fff",
                    background: "#155724",delay:3000});
          },
          error:function(result)
          {
              alert(result);
          }, 
        });   
      }
    });

    $("#order_detail").validate({
      rules: {
        transfer_from:{
          required: true,
        },
        transfer_to: {
          required: true,
        },
        receiving_amount:{
          required: true,
          digits: true
        },
        sending_amount:{
          required: true,
          digits: true
        },
      },
      messages: {
        transfer_from: {
          required: "Country name is required",
        },
        transfer_to: {
          required: "Country name is required",   
        },
        receiving_amount:{
          required:"Receiving amount is required",
        },
        sending_amount:{
          required:"Sending amount is required",
        },
      },
      submitHandler: function() {
        var form = $('#order_detail')[0]; 
        var data = new FormData(form); 
        $.ajax({
          url: "{{route('order_detail')}}",
          type: "POST",
          data: data,
          processData: false,
          contentType: false,
          success: function(result)
          {
            if(result.status == 'success'){
            $.notify(result.message,
            {align:"center", verticalAlign:"top",type:"success",color: "#fff",
                    background: "#155724",delay:3000});
            }else{
                $.notify(result.message,
                {align:"center", verticalAlign:"top",type:"danger",color: "#fff",
                background: "#D44950",delay:4000}); 
            }
          },
          error:function(result)
          {
              alert(result);
          }, 
        });   
      }
    });
});

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
            $("#state_id").append('<option>Select state</option>');
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
            $("#city_id").append('<option>Select city</option>');
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
@endsection