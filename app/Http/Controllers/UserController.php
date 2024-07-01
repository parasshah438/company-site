<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){

        return view('user.profile');
    }

    public function upate_profile(Request $request){

        $this->validate($request,[
                'name' => 'required|max:50|regex:/^[a-zA-Z ]+$/',
                'email' => 'required|unique:users,email,'.Auth::user()->id,
                'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|numeric|min:10|unique:users,mobile,'.Auth::user()->id,
            ],[
                'name.required' => 'Username is required.',
                'email.required' => 'Email is required.',
                'mobile.required' => 'Mobile number is required.',
            ]);

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->mobile = $request->input('mobile'); 
        $data->save();
        return redirect()->back()
        ->with('success','Profile updated successfully');
    }

    public function change_password(){

        return view('user.password');
    }

    public function upate_change_password(Request $request){

        $this->validate($request,[
                'current_password' => 'required',
                'new_password' => ['required','string','min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,50}/'],    
                'new_confirm_password' => 'same:new_password',
        ],[
                'current_password.required' => 'Current password is required.',
                'new_password.required' => 'New password is required.',
                'new_password.regex' => 'Password (UpperCase, LowerCase, Number, SpecialChar and min 8 Chars)',
                'new_confirm_password.required' => 'Confirm password is required.',
                'new_confirm_password.same' => 'New password and confirm password must be same.',
        ]);

        $hashedPassword = Auth::user()->password;
        $id = Auth::user()->id;
        $data = User::find($id);
        if(Hash::check($request->current_password,$hashedPassword)) {

            if($password = $request->input('new_password')) {
                if(Hash::check($request->get('new_password'), Auth::guard('web')->user()->password)) {
                    return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password");
                }
                else
                {
                    $data->password = Hash::make($request->input('new_password'));
                }
            } 
        }else{
            return redirect()->back()
            ->with('error','old password doesnt matched.');
        }    
        $data->save();
        return redirect()->back()
        ->with('success','Profile updated successfully');
    }

}
