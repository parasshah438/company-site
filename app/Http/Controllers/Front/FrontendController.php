<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\User;
use App\Models\Requirement;
use Response;

class FrontendController extends Controller
{
    public function index(){

    	return view('front.index'); 
    }

    public function requirement_store(Request $request) {

        $validator = Validator::make($request->all(),
        [
            'user_name' => 'required',
            'user_mobile' => 'required|numeric',
            'user_email' => 'required|email',

            'user_experiance' => 'required',
            'user_position' => 'required',
            'user_qualification' => 'required',
            
            'user_vocation' => 'required',
            'user_join' => 'required',
            'user_resume' => 'required',
            'user_msg' => 'required',
        ],[
            'user_name.required' => 'Name is required',
            'user_mobile.required' => 'Phone number is required',
            'user_email.required' => 'Email is required',
            'user_experiance.required' => 'Experiance is required',
            'user_qualification.required' => 'Qualification is required',
            'user_join.required' => 'Join is required',
            'user_position.required' => 'Position is required',
            'user_resume.required' => 'Resume is required',
            'user_msg.required' => 'Message is required',
        ]);

        if ($validator->fails())
        {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            $all_error = ''; 
            foreach($errors->all() as $error){
                $all_error .= $error.'<br>';
                $this->response['status'] = 'success';
                $this->response['message'] = $all_error;
        
                return response()->json($this->response);
            }
    
        }
        $rand_value = md5(mt_rand(11111111,99999999));
        $ext = $request->file('user_resume')->extension();
        $final_name = $rand_value.'.'.$ext;
        $request->file('user_resume')->move(public_path('uploads/user_resume'),$final_name);

        $obj = new Requirement();
        $data = $request->only($obj->getFillable());

        $data['user_resume'] = $final_name;
        $obj->fill($data)->save();

        $this->response['status'] = 'success';
        $this->response['message'] = 'Your job post is successfully submited';
        return response()->json($this->response);
    }
}
