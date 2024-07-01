<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_activity;
use App\Models\Countries;
use App\Models\University;
use App\Models\States;
use App\Models\Cities;
use Auth;

class UserController extends Controller
{
    public function index()
    {
       return view('admin/manage_user');
    }

    public function manage_user()
    {
      $user = User::latest()->get();
      $data = array();
      foreach ($user as $result) {
        $row = array();
        $row[] = '<input type="checkbox" class="id cb-element remove" name="id[]" value="'.$result['id'].'">';
        $row[] = $result['id'];
        $row[] = $result['name']; 
        $row[] = $result['email'];
        $row[] = $result['phone'];
        $row[] = date('D/m/y' ,strtotime($result['created_at']));
        $action_column = '<a href="javascript:void(0);"'.$result['id'].' class="delete" id="'.$result['id'].'"><span class="glyphicon glyphicon-trash" style="padding: 0 10px 0 0;"></span></a> ';
        $action_column .= '<a href="javascript:void(0);"'.$result['id'].' class="view" id="'.$result['id'].'"><span class="glyphicon glyphicon-eye-open" style="padding: 0 10px 0 0;"></span></a> ';
         $action_column .= '<a href="javascript:void(0);"'.$result['id'].' class="edit" id="'.$result['id'].'"><span class="glyphicon glyphicon-edit" style="padding: 0 10px 0 0;"></span></a> ';

         $action_column .= '<a title="Export to pdf" href="user-all-details/'.$result['id'].'"
          class="edit">&nbsp; <i class="fa fa-print" aria-hidden="true"></i> &nbsp;</a> ';

          $action_column .= '<a title="Export to excel" href="user-all-details-export/'.$result['id'].'"
          class="edit">&nbsp; <i class="fa fa-file-excel-o" aria-hidden="true"></i> &nbsp;</a> ';

         if($result['status']=='active'){              
      $action_column .= '<a class="text-danger user_status" href="javascript:void(0);" id="'.$result['id'].'" data-id="'.$result['status'].'" title="status">In-Active</a> ';
    }else{              
      $action_column .= '<a class="text-success user_status" href="javascript:void(0);" id="'.$result['id'].'"  data-id="'.$result['status'].'" title="status">Active</a> ';
    } 
        $row[] = $action_column;
        $data[] = $row;
      }

      $results = ["sEcho" => 1,
          "iTotalRecords" => count($data),
          "iTotalDisplayRecords" => count($data),
          "data" => $data
      ];     

      return response()->json($results);
    }

    public function activity_logs()
    {
       return view('admin/manage_activity_logs');
    }

    public function manage_activity_logs()
    {
      $user = User_activity::select('user_activities.*',
        'user_activities.id as activity_id','users.id','users.name','users.email')
      ->leftjoin('users','users.id','user_activities.user_id')
      ->latest()->get();
      $data = array();
      foreach ($user as $result) {
        $row = array();
        $row[] = '<input type="checkbox" class="id cb-element remove" name="id[]" value="'.$result['activity_id'].'">';
        $row[] = $result['log_description'];
        $row[] = $result['name']; 
        $row[] = $result['email'];
        $row[] = $result['ip_address'];
        $row[] = date('D/m/y' ,strtotime($result['created_at']));
        $action_column = '<a href="javascript:void(0);"'.$result['id'].' class="delete" id="'.$result['activity_id'].'"><span class="glyphicon glyphicon-trash" style="padding: 0 10px 0 0;"></span></a> ';
        $action_column .= '<a href="javascript:void(0);"'.$result['id'].' class="view" id="'.$result['id'].'"><span class="glyphicon glyphicon-eye-open" style="padding: 0 10px 0 0;"></span></a> ';
         
         
        $row[] = $action_column;
        $data[] = $row;
      }

      $results = ["sEcho" => 1,
          "iTotalRecords" => count($data),
          "iTotalDisplayRecords" => count($data),
          "data" => $data
      ];     

      return response()->json($results);
    }

    public function view_user(Request $request)
    {
      $id = $request->get('id');
      $data = User::where('id',$id)->get();
      return response()->json($data);
    }

    public function delete_user_activity(Request $request)
    {
      $id = $request->get("id");
      User_activity::where('id',$id)->delete();
      return "Successfully record deleted";
    }

    public function delete_all_user_activity(Request $request)
    {
      $id = $request->get('id');
      User_activity::Wherein('id',$id)->delete();
      return "Successfully record deleted";
    }

    public function view_user_activity(Request $request)
    {
      $id = $request->get('id');
      $data = User::where('id',$id)->get();
      return response()->json($data);
    }

    public function delete_user(Request $request)
    {
      $id = $request->get("id");
      User::where('id',$id)->delete();
      return "Successfully record deleted";
    }

    public function delete_all_user(Request $request)
    {
      $id = $request->get('id');
      User::Wherein('id',$id)->delete();
      return "Successfully record deleted";
    }

    public function user_all_details(Request $request,$id){

      $user = User::find($id);
      if(!$user){
          return redirect()->route('users.list');
      }

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


      $data = User::where('id',$id)->first();

      return view('admin.user_all_details',compact('countries','country_name','state_name','city_name','university','institute_name','data'));
    }

    public function user_all_details_export(Request $request,$id){

      $user = User::find($id);
      if(!$user){
          return redirect()->route('users.list');
      }

      $country_id  = $user->country_id;
        if(!empty($country_id)){
            $country = Countries::where('id',$country_id)->first();
            $country_name = $country->name;
        }else{
            $country_name = '';
        }

      $beneficiary_country_id  = $user->beneficiary_country_id;
        if(!empty($beneficiary_country_id)){
            $country = Countries::where('id',$beneficiary_country_id)->first();
            $b_country_name = $country->name;
        }else{
            $b_country_name = '';
        }

        $beneficiary_state_id  = $user->beneficiary_state_id;
        if(!empty($beneficiary_state_id)){
            $state = States::where('id',$beneficiary_state_id)->first();
            $b_state_name = $state->name;
        }else{
            $b_state_name = '';
        }

        $state_id  = $user->state_id;
        if(!empty($country_id)){
            $state = States::where('id',$state_id)->first();
            $state_name = $state->name;
        }else{
            $state_name = '';
        }
            
        $city_id  = $user->city_id;
        if(!empty($city_id)){
            $city = Cities::where('id',$city_id)->first();
            $city_name = $city->name;
        }else{
            $city_name = '';
        }

        $beneficiary_city_id  = $user->beneficiary_city_id;
        if(!empty($beneficiary_city_id)){
            $city = Cities::where('id',$beneficiary_city_id)->first();
            $b_city_name = $city->name;
        }else{
            $b_city_name = '';
        }
            
        $institute_id  = $user->institute;
        if(!empty($institute_id)){
            $institute = University::where('id',$institute_id)->first();
            $institute_name = $institute->name;
        }
        else{
            $institute_name = '';
        }
        $countries = Countries::get();
        $university = University::where('status','active')->get();

      $data = User::where('id',$id)->get();

      return view('admin.user_all_details_export',compact('countries','b_city_name','b_state_name','b_country_name','country_name','state_name','city_name','university','institute_name','data'));
    }
}
