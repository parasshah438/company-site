<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Response;

class ContactController extends Controller
{
    public function index(){
    	
    	return view('front.contact');
    }

    public function storecontact(Request $request){


      $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'services' => 'required',
            'budget' => 'required',
            'messages' => 'required',
        ],[
            'name.required' => 'Name is required',
            'phone.required' => 'Phone number is required',
            'email.required' => 'Email is required',
            'services.required' => 'Service is required',
            'budget.required' => 'Budget is required',
            'messages.required' => 'Message is required'
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
        
        $contact = new Contact;
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->phone = $request->get('phone');
        $contact->subject = $request->get('budget');        
        $contact->messages = $request->get('messages');
        $contact->services = $request->get('services');
        $contact->save();

        $this->response['status'] = 'success';
        $this->response['message'] = 'Thank you for Contact Us. As early as possible we will contact you.';
        return response()->json($this->response);
    }
}
