<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Countries;
use Validator;
use Hash;
use Image;
use Auth;
use App\Models\States;
use App\Models\Cities;
use App\Models\University;
use Response;

class FormController extends Controller
{
    public function index($sku){

        $country_id  = Auth::user()->country_id;
        if(!empty($country_id)){
            $country = Countries::where('id',$country_id)->first();
            $country_name = $country->name;
        }else{
            $country_name = '';
        }

        $state_id  = Auth::user()->state_id;
        if(!empty($country_id)){
            $state = States::where('id',$state_id)->first();
            $state_name = $state->name;
        }else{
            $state_name = '';
        }
            
        $city_id  = Auth::user()->city_id;
        if(!empty($city_id)){
            $city = Cities::where('id',$city_id)->first();
            $city_name = $city->name;
        }else{
            $city_name = '';
        }
            
        $institute_id  = Auth::user()->institute;
        if(!empty($institute_id)){
            $institute = University::where('id',$institute_id)->first();
            $institute_name = $institute->name;
        }
        else{
            $institute_name = '';
        }
        $countries = Countries::get();
        $university = University::where('status','active')->get();

       
      
        if($sku == 'personal' || $sku == 'education'){

            return view('front.form',compact('countries','country_name','state_name','city_name','university','institute_name'));
            
        }else{
            return abort(404);
        }


        if(empty($sku)){
            return view('front.index');
        }


        
        return view('front.form',compact('countries'));
    }

    public function upate_customer_details(Request $request){

    
        // $this->validate($request,[
        //         'first_name' => 'required|max:35',
        //         'last_name' => 'required|max:35',
        //         'mobile' => 'required|numeric',
        //     ],[
        //         'first_name.required' => ' The first name field is required.',
        //         'first_name.max' => ' The first name may not be greater than 35 characters.',
        //         'last_name.required' => ' The last name field is required.',
        //         'last_name.max' => ' The last name may not be greater than 35 characters.',
        //         'mobile.required' => 'Mobile number is required.',
        //     ]);





        $id = Auth::user()->id;
        $data = User::find($id);
        $data->pan_number = $request->input('pan_number');
        $data->dob = $request->input('dob');
        $data->father_name = $request->input('father_name');
        $data->resident_status = $request->input('resident_status');
        $data->address = $request->input('address');
        $data->pin_code = $request->input('pin_code');
        $data->country_id = $request->input('country_id');
        $data->state_id = $request->input('state_id');
        $data->city_id = $request->input('city_id');
        $data->aadhar_number = $request->input('aadhar_number');
        $data->source_fund = $request->input('source_fund');
        $data->institute = $request->input('institute');

        //pan_card_pic
        if($request->hasFile('pan_card_pic')) {
            $photo = $request->file('pan_card_pic');
            $imagename = time().'.'.$photo->getClientOriginalExtension(); 
            $destinationPath = public_path('images/pan_card/');
            $thumb_img = Image::make($photo->getRealPath())
             ->resize(200,200);
            $thumb_img->save($destinationPath.'/'.$imagename,80);
            $data->pan_card_pic = $imagename;
        }

        //pan_card_pic
        if($request->hasFile('aadhar_pic')) {
            $photo = $request->file('aadhar_pic');
            $imagename = time().'.'.$photo->getClientOriginalExtension(); 
            $destinationPath = public_path('images/aadha/');
            $thumb_img = Image::make($photo->getRealPath())
             ->resize(200,200);
            $thumb_img->save($destinationPath.'/'.$imagename,80);
            $data->aadhar_pic = $imagename;
        }

        $data->save();
        return response()->json(['status' =>'success','message' =>'Customer Details updated successfully']);
    }

  

    public function upate_beneficiary(Request $request){

    
        // $this->validate($request,[
        //         'first_name' => 'required|max:35',
        //         'last_name' => 'required|max:35',
        //         'mobile' => 'required|numeric',
        //     ],[
        //         'first_name.required' => ' The first name field is required.',
        //         'first_name.max' => ' The first name may not be greater than 35 characters.',
        //         'last_name.required' => ' The last name field is required.',
        //         'last_name.max' => ' The last name may not be greater than 35 characters.',
        //         'mobile.required' => 'Mobile number is required.',
        //     ]);

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->beneficiary_id = $request->input('beneficiary_id');
        $data->beneficiary_first_name = $request->input('beneficiary_first_name');
        $data->beneficiary_last_name = $request->input('beneficiary_last_name');
        $data->beneficiary_email = $request->input('beneficiary_email');
        $data->beneficiary_dob = $request->input('beneficiary_dob');
        $data->beneficiary_country_id = $request->input('beneficiary_country_id');
        $data->beneficiary_state_id = $request->input('beneficiary_state_id');
        $data->beneficiary_city_id = $request->input('beneficiary_city_id');
        $data->beneficiary_address = $request->input('beneficiary_address');
        $data->iban_number = $request->input('iban_number');
        $data->bank_number = $request->input('bank_number');
        $data->swift_code = $request->input('swift_code');
        $data->beneficiary_address = $request->input('beneficiary_address');
        $data->bank_address = $request->input('bank_address');
        $data->bane_name = $request->input('bane_name');
        $data->purpose = $request->input('purpose');


        //visa_image
        if($request->hasFile('visa_image')) {
            $photo = $request->file('visa_image');
            $imagename = time().'.'.$photo->getClientOriginalExtension(); 
            $destinationPath = public_path('images/visa/');
            $thumb_img = Image::make($photo->getRealPath())
             ->resize(200,200);
            $thumb_img->save($destinationPath.'/'.$imagename,80);
            $data->visa_image = $imagename;
        }
        //passport_image
        if($request->hasFile('passport_image')) {
            $photo = $request->file('passport_image');
            $imagename = time().'.'.$photo->getClientOriginalExtension(); 
            $destinationPath = public_path('images/passport/');
            $thumb_img = Image::make($photo->getRealPath())
             ->resize(200,200);
            $thumb_img->save($destinationPath.'/'.$imagename,80);
            $data->passport_image = $imagename;
        }
        //offer_letter_image
        if($request->hasFile('offer_letter_image')) {
            $photo = $request->file('offer_letter_image');
            $imagename = time().'.'.$photo->getClientOriginalExtension(); 
            $destinationPath = public_path('images/offer_letter/');
            $thumb_img = Image::make($photo->getRealPath())
             ->resize(200,200);
            $thumb_img->save($destinationPath.'/'.$imagename,80);
            $data->offer_letter_image = $imagename;
        }
        //pan_card_image
        if($request->hasFile('pan_card_image')) {
            $photo = $request->file('pan_card_image');
            $imagename = time().'.'.$photo->getClientOriginalExtension(); 
            $destinationPath = public_path('images/pan_card/');
            $thumb_img = Image::make($photo->getRealPath())
             ->resize(200,200);
            $thumb_img->save($destinationPath.'/'.$imagename,80);
            $data->pan_card_image = $imagename;
        }
        //pan_card_image
        if($request->hasFile('itr_detail')) {
            $photo = $request->file('itr_detail');
            $imagename = time().'.'.$photo->getClientOriginalExtension(); 
            $destinationPath = public_path('images/itr/');
            $thumb_img = Image::make($photo->getRealPath())
             ->resize(200,200);
            $thumb_img->save($destinationPath.'/'.$imagename,80);
            $data->itr_detail = $imagename;
        }


        $data->save();

        return response()->json(['status' =>'success','message' =>'Successfully update your beneficiary details']);
    }


    //
     public function upate_annexure_details(Request $request){


        $id = Auth::user()->id;
        $data = User::find($id);
        $data->form_date = $request->input('form_date');
        $data->subject_derail = $request->input('subject_derail');
        $data->nationality = $request->input('nationality');
        $data->residential_status = $request->input('residential_status');
        $data->passport = $request->input('passport');
        $data->date_of_issue = $request->input('date_of_issue');
        $data->date_of_expiry = $request->input('date_of_expiry');
        $data->place_of_issue = $request->input('place_of_issue');
        $data->student_name = $request->input('student_name');
        $data->student_passport = $request->input('student_passport');
        $data->studen_aadhaar = $request->input('studen_aadhaar');
        $data->student_college = $request->input('student_college');
        $data->student_academic_year = $request->input('student_academic_year');
        $data->student_city_country = $request->input('student_city_country');
        $data->student_date_of_travel = $request->input('student_date_of_travel');
        $data->relationship_remitter = $request->input('relationship_remitter');
        $data->cash_currency_amount = $request->input('cash_currency_amount');
        $data->travellers_cheque_currency_amount = $request->input('travellers_cheque_currency_amount');
        $data->draft_currency_amount = $request->input('draft_currency_amount');
        $data->tt_currency_amount = $request->input('tt_currency_amount');
        $data->source_funds_detail = $request->input('source_funds_detail');
        $data->equivalent_rs = $request->input('equivalent_rs');
        $data->equivalent_usd = $request->input('equivalent_usd');
        $data->country_travel = $request->input('country_travel');
        $data->date_travel = $request->input('date_travel');
        $data->draft_favouring = $request->input('draft_favouring');
        $data->bank_code = $request->input('bank_code');
        $data->beneficiary_additional_information = $request->input('beneficiary_additional_information');
        $data->wire_transfer_information = $request->input('wire_transfer_information');
        $data->correspondent_bank_charges = $request->input('correspondent_bank_charges');
        $data->table_content_date1 = $request->input('table_content_date1');
        $data->table_content_date2 = $request->input('table_content_date2');
        $data->table_content_date3 = $request->input('table_content_date3');
        $data->table_content_date4 = $request->input('table_content_date4');
        $data->fcn_amount1 = $request->input('fcn_amount1');
        $data->fcn_amount2 = $request->input('fcn_amount2');
        $data->fcn_amount3 = $request->input('fcn_amount3');
        $data->fcn_amount4 = $request->input('fcn_amount4');
        $data->equivalent_rs1 = $request->input('equivalent_rs1');
        $data->equivalent_rs2 = $request->input('equivalent_rs2');
        $data->equivalent_rs3 = $request->input('equivalent_rs3');
        $data->equivalent_rs4 = $request->input('equivalent_rs4');
        $data->equivalent_usd1 = $request->input('equivalent_usd1');
        $data->equivalent_usd2 = $request->input('equivalent_usd2');
        $data->equivalent_usd3 = $request->input('equivalent_usd3');
        $data->equivalent_usd4 = $request->input('equivalent_usd4');
        $data->adbrnach1 = $request->input('adbrnach1');
        $data->adbrnach2 = $request->input('adbrnach2');
        $data->adbrnach3 = $request->input('adbrnach3');
        $data->adbrnach4 = $request->input('adbrnach4');
        $data->natural_guardian_relatonship_applicant = $request->input('natural_guardian_relatonship_applicant');
        $data->chequedd_no = $request->input('chequedd_no');
        $data->dated_detail = $request->input('dated_detail');
        $data->drawn_detail = $request->input('drawn_detail');
        $data->drawn_amount = $request->input('drawn_amount');
        $data->authorised_dealer_date = $request->input('authorised_dealer_date');
        $data->authorised_dealer_place = $request->input('authorised_dealer_place');


        //signature
        if($request->hasFile('signature')) {
            $photo = $request->file('signature');
            $imagename = time().'.'.$photo->getClientOriginalExtension(); 
            $destinationPath = public_path('images/signature/');
            $thumb_img = Image::make($photo->getRealPath())
             ->resize(200,200);
            $thumb_img->save($destinationPath.'/'.$imagename,80);
            $data->signature = $imagename;
        }

        //signature
        if($request->hasFile('student_signature')) {
            $photo = $request->file('student_signature');
            $imagename = time().'.'.$photo->getClientOriginalExtension(); 
            $destinationPath = public_path('images/signature/');
            $thumb_img = Image::make($photo->getRealPath())
             ->resize(200,200);
            $thumb_img->save($destinationPath.'/'.$imagename,80);
            $data->student_signature = $imagename;
        }

        

        //signature2
        if($request->hasFile('signature2')) {
            $photo = $request->file('signature2');
            $imagename = time().'.'.$photo->getClientOriginalExtension(); 
            $destinationPath = public_path('images/signature/');
            $thumb_img = Image::make($photo->getRealPath())
             ->resize(200,200);
            $thumb_img->save($destinationPath.'/'.$imagename,80);
            $data->signature2 = $imagename;
        }

        //authorised_dealer_upload
        if($request->hasFile('authorised_dealer_upload')) {
            $photo = $request->file('authorised_dealer_upload');
            $imagename = time().'.'.$photo->getClientOriginalExtension(); 
            $destinationPath = public_path('images/signature/');
            $thumb_img = Image::make($photo->getRealPath())
             ->resize(200,200);
            $thumb_img->save($destinationPath.'/'.$imagename,80);
            $data->authorised_dealer_upload = $imagename;
        }

        //natural_guardian_signature
        if($request->hasFile('natural_guardian_signature')) {
            $photo = $request->file('natural_guardian_signature');
            $imagename = time().'.'.$photo->getClientOriginalExtension(); 
            $destinationPath = public_path('images/signature/');
            $thumb_img = Image::make($photo->getRealPath())
             ->resize(200,200);
            $thumb_img->save($destinationPath.'/'.$imagename,80);
            $data->natural_guardian_signature = $imagename;
        }

        $data->save();
        return response()->json(['status' =>'success','message' =>'Customer Details updated successfully']);
    }

    public function update_profile_picture(Request $request) {
        
        $id = Auth::user()->id;
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'picture' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        if(!$validator->passes()) {
           return Response::json(['success' => '0','message'=>"Something went wrong please try again!"]); 
        }

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $completeFileName = $request->file('picture')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly).'-'. rand() .'_'.time().'.'.$extension;
            $destinationPath = public_path('user_profile');
            $image->move($destinationPath,$compPic); 
            $old_path = public_path("user_profile/").$user->picture;
            if(\File::exists($old_path)){
                \File::delete($old_path);
            }
            $user->picture = $compPic;
        }
        if($user->save()){
            return Response::json(['success' => '1','message'=>"User profile picture updated successfully!"]); 
        }else{
            return Response::json(['success' => '0','message'=>"Something went wrong please try again!"]); 
        }
    }

}
