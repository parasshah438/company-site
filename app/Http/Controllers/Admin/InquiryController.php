<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class InquiryController extends Controller
{
    
    public function index()
    {
       return view('admin/manage_inquiry');
    }

    public function manage_inquiry()
    {
      $user = Contact::latest()->get();
      $data = array();
      foreach ($user as $result) {
        $row = array();
        $row[] = $result['id'];
        $row[] = $result['services']; 
        $row[] = $result['name'];
        $row[] = $result['email'];
        $row[] = $result['phone'];
        $row[] = $result['subject'];
        $row[] = $result['messages'];
        $row[] = $result['created_at']->format('jS F Y h:i:s A');
        
        $action_column = '<a href="javascript:void(0);"'.$result['id'].' class="delete" id="'.$result['id'].'"><span class="glyphicon glyphicon-trash" style="padding: 0 10px 0 0;"></span></a> ';
      
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

    public function delete_inquiry(Request $request)
    {
      $id = $request->get("id");
      Contact::where('id',$id)->delete();
      return "Successfully record deleted";
    }  
}
