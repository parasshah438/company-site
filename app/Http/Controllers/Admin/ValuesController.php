<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Value;
use App\Models\Category;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Response;
use Image;

class ValuesController extends Controller
{
    public function index()
    {
       $category = Value::get();
       return view('admin/manage_value',compact('category'));
    }

    public function view_values(Request $request)
    {
      $id = $request->get('id');
      $data = value::where('id',$id)->get();
      return response()->json($data);
    }

    public function manage_value()
    {
      $user = Value::latest()->get();
      $data = array();
      foreach ($user as $result) {
        $row = array();
        $row[] = $result['id'];
        
        if($result['image']!=""){
            $image = '<img src=../public/values/'.$result['image'].' height="50px">';
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


    public function add_edit_value(Request $request){

      $id = $request->get("id");
      $image = request()->file('image');

      
      if($id!=""){

                $validator = Validator::make($request->all(),
                [
                    'title' => 'required|unique:values,title,'.$id,
                    'description' => 'required',
                    'image' => 'image|mimes:jpeg,png,jpg|max:2048',
                ],[
                    'title.required' => 'Name is required',
                    'description.required' => 'Description is required',
                ]);

                if($validator->fails())
                {
                    $this->response['status'] = 'error';
                    $this->response['message'] = $validator->getMessageBag()->toArray();
                    return response()->json($this->response);
                }
              
                $data = Value::find($id);
                $data->title = $request->input('title');
                $data->description = $request->input('description');
              
                $image = $request->file('image');  
                if($image){  
                    $imagename = $image->getClientOriginalName();  
                    $destinationPath = public_path('/values');
                    $thumb_img = Image::make($image->getRealPath())->resize(385, 350);
                    $thumb_img->save($destinationPath.'/'.$imagename,80);  
                    $data->image = $imagename;
                }
                $data->save();

                $this->response['status'] = 'success';
                $this->response['message'] = "Our value details update Successfully";
                return response()->json($this->response);
    
      }
      else
      {

            $validator = Validator::make($request->all(),
            [
                'title' => 'required|unique:values',
                'description' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ],[
                'title.required' => 'Name is required',
                'designation.required' => 'Designation is required'
            ]);

            if($validator->fails())
            {
                $this->response['status'] = 'error';
                $this->response['message'] = $validator->getMessageBag()->toArray();
                return response()->json($this->response);
            }

        $data = new Value;
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $image = $request->file('image');    
        if($image){
            $imagename = $image->getClientOriginalName();  
            $destinationPath = public_path('/values');
            $thumb_img = Image::make($image->getRealPath())->resize(385, 350);
            $thumb_img->save($destinationPath.'/'.$imagename,80);  
            $data->image = $imagename;
        }
        $data->save();

            $this->response['status'] = 'success';
            $this->response['message'] = "Our value details added Successfully";
            return response()->json($this->response);
      }
    }

    public function add_edit_values(Request $request)
    {
        $id = $request->get("id");

        $validator = Validator::make($request->all(),
        [
            'name' => 'required|unique:values,name,'.$id,
        ],[
            'name.required' => 'Name is required',
            'name.unique' => 'Name is already exists'
        ]);

        if($validator->fails())
        {
            $this->response['status'] = 'error';
            $this->response['message'] = $validator->getMessageBag()->toArray();
            return response()->json($this->response);
        }

        if($id!="")
        {
            $data = Value::find($id);
            $data->name = $request->input('name');
            $data->save();

            $this->response['status'] = 'success';
            $this->response['message'] = " Our value details update Successfully";
            return response()->json($this->response);
        }
        else
        {
            $data = new Value;
            $data->name = $request->input('name');
            $data->save();

            $this->response['status'] = 'success';
            $this->response['message'] = "Our value details added Successfully";
            return response()->json($this->response);
        }
    }

    public function delete_value(Request $request)
    {
      $id = $request->get("id");
      Value::where('id',$id)->delete();
      return "Successfully record deleted";
    }
}
