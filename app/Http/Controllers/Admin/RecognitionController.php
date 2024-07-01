<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recognition;
use App\Models\Care;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Response;
use Image;

class RecognitionController extends Controller
{
    public function index()
    {
       $category = Recognition::get();
       return view('admin/manage_recognition',compact('category'));
    }

    public function view_recognitions(Request $request)
    {
      $id = $request->get('id');
      $data = Recognition::where('id',$id)->get();
      return response()->json($data);
    }

    public function manage_recognitions()
    {
      $user = Recognition::latest()->get();
      $data = array();
      foreach ($user as $result) {
        $row = array();
        $row[] = $result['id'];
        if($result['image']!=""){
            $image = '<img src=../public/Recognition/'.$result['image'].' height="50px">';
          }else{
            $image = '<img src="../public/front_assets/img/no-image.png" height="50px">';
          }
        $row[] = $image;
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

    public function add_edit_recognitions(Request $request){

      $id = $request->get("id");
      $image = request()->file('image');

      if($id!=""){

                $validator = Validator::make($request->all(),
                [
                    'image' => 'image|mimes:jpeg,png,jpg|max:2048',
                ]);

                if($validator->fails())
                {
                    $this->response['status'] = 'error';
                    $this->response['message'] = $validator->getMessageBag()->toArray();
                    return response()->json($this->response);
                }   


                $data = Recognition::find($id);
                $image = $request->file('image');   
                if($image){ 
                    $imagename = $image->getClientOriginalName();  
                    $destinationPath = public_path('/recognition');
                    $thumb_img = Image::make($image->getRealPath());
                    $thumb_img->save($destinationPath.'/'.$imagename,80);  
                    $data->image = $imagename;
                }
                $data->save();

                $this->response['status'] = 'success';
                $this->response['message'] = "Recognitions details update Successfully";
                return response()->json($this->response);
      }
      else
      {

        $validator = Validator::make($request->all(),
        [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($validator->fails())
        {
            $this->response['status'] = 'error';
            $this->response['message'] = $validator->getMessageBag()->toArray();
            return response()->json($this->response);
        }

        $data = new Recognition;
        $image = $request->file('image');    
        if($image){
            $imagename = $image->getClientOriginalName();  
            $destinationPath = public_path('/Recognition');
            $thumb_img = Image::make($image->getRealPath());
            $thumb_img->save($destinationPath.'/'.$imagename,80);  
            $data->image = $imagename;
        }
        $data->save();
            $this->response['status'] = 'success';
            $this->response['message'] = "Recognitions details added Successfully";
            return response()->json($this->response);
      }
    }

    public function delete_recognitions(Request $request)
    {
        $id = $request->get("id");
        Recognition::where('id',$id)->delete();
        return "Successfully record deleted";
    }
}
