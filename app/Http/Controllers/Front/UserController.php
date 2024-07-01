<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Wishlist;
use Validator;
use Hash;
use Response;

class UserController extends Controller
{
    public function dashboard(){

        return view('front.customer.dashboard');
    }

    public function profdddile(){

		//return view('front.customer.profile');
	}

	public function upate_profile(Request $request){

        $this->validate($request,[
                'name' => 'required|max:35',
                'email' => 'unique:users,email,'.Auth::user()->id,
                'phone' => 'required|numeric',
            ],[
                'name.required' => 'Username is required.',
                'email.required' => 'Email is required.',
                'phone.required' => 'Mobile number is required.',
            ]);

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        
        if($password = $request->input('password')) {
            if(Hash::check($request->get('password'), Auth::guard('web')->user()->password)) {
                return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password");
            }
            else
            {
                $data->password = Hash::make($request->input('password'));
            }
        }  
        $data->save();
        return redirect('customer/account/profile')
        ->with('success','Profile updated successfully');
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
