@extends('layouts.front')
@section('title','Home')
@section('content')


<section class="main-portfolio-details">
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
                                            
                                            @if($url == 'personal')
                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Full Name *</label>
                                                    <input type="text" class="form-input" id="name" name="name" value="{{Auth::user()->name}}" maxlength="15">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Phone No *</label>
                                                    <input type="text" class="form-input" id="phone" name="phone" value="{{Auth::user()->phone}}" maxlength="15">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Email *</label>
                                                    <input type="text" class="form-input" id="email" name="email" value="{{Auth::user()->email}}" maxlength="15">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Purpose  *</label>
                                            
                                            <select id="purpose" name="purpose" class="form-control form-input">
                                                <option value="">Purpose</option>
                                                <option value="Living Exprense">Living Expense</option>
                                            </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Country *</label>
                                            
                                            <select id="country_id" name="country_id" class="form-input">
                                                <option value="">Country</option>
                                                @if(count($countries))
                                                @foreach($countries as $val)            
                                                <option value="{{$val->id}}" @if(Auth::user()->country_id == $val->id)selected @endif>{{$val->name}}</option>
                                                @endforeach
                                                @endif
                                                    </select>
                                                </div>
                                            </div>
                                            
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

                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Address *</label>
                                                    <textarea type="text"  class="form-input" id="address" name="address">{{Auth::user()->address}}</textarea>
                                                </div>
                                            </div>

                                            @endif

                                            @if($url == 'education')
                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Student Name *</label>
                                                    <input type="text" class="form-input" id="student_name" name="student_name" value="{{Auth::user()->student_name}}" maxlength="15">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Father Name *</label>
                                                    <input type="text" class="form-input" id="student_father" name="student_father" value="{{Auth::user()->student_father}}" maxlength="15">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Student Phone no *</label>
                                                    <input type="text" class="form-input" id="student_mobile" name="student_mobile" value="{{Auth::user()->student_mobile}}" maxlength="15">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Student Email *</label>
                                                    <input type="text" class="form-input" id="student_email" name="student_email" value="{{Auth::user()->student_email}}" maxlength="15">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Study In *</label>
                                            <select id="study_in" name="study_in" class="form-input">
                                                <option value="">Studt In</option>
                                                @if(count($countries))
                                                @foreach($countries as $val)            
                                                <option value="{{$val->id}}"
                                                @if(101 == $val->id)selected @endif>{{$val->name}}</option>
                                                @endforeach
                                                @endif
                                                    </select>
                                                </div>
                                            </div>




                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Colleges/university  *</label>
                                            <select id="institute" name="institute" class="form-control form-input select2"
                                            style="width:300px;">
                                                <option value="">Colleges/university</option>
                                                @if(count($university))
                                                @foreach($university as $val)            
                                                <option value="{{$val->id}}" @if(Auth::user()->institute == $val->id)selected @endif>{{$val->name}}</option>
                                                @endforeach
                                                @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Purpose  *</label>
                                            
                                            <select id="student_purpose" name="student_purpose" class="form-control form-input">
                                                <option value="">Purpose</option>
                                                <option value="GIV">GIC</option>
                                                <option value="TUITION FEES">TUITION FEES</option>        
                                                <option value="FTS PAYMENT">FTS PAYMENT</option>
                                                <option value="APPLICATION FEES">APPLICATION FEES</option>
                                                <option value="BLOCKED ACCOUNT TRANSFER">BLOCKED ACCOUNT TRANSFER</option>
                                            </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Student Id *</label>
                                                    <input type="text" class="form-input" id="student_id" name="student_id" value="{{Auth::user()->student_id}}" maxlength="15">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-box">
                                                <label>Course start *</label>
                                                    <input class="form-input"  value="{{Auth::user()->course_start}}" type="date" id="course_start" name="course_start">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-box">
                                                <label>Course End *</label>
                                                    <input class="form-input"  value="{{Auth::user()->course_end}}" type="date" id="course_end" name="course_end">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>OFFER LETTER *</label>
                                                    <input type="file" class="form-input"  value="" id="student_offer_letter" name="student_offer_letter">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Passport No *</label>
                                                    <input type="text" class="form-input" id="student_passport" name="student_passport" value="{{Auth::user()->student_passport}}" maxlength="15">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Upload Passport *</label>
                                                    <input type="file" class="form-input" id="student_passport_image" name="student_passport_image" value="{{Auth::user()->student_passport_image}}" maxlength="15">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Date of issue *</label>
                                                    <input type="date" class="form-input" id="date_of_issue" name="date_of_issue" value="{{Auth::user()->date_of_issue}}" maxlength="15">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Date of expiry *</label>
                                                    <input type="date" class="form-input" id="date_of_expiry" name="date_of_expiry" value="{{Auth::user()->date_of_expiry}}" maxlength="15">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Place of issue *</label>
                                                    <input type="text" class="form-input" id="place_of_issue" name="place_of_issue" value="{{Auth::user()->place_of_issue}}" maxlength="15">
                                                </div>
                                            </div>
                                            @endif
                                            @if($url == 'personal')
                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Aadhar Number *</label>
                                                    <input type="text"  class="form-input"  value="{{Auth::user()->aadhar_number}}" id="aadhar_number" name="aadhar_number" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Upload Aadhar *</label>
                                                    <input type="file" class="form-input" name="aadhar_pic" id="aadhar_pic">
                                                </div>
                                            </div>
                                            @endif

                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Pan Number *</label>
                                                    <input type="text"  class="form-input"  value="{{Auth::user()->pan_number}}" id="pan_number" name="pan_number" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Upload Pan *</label>
                                                    <input type="file" class="form-input" name="pan_card_pic" value="ksjdbkj" id="pan_card_pic">
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
                            @if($url == 'education')
                            <div class="card">
                                <div class="card-header" id="headingfour">
                                    <h3 class="h3-title collapsed" data-toggle="collapse" data-target="#collapsefour-Remitter" aria-expanded="false" aria-controls="collapsefour"><span>Remitter Details</span> <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
                                </div>
                                <div id="collapsefour-Remitter" class="collapse show" aria-labelledby="headingfour" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <form method="post" id="beneficiary_detail" autocomplete="off" action="" enctype="multipart/form-data">@csrf 
                                        <div class="row">
                                            
                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Paying From *</label>
                                                    <select name="resident_status" id="resident_status" class="form-input">
                                                    <option value="">Paying From</option>
                                                    <option value="studen" @if(Auth::user()->resident_status == 'studen')selected @endif>Student</option>
                                                    <option value="family_member" @if(Auth::user()->resident_status == 'family_member')selected @endif>Family Member</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 source_fund">
                                                <div class="form-box">
                                                <label>Family Member *</label>
                                                    <select name="source_fund" id="source_fund" class="form-input">
                                                    <option value="">Family Member</option>
                                                    <option value="Mother" @if(Auth::user()->source_fund == 'Mother')selected @endif>Mother</option>
                                                    <option value="Father" @if(Auth::user()->source_fund == 'Father')selected @endif>Father</option>
                                                    <option value="Brother" @if(Auth::user()->source_fund == 'Brother')selected @endif>Brother</option>
                                                    <option value="Sister">Sister</option>
                                                    <option value="Grand Mother" @if(Auth::user()->source_fund == 'Grand Mother')selected @endif>Grand Mother</option>
                                                    <option value="Grand Father" @if(Auth::user()->source_fund == 'Grand Father')selected @endif>Grand Father</option>
                                                    </select>
                                                </div>
                                            </div>
                                        

                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Full Name*</label>
                                                    <input type="text" name="name" id="name"  class="form-control" autocomplete="true" value="{{Auth::user()->name}}" maxlength="50">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Father Name *</label>
                                                    <input type="text" name="father_name" id="father_name"  class="form-control" autocomplete="true" value="{{Auth::user()->father_name}}" maxlength="50">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-box">
                                                <label>Date of birth *</label>
                                                    <input class="form-input"  value="{{Auth::user()->beneficiary_dob}}" type="date" id="beneficiary_dob" name="beneficiary_dob">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Country *</label>
                                            
                                            <select id="country_id" name="country_id" class="form-input">
                                                <option value="">Country</option>
                                                @if(count($countries))
                                                @foreach($countries as $val)            
                                                <option value="{{$val->id}}" @if(Auth::user()->country_id == $val->id)selected @endif>{{$val->name}}</option>
                                                @endforeach
                                                @endif
                                                    </select>
                                                </div>
                                            </div>
                                            
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
                                                <label>Phone number *</label>
                                                <input type="text"  class="form-input"  value="{{Auth::user()->remitter_phone}}" name="remitter_phone" id="remitter_phone" maxlength="20">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Address *</label>
                                                    <textarea type="text"  class="form-input" id="remitter_address" name="remitter_address">{{Auth::user()->remitter_address}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Pan Number *</label>
                                                    <input type="text"  class="form-input"  value="{{Auth::user()->remitter_pan_number}}" id="remitter_pan_number" name="remitter_pan_number" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Upload Pan *</label>
                                                    <input type="file" class="form-input" name="remitter_pan_card_pic" value="ksjdbkj" id="remitter_pan_card_pic">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Aadhar Number *</label>
                                                    <input type="text"  class="form-input"  value="{{Auth::user()->remitter_aadhar_number}}" id="remitter_aadhar_number" name="remitter_aadhar_number" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Upload Aadhar *</label>
                                                    <input type="file" class="form-input" name="remitter_aadhar_pic" id="remitter_aadhar_pic">
                                                </div>
                                            </div>





                                            
                                            @if($url == 'personal')
                                            
                                            <div class="col-sm-4">
                                                <div class="form-box">    
                                                 <label>State</label>
                                                  <select id="beneficiary_state_id" name="beneficiary_state_id" class="form-control">
                                                    <option value=""> Choose state</option>
                                                  </select>
                                                </div>  
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>City *</label>
                                                <select id="beneficiary_city_id" name="beneficiary_city_id" class="form-control">
                                                <option value="">City</option>
                                                </select>
                                                </div>
                                            </div>

                                            
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>A/C NO. / IBAN CODE *</label>
                                                    <input type="text"  class="form-input"  value="{{Auth::user()->bank_number}}" maxlength="20" id="bank_number" name="bank_number" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Swift Code *</label>
                                                    <input type="text"  class="form-input"  value="{{Auth::user()->swift_code}}" maxlength="100" id="swift_code" name="swift_code" maxlength="20">
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Country Iban No *</label>
                                                    <input type="input"  class="form-input"  value="{{Auth::user()->iban_number}}" id="iban_number" name="iban_number">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Upload Beneficiary Visa *</label>
                                                    <input type="file"  class="form-input"  value="" id="visa_image" name="visa_image">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Upload Beneficiary Passport *</label>
                                                    <input type="file" class="form-input"  value="" id="passport_image" name="passport_image">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>UPLOAD BENEFICIARY OFFER LETTER *</label>
                                                    <input type="file" class="form-input"  value="" id="offer_letter_image" name="offer_letter_image">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>UPLOAD BENEFICIARY PAN CARD *</label>
                                                    <input type="file" class="form-input"  value="" id="pan_card_image" name="pan_card_image">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>UPLOAD 3 YEAR ITR *</label>
                                                    <input type="file" class="form-input"  value="" id="itr_detail" name="itr_detail">
                                                </div>
                                            </div>
                                            @endif  
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                  <input type="checkbox" name="beneficiary_detail_check" value="" id="beneficiary_detail_check">
                                                  <label class="form-check-label" for="flexCheckDefault">
                                                I confirm that I'm a tax resident of India and not of any other country.
                                                  </label>
                                                </div>
                                            </div>  
                                            <div class="col-md-12  text-right">
                                                <button class="btn btn-success" type="submit">Submit</button>
                                            </div>             
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            @endif


                            <div class="card">
                                <div class="card-header" id="headingfour">
                                    <h3 class="h3-title collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour"><span>Beneficiary Details</span> <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
                                </div>
                                <div id="collapsefour" class="collapse show" aria-labelledby="headingfour" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <form method="post" id="beneficiary_detail" autocomplete="off" action="" enctype="multipart/form-data">@csrf 
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Currency</label>
                                                <input type="text"  class="form-input"  value="{{Auth::user()->currency}}" name="currency" id="currency">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Amount</label>
                                                <input type="text"  class="form-input"  value="{{Auth::user()->amount}}" name="amount" id="amount">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-box">
                                                <label>Full name *</label>
                                                <input type="text"  class="form-input"  value="{{Auth::user()->beneficiary_user_name}}" name="beneficiary_user_name" id="beneficiary_user_name" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Address *</label>
                                                    <textarea type="text"  class="form-input" id="beneficiary_address" name="beneficiary_address">{{Auth::user()->beneficiary_address}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Bank Name *</label>
                                                    <input type="text"  class="form-input"  value="{{Auth::user()->bane_name}}" maxlength="100" id="bane_name" name="bane_name" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Bank Address *</label>
                                                    <textarea type="text"  class="form-input"name="bank_address" id="bank_address">{{Auth::user()->bank_address}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>A/C NO. / IBAN CODE *</label>
                                                    <input type="text"  class="form-input"  value="{{Auth::user()->iban_number}}" maxlength="20" id="iban_number" name="iban_number" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Swift Code *</label>
                                                    <input type="text"  class="form-input"  value="{{Auth::user()->swift_code}}" maxlength="100" id="swift_code" name="swift_code" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Wire Code *</label>
                                                    <input type="text"  class="form-input"  value="{{Auth::user()->wire_code}}" maxlength="100" id="wire_code" name="wire_code" maxlength="20">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Country *</label>
                                            
                                            <select id="beneficiary_country_id" name="beneficiary_country_id" class="form-input">
                                                <option value="">Country</option>
                                                @if(count($countries))
                                                @foreach($countries as $val)            
                                                <option value="{{$val->id}}" @if(Auth::user()->beneficiary_country_id == $val->id)selected @endif>{{$val->name}}</option>
                                                @endforeach
                                                @endif
                                                    </select>
                                                </div>
                                            </div>

                                            @if($url == 'education')
                                            <div class="col-sm-6">
                                                <div class="form-box">
                                                <label>Purpose *</label>
                                                    <select name="purpose" id="purpose" class="form-input">
                                                    <option value="">Purpose</option>
                                                    <option value="Post Study"  @if(Auth::user()->purpose == 'Post Study')selected @endif>Post Study</option>
                                                    <option value="In Study"  @if(Auth::user()->purpose == 'In Study')selected @endif>In Study</option>
                                                    </select>
                                                </div>
                                            </div>
                                            @endif


                                            @if($url == 'personal')
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Pan number *</label>
                                                    <input type="number"  class="form-input"  value="{{Auth::user()->beneficiary_pan_number}}" id="beneficiary_pan_number" name="beneficiary_pan_number">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Passport No *</label>
                                                    <input type="number"  class="form-input"  value="{{Auth::user()->beneficiary_passport_no}}" id="beneficiary_passport_no" name="beneficiary_passport_no">
                                                </div>
                                            </div>
                                        
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Upload Beneficiary Visa *</label>
                                                    <input type="file"  class="form-input"  value="" id="visa_image" name="visa_image">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>Upload Beneficiary Passport *</label>
                                                    <input type="file" class="form-input"  value="" id="passport_image" name="passport_image">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>UPLOAD BENEFICIARY OFFER LETTER *</label>
                                                    <input type="file" class="form-input"  value="" id="offer_letter_image" name="offer_letter_image">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-box">
                                                <label>UPLOAD BENEFICIARY PAN CARD *</label>
                                                    <input type="file" class="form-input"  value="" id="pan_card_image" name="pan_card_image">
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                  <input type="checkbox" name="beneficiary_detail_check" value="" id="beneficiary_detail_check">
                                                  <label class="form-check-label" for="flexCheckDefault">
                                                I confirm that I'm a tax resident of India and not of any other country.
                                                  </label>
                                                </div>
                                            </div>  
                                            <div class="col-md-12  text-right">
                                                <button class="btn btn-success" type="submit">Submit</button>
                                            </div>             
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingfour">
                                    <h3 class="h3-title collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                        <span>Annexure Form</span> <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
                                </div>

                                <div id="collapsefive" class="collapse show" aria-labelledby="headingfour" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <form method="post" id="annexure_detail" autocomplete="off" enctype="multipart/form-data">@csrf
                                       
                                       
                                       
                                       
    <div class="text-center head m-3 ">
        <div style="float: right;">Annexure A-1</div><br>    
        <p class="p1 mt-1">
        FORM A2 and Application cum Declaration for purchase of foreign exchange under Liberalized Remittance Scheme (LRS) as amended
        <br>by RBI vide Master Direction-LRS dated June 20, 2018 for INDIAN PASSPORT HOLDER
        <br>(To be completed by the applicant in BLOCK letters)</p>
    </div>
    <div class="ds mt-2">
        Date:<input type="date" name="form_date" id="form_date"><br><br>
        <p>The Branch Manager<br>EBIXCASH World Money Limited<br>Pitampura Branch</p>
        <p>Dear Sir,</p>
        <div class="dropdown">
            <div class="input-group m-2">
                <label for="">Subject: &nbsp</label>
                <select class="form-select" id="inputGroupSelect01" name="subject_derail">
                    <option value="">Choose...</option>
                    <option value="Overseas Education">Overseas Education</option>
                </select>
            </div>
        </div>
    </div>
    <div class="p1 mt-3" style="float: left;">
        <p> With reference to the above I request you to release foreign exchange for the purpose mentioned above and furnish the following details:<br></p>
    </div>
    <div class="details" style="clear: both;">
        <p class="p1 mt-3" ><b>1. Details of Applicant / Remitter</b></p>
        <div class="row g-3">
            <div class="col-md">
                <label for="Name">Name:</label>
                <input type="text" class="form-control" placeholder="Applicant name" aria-label="name" name="name" value="{{Auth::user()->name}}" maxlength="50">
            </div>
            <div class="col-md">
               <label for="date">Date of Birth :</label>
               <input type="date" name="dob" class="form-control" value="{{Auth::user()->dob}}">
            </div>
        </div>
        <div class="row mt-1 g-6">
            <div class="col-md">
            <label for="date">Address :</label>
            <input type="textarea" name="address" class="form-control" value="{{Auth::user()->address}}">
        </div>
        </div>
        <div class="row mt-1 g-3">
            <div class="col-md">
                <label for="">Mobile No.:</label>
                <input type="text" class="form-control" placeholder="Mobile" value="{{Auth::user()->phone}}" name="phone" maxlength="15">
            </div>
            <div class="col-md">
                <label for="Name">Email:</label>
                <input type="email" class="form-control" placeholder="Email" value="{{Auth::user()->email}}" name="email" maxlength="20">
            </div>
        </div>
        <div class="row mt-1 g-3">
            <div class="col-md">
                <label for="Name">Nationality:</label>
                <input type="text" name="nationality" class="form-control" placeholder="Nationality" maxlength="20" >
            </div>
            <div class="col-md">
                <label for="Name">Residential Status:</label>
                <input type="text" name="residential_status" class="form-control" placeholder="Residential Status" maxlength="20">
            </div>
        </div>
        <div class="row mt-1 g-3">
            <div class="col-md">
                <label for="Name">PAN NO.:</label>
                <input type="text" class="form-control" placeholder="" value="{{Auth::user()->pan_number}}" name="pan_number" maxlength="20">
            </div>
            <div class="col-md">
                <label for="Name">Aadhaar (UID/EID) No.:</label>
                <input type="text" class="form-control" placeholder="" value="{{Auth::user()->aadhar_number}}" name="aadhar_number" maxlength="20">
            </div>
        </div>
        <div class="row mt-1 g-3">
            <div class="col-md">
                <label for="Name">Passport No.:</label>
                <input type="text" class="form-control" name="passport" placeholder="" maxlength="50">
            </div>
            <div class="col-md">
                <label for="Name">Date of issue:</label>
                <input type="date" class="form-control" name="date_of_issue" placeholder="">
            </div>
            <div class="col-md">
                <label for="Name">Date of expiry:</label>
                <input type="date" class="form-control" name="date_of_expiry" placeholder="">
            </div>
            <div class="col-md">
                <label for="Name">Place of Issue:</label>
                <input type="text" class="form-control" name="place_of_issue" placeholder="" maxlength="50">
            </div>
        </div>

        <p class="p1 mt-5" > <b>2. Details of Person on whose behalf remittance is being made only under overseas education</b></p>
        <div class="row mt-1 g-3">
            <div class="col-md">
                <label for="Name">Student Name:</label>
                <input type="text" class="form-control" name="student_name" placeholder="" maxlength="20">
            </div>
            <div class="col-md">
                <label for="Name">Passport No.:</label>
                <input type="text" class="form-control" name="student_passport" placeholder="" maxlength="20">
            </div>
        </div>
        <div class="row mt-1 g-3">
            <div class="col-md">
                <label for="Name">Aadhaar (UID/EID) No.:</label>
                <input type="text" class="form-control" placeholder="" name="studen_aadhaar" maxlength="20">
            </div>
            <div class="col-md">
                <label for="Name">College/University:</label>
                <input type="text" class="form-control" name="student_college" placeholder="" maxlength="50">
            </div>
        </div>
        <div class="row mt-1 g-3">
            <div class="col-md">
                <label for="Name">Academic Year:</label>
                <input type="text" class="form-control" name="student_academic_year" placeholder="" maxlength="10">
            </div>
            <div class="col-md">
                <label for="Name">City/Country:</label>
                <input type="text" class="form-control" name="student_city_country" placeholder="" maxlength="50">
            </div>
            <div class="col-md">
                <label for="Name">Date of Travel:</label>
                <input type="date" class="form-control" name="student_date_of_travel" placeholder="">
            </div>
        </div>
        <div class="row mt-1 g-3">
            <div class="col-md">
                <label for="Name">**Relationship with the remitter:</label>
                <input type="text" name="relationship_remitter" class="form-control" placeholder="" maxlength="50">
            </div>
            <div class="col-md">
                <label class="mt-2" for="Name">Upload Signature:</label>
            <input type="file" class="form-control" placeholder="" name="student_signature">
            </div>
        </div>
        
        <p class="p1 mt-5" > <b>   3.Foreign exchange amount to be released / remitted (Please provide the exact split) 
        </b></p>
        <div class="row mt-1 g-3">
            <div class="col-md">
                <label for="Name">Cash Currency & Amount:</label>
                <input type="text" class="form-control" name="cash_currency_amount" placeholder="" maxlength="50">
            </div>
            <div class="col-md">
                <label for="Name">Travellers Cheque Currency & Amount:</label>
                <input type="text" class="form-control" name="travellers_cheque_currency_amount" placeholder="" maxlength="50">
            </div>
        </div>
        <div class="row mt-1 g-3">
            <div class="col-md">
                <label for="Name">Draft Currency & Amount:</label>
                <input type="text" class="form-control" name="draft_currency_amount" placeholder="" maxlength="50">
            </div>
            <div class="col-md">
                <label for="Name">TT Currency & Amount:</label>
                <input type="text" class="form-control" name="tt_currency_amount" placeholder="" maxlength="50">
            </div>
        </div>
        <div class="row mt-1 g-3">
            
            <div class="col-md">
                <label for="Name">Source of Funds:</label>
                <input type="text" class="form-control" name="source_funds_detail" placeholder="" maxlength="50">
            </div>
        </div>
        <div class="row mt-1 g-3">
            <div class="col-md">
                <label for="Name">Equivalent to Rs. :</label>
                <input type="text" class="form-control" name="equivalent_rs" placeholder="" maxlength="50">
            </div>
            <div class="col-md">
                <label for="Name">Equivalent to USD :</label>
                <input type="text" class="form-control" name="equivalent_usd" placeholder="" maxlength="50">
            </div>
        </div>
        <div class="row mt-1 g-3">
            <div class="col-md">
                <label for="Name">Country of Travel / Remittance:  :</label>
                <input type="text" class="form-control" name="country_travel" placeholder="" maxlength="50">
            </div>
            <div class="col-md">
                <label for="Name">Date of Travel :</label>
                <input type="date" class="form-control" name="date_travel" placeholder="">
            </div>
        </div>
        <br>
        <b>In Case of Demand Draft
        </b>
        <div class="row mt-1 g-3">
            <div class="col-md">
                <label for="Name">Draft Favouring:</label>
                <input type="text" class="form-control" name="draft_favouring" placeholder="" maxlength="50">
            </div>
        </div>
        <b>In case of swift / Telegraphic transfer
        </b>

        <center><b>Beneficiary Details:</b></center>
        <label class="mt-2" for="Name">Full Name:</label>
            <input type="text" class="form-control" name="beneficiary_user_name" placeholder="" value="{{Auth::user()->beneficiary_user_name}}" maxlength="50">

        
        
        <label class="mt-2" for="Name">Beneficiary Address:</label>
        <input type="textarea" class="form-control" placeholder="" value="{{Auth::user()->beneficiary_address}}" name="beneficiary_address">
        

        <label class="mt-2" for="Name">Beneficiary Bank Account Number:</label>
        <input type="text" class="form-control" placeholder="" value="{{Auth::user()->bank_number}}" name="bank_number" maxlength="50">
        
        
        <label class="mt-2" for="Name">Beneficiary Bank Name:</label>
        <input type="text" class="form-control" placeholder="" value="{{Auth::user()->bank_name}}" name="bank_name" maxlength="50">

        <label class="mt-2" for="Name">Beneficiary Bank Address:</label>
        <input type="text" class="form-control" placeholder="" value="{{Auth::user()->bank_address}}" name="bank_address">
        

        <label class="mt-2" for="Name">Swift code /Rounting No:</label>
        <input type="text" class="form-control" placeholder="" value="{{Auth::user()->swift_code}}" name="swift_code" maxlength="50">
        

        <label class="mt-2" for="Name">ABA routing/BLZ/Sort Code/Bank Code:</label>
        <input type="text" class="form-control" name="bank_code" placeholder="" maxlength="50">
        
        <label class="mt-2" for="Name">Id IBAN International: :</label>
        <input type="text" class="form-control" placeholder="" value="{{Auth::user()->iban_number}}" name="iban_number" maxlength="50">
        
        <label class="mt-2" for="Name">Additional information to the beneficiary (if available):</label>
                <input type="text" class="form-control" placeholder="" name="beneficiary_additional_information">
        <label class="mt-2" for="Name">Information to be sent with wire transfer, if any :</label>
                <input type="text" class="form-control" placeholder="" 
                name="wire_transfer_information">
        
        <label class="mt-2" for="Name">Correspondent Bank Charges: Beneficiary / Ours:</label>
        <input type="text" class="form-control" placeholder="" 
        name="correspondent_bank_charges">
    
        <div class="row mt-3 g-3" style="overflow-x: scroll;">
            <!-- Table Part -->
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Date</th>
                    <th scope="col">FCN & Amount</th>
                    <th scope="col">Equivalent to Rs.</th>
                    <th scope="col">Equivalent to used</th>
                    
                    <th scope="col">Name and address of AD brnach /FFMc 
                        through which the transaction has been</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td><input type="date" class="form-control-sm" placeholder="" 
                        name="table_content_date1"></td>
                    <td><input type="text" class="form-control-sm" placeholder=""
                        name="fcn_amount1"></td>
                    <td>
                        <input type="text" class="form-control-sm" placeholder="" name="equivalent_rs1"></td>
                    <td><input type="text" class="form-control-sm" placeholder="" 
                        name="equivalent_usd1"></td>
                    <td><input type="textarea" class="form-control-sm" placeholder=""
                        name="adbrnach1"></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td><input type="date" class="form-control-sm" placeholder=""
                        name="table_content_date2"></td>
                    <td><input type="text" class="form-control-sm" placeholder=""
                        name="fcn_amount2"></td>
                    <td><input type="text" class="form-control-sm" placeholder="" name="equivalent_rs2"></td>
                    <td><input type="text" class="form-control-sm" placeholder=""
                        name="equivalent_usd2"></td>
                    <td><input type="textarea" class="form-control-sm" placeholder=""
                        name="adbrnach2"></td>
                    
                  </tr><tr>
                    <th scope="row">3</th>
                    <td><input type="date" class="form-control-sm" placeholder=""
                        name="table_content_date3"></td>
                    <td><input type="text" class="form-control-sm" placeholder=""
                        name="fcn_amount3"></td>
                    <td><input type="text" class="form-control-sm" placeholder="" name="equivalent_rs3"></td>
                    <td><input type="text" class="form-control-sm" placeholder="" 
                        name="equivalent_usd3"></td>
                    <td><input type="textarea" class="form-control-sm" placeholder="" name="adbrnach3"></td>
                    
                  </tr><tr>
                    <th scope="row">4</th>
                    <td><input type="date" class="form-control-sm" placeholder="" 
                        name="table_content_date4"></td>
                    <td><input type="text" class="form-control-sm" placeholder=""
                        name="fcn_amount4"></td>
                    <td><input type="text" class="form-control-sm" placeholder="" name="equivalent_rs4"></td>
                    <td><input type="text" class="form-control-sm" placeholder=""
                        name="equivalent_usd4"></td>
                    <td><input type="textarea" class="form-control-sm" placeholder=""
                        name="adbrnach4"></td>
                  </tr>
                  
                </tbody>
              </table>
        </div>  
        <div class="row">
            <div class="col-md">
                <label class="mt-2" for="Name">Upload Signature:</label>
            <input type="file" class="form-control" placeholder="" name="signature">
            </div>
        </div>
    </div>
    <br>

    <div class="declaration mt-3">
        <p class="mt-2 text-center">
            <b>Declaration cum undertaking
        </b></p>
        <p class="p1 mt-1 text-center">I, the undersigned, hereby declare that the total amount of foreign exchange purchased from or remitted through, all sources in India during the financial year as per item no. 
            4 of the Application, including the current transaction is within the overall limit of USD 250,000/- (USD Dollar Two Hundred and Fifty Thousand Only), which is the limit 
            prescribed by the Reserve Bank of India for the said purpose. I certify that the source of funds for making the said remittance belongs to me and the foreign exchange shall 
            not be used for prohibited purposes. The transaction details of which are mentioned above does not involve, and is not designed for the purpose of any contravention or 
            evasion of the provisions of the FEMA, 1999 or of any Rule, Regulation, Notification, Direction or Order made there under. I also hereby agree and undertake to provide such 
            information /documents as will reasonably satisfy you about this transaction in terms of this declaration. I shall be responsible and liable for any incorrect information 
            provided by me. I agree that in the event the transaction is cancelled or revoked by me after submitting the request, any exchange losses incurred in this connection to be 
            recovered from the refund amount. I further agree that once the funds remitted by me have been transmitted by EBIXCASH (through AD Bank) to the correspondent and/or 
            beneficiary banks, EBIXCASH shall not be responsible for any delays in the disbursement of such funds including the withholding of such funds by the correspondent and/or 
            beneficiary bank. I agree that once funds are remitted, intermediary bank charges may be levied by Correspondent and /or Beneficiary Banks, which may vary from Bank to 
            Bank. I agree that in the event the transaction being rejected by the beneficiary bank because of incorrect information submitted by me, any charges levied by the beneficiary 
            bank or exchange losses incurred in this connection, I will be liable to pay the same to EBIXCASH. I further confirm that the foreign exchange released for the above 
            mentioned purpose will be used within 180 days of purchase. In case it is not possible to use the foreign exchange within the period of 180 days, same will be surrendered to 
            an authorised person. I am neither a politically Exposed Person (PEP), not related to any of the PEP’s.</p>
        
        <p class="p2 mt-1 text-center"><b><i><u>I hereby state and undertake that I have no objection in authenticating myself with Aadhaar based Authentication system and hereby by give
            my voluntary consent to EBIXCASH as required under the Aadhaar Act 2016 and all other applicable laws.
            </u></i></b></p>
        <div>
            I enclose herewith Cash/ Cheque/DD No.
            <input type="textarea" class="form-control-sm" placeholder=""
            name="chequedd_no">

            dated<input type="date" class="form-control-sm" name="dated_detail" placeholder="">
            drawn on <input type="textarea" name="drawn_detail" class="form-control-sm" placeholder="">

            for Rs.<input type="textarea" name="drawn_amount" class="form-control-sm" placeholder=""> towards the cost of the above exchange.<br>
            I understand that it is mandatory for you to collect copy of my visa before release of foreign exchange and keep the same on record. In this case, the VISA will be – (select whichever is applicable)<br><br>
        <input type="checkbox" class="ml-2 form-check-input" id="exampleCheck1">
        <label class="form-check-label ml-4" for="exampleCheck1"> on arrival at the concerned country.
        </label><br>
        <input type="checkbox" class="ml-2 form-check-input" id="exampleCheck1">
        <label class="form-check-label ml-4" for="exampleCheck1">    stamped only after the endorsement of availing exchange.<br>Hence, I am unable to produce copy of the visa to you. I undertake to produce my passport to you any time after my return from trip as a proof of obtaining visa as well as 
            undertaking the trip abroad.
            
        </label>
        <label class="mt-2" for="Name">Upload Signature:</label>
        <input type="file" class="form-control" placeholder="" name="signature2">
        <br><br>
        
        <p class="p2 mt-1 "><b><u>If applicant is minor</u></b></p>
        <div class="row" >
            <div class="col-md">
                <label class="mt-2" for="Name">Signature of the natural guardian of the applicant :</label>
            <input type="file" class="form-control" placeholder="" name="natural_guardian_signature">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md">
                <label class="mt-2" for="Name">Name:</label>
                <input type="text" class="form-control" name="natural_guardian_name" placeholder="">        
            </div>
            <div class="col-md">
                <label class="mt-2" for="Name">Relationship with the Applicant:</label>
                <input type="text" name="natural_guardian_relatonship_applicant" class="form-control" placeholder="">        
            </div>
        </div>
        <p class="p2 mt-1 text-center"><b>Certificate by the Authorised Dealer     </b></p>
        <p>This is to certify that the remittance is not being made by/ to ineligible entities and that the remittance is in conformity with the instructions 
            issued by the Reserve Bank from time to time under the Scheme. I have verified KYC documents in original. 
            </p>   
        <p>Name and designation of the authorised official: </p> 
        <div class="row">
            <div class="col-md">
                <label class="mt-2" for="Name">Upload Signature:</label>
                <input type="file" class="form-control" placeholder=""
                name="authorised_dealer_upload">
            </div>
            <div class="col-md">
                <label class="mt-2" for="Name">Date:</label>
                <input type="date" class="form-control" name="authorised_dealer_date" placeholder="">
            </div>
            <div class="col-md">
                <label class="mt-2" for="Name">Place:</label>
                <input type="text" class="form-control" placeholder=""
                name="authorised_dealer_place">
            </div>
        </div>
        <div class="row">
            <div class="col-md text-right">
                <br>
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
        </div>

    </div>

    </div>

                                       
                                       
                                       
                                       
                                       
                                       
                                       </form>
                                        </div>
                            </div>
                            </div>

                            <div class="card">
                                <a href="{{route('home')}}">
                                <div class="card-header" id="headingfive">
                                    <h3 class="h3-title collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive"><span>
                                    Verify Your Details</span> <span class="icon"></span></h3>
                                </div>
                                </a>
                            </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
$(document).ready(function(){ 
    $(".select2").select2();
    $('#source_fund,.source_fund').hide();
    $('#resident_status').on('change',function(){
        if($(this).val() == 'family_member'){
            $('#source_fund,.source_fund').show();
        }else{
            $('#source_fund,.source_fund').hide();
        }
    });
    select_state();
    select_city();
    select_beneficiary_state();
    select_beneficiary_city()
    $("#customer-details").validate({
      rules: {
        name:{
          required: true,
          minlength:3
        },
        father_name:{
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
            maxlength:15,
        },
        pan_card_pic:{
            required: <?php echo Auth::user()->pan_card_pic ?
                    'false' : 'true' ?>,
        },
        aadhar_number:{
            required: true,
            maxlength:16,
        },
        aadhar_pic:{
           required: <?php echo Auth::user()->aadhar_pic ?
                    'false' : 'true' ?>,
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
        father_name: {
          required: "Father Name is required",
          minlength:"Your father name must be 3 characters long",
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
        pan_card_pic:{
          required:"Upload your pan card",
        },
        aadhar_pic:{
          required:"Upload your Aadhar card",
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
          beforeSend: function() {
                $(".loader-box").show();
          },
          success: function(result)
          {
            $(".loader-box").hide();
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
        beneficiary_id:{
          required: true,
        },
        beneficiary_user_name: {
          required: true,
        },
        
        beneficiary_email:{
          required: true,
          email:true,
        },
        beneficiary_dob:{
          required: true,
        },
        beneficiary_country_id:{
          required: true,
        },
        beneficiary_state_id:{
          required: true,
        },
        beneficiary_city_id:{
           required:true, 
        },
        beneficiary_address:{
           required:true, 
        },
        iban_number:{
          required: true,
        },
        visa_image:{
          required: <?php echo Auth::user()->visa_image ?
                    'false' : 'true' ?>,
        },
        bank_number:{
          required: true,
          maxlength:20,
        },
        swift_code:{
          required: true,
        },
        beneficiary_address:{
            required: true,
        },
        bank_address:{
            required: true,
        },
        bane_name:{
            required: true,
        },
        passport_image:{
            required: <?php echo Auth::user()->passport_image ?
            'false' : 'true' ?>,
        },
        offer_letter_image:{
           required: <?php echo Auth::user()->offer_letter_image ?
            'false' : 'true' ?>,
        },
        pan_card_image:{
           required: <?php echo Auth::user()->pan_card_image ?
            'false' : 'true' ?>,
        },
        purpose:{
           required:true, 
        },
        beneficiary_detail_check:{
           required:true, 
        },
        itr_detail:{
           required: <?php echo Auth::user()->itr_detail ?
            'false' : 'true' ?>,
        },
      },
      messages: {
        beneficiary_id:{
          required: "Student id is required",
        },
        beneficiary_user_name: {
          required: "Name is required",
        },
        beneficiary_email:{
          required: "Email name is required",
          email: "Emil is not valid",
        },
        beneficiary_dob: {
          required: "Date of birthday is required",
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
          url: "{{route('upate_beneficiary')}}",
          type: "POST",
          data: data,
          processData: false,
          contentType: false,
          beforeSend: function() {
            $(".loader-box").show();
          },
          success: function(result)
          {
            $(".loader-box").hide();
            $.notify(result.message,
            {align:"center", verticalAlign:"top",type:"success",color: "#fff",
                    background: "#155724",delay:3000});
            setTimeout(function() {
               window.location.reload();
            }, 3000);        
          },
          error:function(result)
          {
              alert(result);
          }, 
        });   
      }
    });


    $("#annexure_detail").validate({
      rules: {
        nationality:{
          required: true,
          minlength:3
        },
      },
      messages: {
        name: {
          nationality: "Name is required",
          minlength:"Your username must be 3 characters long",
        },
      },
      submitHandler: function() {
        var form = $('#annexure_detail')[0]; 
        var data = new FormData(form); 
        $.ajax({
          url: "{{route('upate_annexure_details')}}",
          type: "POST",
          data: data,
          processData: false,
          contentType: false,
          beforeSend: function() {
                $(".loader-box").show();
          },
          success: function(result)
          {
            $(".loader-box").hide();
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

$('#beneficiary_country_id').change(function(){
var country_id = $(this).val();    
if(country_id){
    $.ajax({
       type:"GET",
       url:"{{ url('get_state')}}",
       data:{country_id:country_id},
       success:function(result){               
        if(result){
            $("#beneficiary_state_id").empty();
            $("#beneficiary_state_id").append('<option>Select state</option>');
            $.each(result,function(key,value){
                $("#beneficiary_state_id").append('<option value="'+value.id+'">'+value.name+'</option>');
            });
        }else{
           $("#beneficiary_state_id").empty();
        }
       }
    });
}else{
    $("#beneficiary_state_id").empty();
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

$('#beneficiary_state_id').change(function(){
var state_id = $(this).val();    
if(state_id){
    $.ajax({
       type:"GET",
       url:"{{ url('get_city')}}",
       data:{state_id:state_id},
       success:function(result){               
        if(result){
            $("#beneficiary_city_id").empty();
            $("#beneficiary_city_id").append('<option>Select city</option>');
            $.each(result,function(key,value){
                $("#beneficiary_city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
            });
        }else{
           $("#beneficiary_city_id").empty();
        }
       }
    });
}else{
    $("#beneficiary_city_id").empty();
    }      
});

function select_state(){
    var country_id = $('#country_id').val();
    var country = "{{Auth::user()->state_id}}";
    $.ajax({
       type:"GET",
       url:"{{ url('get_state')}}",
       data:{country_id:country_id},
       async:false,
       success:function(result){               
        if(result){
            $("#state_id").empty();
            $("#state_id").append('<option value=" ">Select state</option>');
            $.each(result,function(key,value){
                $("#state_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                $("#state_id").val(country);
            });
        }else{
           $("#state_id").empty();
        }
       }
    });
}
function select_beneficiary_state(){
    var country_id = $('#beneficiary_country_id').val();
    var country = "{{Auth::user()->beneficiary_state_id}}";
    $.ajax({
       type:"GET",
       url:"{{ url('get_state')}}",
       data:{country_id:country_id},
       async:false,
       success:function(result){               
        if(result){
            $("#beneficiary_state_id").empty();
            $("#beneficiary_state_id").append('<option value=" ">Select state</option>');
            $.each(result,function(key,value){
                $("#beneficiary_state_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                $("#beneficiary_state_id").val(country);
            });
        }else{
           $("#beneficiary_state_id").empty();
        }
       }
    });
}
function select_city(){
    var state_id = $('#state_id option:selected').val();
    var city = "{{Auth::user()->city_id}}";
    $.ajax({
           type:"GET",
           url:"{{ url('get_city')}}",
           data:{state_id:state_id},
           success:function(result){               
            if(result){
                $("#city_id").empty();
                $("#city_id").append('<option value=" ">Select city</option>');
                $.each(result,function(key,value){
                    $("#city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                    $("#city_id").val(city);
                });
            }else{
               $("#city_id").empty();
            }
           }
    });
}
function select_beneficiary_city(){
   var state_id = $('#beneficiary_state_id option:selected').val();
   var city = "{{Auth::user()->beneficiary_city_id}}";
   $.ajax({
       type:"GET",
       url:"{{ url('get_city')}}",
       data:{state_id:state_id},
       success:function(result){               
        if(result){
            $("#beneficiary_city_id").empty();
            $("#beneficiary_city_id").append('<option value=" ">Select city</option>');
            $.each(result,function(key,value){
                $("#beneficiary_city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                $("#beneficiary_city_id").val(city);
            });
        }else{
           $("#beneficiary_city_id").empty();
        }
       }
   }); 
}
@endsection