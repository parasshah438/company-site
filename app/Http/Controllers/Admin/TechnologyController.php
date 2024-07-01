<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Models\Care;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Response;
use Image;

class TechnologyController extends Controller
{
    public function index()
    {
       $category = Technology::get();
       return view('admin/manage_technologys',compact('category'));
    }

    public function view_technologies(Request $request)
    {
      $id = $request->get('id');
      $data = Technology::where('id',$id)->get();
      return response()->json($data);
    }

    public function manage_technologies()
    {
      $user = Technology::latest()->get();
      $data = array();
      foreach ($user as $result) {
        $row = array();
        $row[] = $result['id'];
        if($result['image']!=""){
            $image = '<img src=../public/technologys/'.$result['image'].' height="50px">';
          }else{
            $image = '<img src="../public/front_assets/img/no-image.png" height="50px">';
          }
        $row[] = $image;
        $row[] = $result['title'];
        $action_column = '<a href="javascript:void(0);"'.$result['id'].' class="delete" id="'.$result['id'].'"><span class="glyphicon glyphicon-trash" style="padding: 0 10px 0 0;"></span></a> ';
        
        $action_column .= '<a href="javascript:void(0);"'.$result['id'].' class="edit" id="'.$result['id'].'"><span class="glyphicon glyphicon-edit" style="padding: 0 10px 0 0;"></span></a> ';

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

    public function add_edit_technologies(Request $request){

      $id = $request->get("id");
      $image = request()->file('image');

        
      if($id!=""){

            $validator = Validator::make($request->all(),
            [
                'title' => 'required|unique:technologies,title,'.$id,
                'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

            if($validator->fails())
            {
                $this->response['status'] = 'error';
                $this->response['message'] = $validator->getMessageBag()->toArray();
                return response()->json($this->response);
            }


                $data = Technology::find($id);
                $data->title = $request->title;
                $image = $request->file('image');    
                if ($request->hasFile('image')) {
                        $image = $request->file('image');
                        $completeFileName = $request->file('image')->getClientOriginalName();
                        $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
                        $extension = $request->file('image')->getClientOriginalExtension();
                        $compPic = str_replace(' ', '_', $fileNameOnly).'-'. rand() .'_'.time().'.'.$extension;
                        $destinationPath = public_path('technologys');
                        $image->move($destinationPath,$compPic); 
                        $data->image = $compPic;
                }
                $data->save();

                $this->response['status'] = 'success';
                $this->response['message'] = "Technologys details update Successfully";
                return response()->json($this->response);
            
      }
      else
      {

            $validator = Validator::make($request->all(),
            [
                'title' => 'required|unique:technologies',
                'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

            if($validator->fails())
            {
                $this->response['status'] = 'error';
                $this->response['message'] = $validator->getMessageBag()->toArray();
                return response()->json($this->response);
            }

        $data = new Technology;
        $image = $request->file('image');  
        $data->title = $request->title;  
        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $completeFileName = $request->file('image')->getClientOriginalName();
                $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $compPic = str_replace(' ', '_', $fileNameOnly).'-'. rand() .'_'.time().'.'.$extension;
                $destinationPath = public_path('technologys');
                $image->move($destinationPath,$compPic); 
                $data->image = $compPic;
        }
        $data->save();
            $this->response['status'] = 'success';
            $this->response['message'] = "Technologys details added Successfully";
            return response()->json($this->response);
       }
    }

    public function delete_technologies(Request $request)
    {
        $id = $request->get("id");
        Technology::where('id',$id)->delete();
        return "Successfully record deleted";
    }
}
