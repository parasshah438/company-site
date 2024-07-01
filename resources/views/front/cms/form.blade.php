@extends('layouts.front')
@section('title','Home')
@section('content')
<section class="main-banner inner-banner about-banner back-img" id="main-banner" style="background-image: url('assets/images/inner-banner-bg.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="banner-content">
						<h1 class="h1-title wow fadeup-animation" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeup-animation;">Form</h1>
						<div class="breadcrumb-box wow fadeup-animation" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeup-animation;">
							<ul>
								<li><a href="index.html" title="Home">Home</a></li>
								<li>Form</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>




	<section class="main-portfolio-details">
    		<div class="container">
            	<div class="row">
                	
                    
                    <div class="accordion" id="accordionExample">
								<div class="card">
									<div class="card-header" id="headingOne">
										<h3 class="h3-title" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><span>Order Details</span> <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
									</div>
									<div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="card-body">
											<form class="dzForm" method="POST" action="#">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-box">
                                        <label>ORDER TYPE</label>
											<input type="text" readonly class="form-control-plaintext"  value="MONEY TRANSFER">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-box">
                                        <label>TRANSFER FROM *</label>
											<select class="selectpicker countrypicker form-input" data-live-search="true" data-default="United States" data-flag="true"></select>
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>TRANSFER TO *</label>
											<select class="selectpicker countrypicker form-input" data-live-search="true" data-default="United States" data-flag="true"></select>
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>PRODUCT *</label>
                                        <select class="selectpicker countrypicker form-input" data-live-search="true" data-default="United States" data-flag="true"></select>
											
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>RECEIVING AMOUNT *</label>
											<div class="input-group mb-3">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">US Dollar</button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div role="separator" class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </div>
  <input type="text" class="form-control" aria-label="Text input with dropdown button">
</div>
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>SENDING AMOUNT *</label>
											<div class="input-group mb-3">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">INR</button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div role="separator" class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </div>
  <input type="text" class="form-control" aria-label="Text input with dropdown button">
</div>
										</div>
									</div>
                                   
								</div>
							</form>
                            
                            			<div class="row">
                                        	 <div class="col-sm-6 offset-2">
                                     <form class="coupansectio">
                           
                            <div class="input-group">
                                <input type="coupan" class="form-control" placeholder="Enter">
                                <span class="input-group-btn">
                                    <button class="btn" type="submit">Submit</button>
                                </span>
                            </div>
                        </form>
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="divsubtotal">
                                    <h4>Your Order Summary</h4>
                                    		<table>
                                            	<tr>
                                                    <td><strong>Total</strong></td>
                                                    <td align="right"><i class="fa fa-inr"></i> 34,04,050.00</td>	
                                                </tr>
                                                <tr>
                                                    <td><strong>Bank Fee</strong></td>
                                                    <td align="right"><i class="fa fa-inr"></i> 225.00</td>	
                                                </tr>
                                                <tr>
                                                    <td><strong>GST / SGST</strong></td>
                                                    <td align="right"><i class="fa fa-inr"></i> 1,463.22</td>	
                                                </tr>
                                                <tr>
                                                    <td><strong>Grand Total</strong></td>
                                                    <td align="right"> <i class="fa fa-inr"></i> 34,05,738.00</td>	
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="center"><a href="#">Submit</a></td>
                                                </tr>
                                            </table>
                                    </div>
                                    </div>
                                    
                                        </div>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header" id="headingTwo">
										<h3 class="h3-title" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span>Customer Details</span> <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
									</div>
									<div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionExample">
										<div class="card-body">
											<form class="dzForm" method="POST" action="#">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-box">
                                        <label>Remitter Name *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>Phone Number *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>Email *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>Pan Number *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>Date of birth *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>Sender's Resident Status *</label>
											<select class="form-input">
                                            		<option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                            </select>
										</div>
									</div>  
                                    <div class="col-sm-12">
										<div class="form-box">
                                        <label>Residential Address *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>Pin Code *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>   
                                    
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>City *</label>
											<select class="form-input">
                                            		<option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                            </select>
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>State *</label>
											<select class="form-input">
                                            		<option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                            </select>
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>Source Of Funds *</label>
											<select class="form-input">
                                            		<option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                            </select>
										</div>
									</div>
                                      
                                      <div class="col-sm-9">
                                      <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    
I confirm that I'm a tax resident of India and not of any other country.
  </label>
</div>
                                      </div>  
                                      <div class="col-sm-3 text-right">
                                      	<button class="btn btn-success">Submit</button>
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
											<form class="dzForm" method="POST" action="#">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-box">
                                        <label>PURPOSE  *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    
                                    <div class="col-sm-10">
										<div class="form-box">
                                        <label style="margin-right: 30%;">Are You An Indian Resident ? *</label>
											<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
  <label class="form-check-label" for="inlineCheckbox1" style="margin: 0px;">Yes</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
  <label class="form-check-label" for="inlineCheckbox2" style="margin: 0px;">No</label>
</div>
										</div>
									</div>
                                      
                                      <div class="col-sm-12">
                                      	<p>DOCUMENTS REQUIRED</p>
                                      </div>
                                      
                                      <div class="col-sm-4">
										<div class="form-box">
                                        <label>Pan Card</label>
											<input type="file"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>Patient Passport Front Page</label>
											<input type="file"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>Patient Passport Back Page</label>
											<input type="file"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>Remitter Photo Cum Address Proof</label>
											<input type="file"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>Medical Institute Invoice</label>
											<input type="file"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                      
                                      
                                      <div class="col-sm-9">
                                      <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  
 I confirm that I'm in possession of valid documents as per the list shown above and that I haven't bought or transfered foreign currency for more than USD 2,50,000 (or equivalent in another currency) in the current financial year.
  </label>
</div>
                                      </div>  
                                      <div class="col-sm-3 text-right">
                                      	<button class="btn btn-success">Submit</button>
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
											<form class="dzForm" method="POST" action="#">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-box">
                                        <label>Recipient Name *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-8">
										<div class="form-box">
                                        <label>Recipient Address *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>SWIFT CODE *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>Bank Account Number *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>Bank Name  *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-8">
										<div class="form-box">
                                        <label>Beneficiary Bank Address *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>Correspondent Bank Charges *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="form-box">
                                        <label>Additional info/Student ID/REF. No. *</label>
											<input type="text"  class="form-input"  value="MONEY TRANSFER">
										</div>
									</div>
                                    
                                    
                                      
                                      <div class="col-sm-9">
                                      <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    
I confirm that I'm a tax resident of India and not of any other country.
  </label>
</div>
                                      </div>  
                                      <div class="col-sm-3 text-right">
                                      	<button class="btn btn-success">Submit</button>
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
									<div class="card-header" id="headingSix">
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