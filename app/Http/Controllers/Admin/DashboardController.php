<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Hash;
use Image;
use Artisan;
use App\Models\User;
use App\Models\Blog;
use App\Models\University;
use Carbon\Carbon;
use App\Models\Requirement;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $all_users = Requirement::count();
        $all_inquiry = Contact::count(); 
        $users = User::whereDate('created_at',Carbon::today())->latest()->get();
        $last_login_users = User::whereDate('last_login_at',Carbon::today())->get();
        
        return view('admin.dashboard',compact('users','last_login_users','all_users','all_inquiry'));
    }

    public function view_user_details(Request $request)
    {
      $id = $request->get('id');
      $data = User::where('id',$id)->get();
      return response()->json($data);
    }

    public function profile()
    {        
        return view('admin.profile');
    }

    public function update_profile(Request $request)
    {

        $id = Auth::guard('admins')->user()->id;
        $data = Admin::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');

        if($password = $request->input('password')) {
            if(Hash::check($request->get('password'), Auth::user()->password)) {
                return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password");
            }
            else
            {
                $data->password = Hash::make($request->input('password'));
            }
        }  

        $image = $request->file('image');
        if($image)
        {
            $imagename = $image->getClientOriginalName();  
            $destinationPath = public_path('/admin_assets/admin_profile');
            //$thumb_img = Image::make($image->getRealPath())->resize(100, 100);
            //$thumb_img->save($destinationPath.'/'.$imagename,80); 
            $image->move($destinationPath,$imagename); 
            $data->image = $imagename;  
        }

        $data->save();
        return redirect()->back()->with('success','Profile updated successfully');
    }

    public function logout()
    {   
        Auth::guard('admin')->logout();
        return redirect('admin')->with('success','You have successfully logged out');
    }
}
