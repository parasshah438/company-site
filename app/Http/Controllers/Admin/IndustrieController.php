<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Industrie;
use App\Models\Care;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Response;
use Image;

class IndustrieController extends Controller
{
    public function index()
    {
       $category = Industrie::get();
       return view('admin/manage_industries',compact('category'));
    }

    public function view_industries(Request $request)
    {
      $id = $request->get('id');
      $data = Industrie::where('id',$id)->get();
      return response()->json($data);
    }

    public function manage_industries()
    {
      $user = Industrie::latest()->get();
      $data = array();
      foreach ($user as $result) {
        $row = array();
        $row[] = $result['id'];
        if($result['image']!=""){
            $image = '<img src=../public/industrie/'.$result['image'].' height="50px">';
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

    public function add_edit_industries(Request $request){

      $id = $request->get("id");
      $image = request()->file('image');

        
      if($id!=""){

            $validator = Validator::make($request->all(),
            [
                'title' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if($validator->fails())
            {
                $this->response['status'] = 'error';
                $this->response['message'] = $validator->getMessageBag()->toArray();
                return response()->json($this->response);
            }


                $data = Industrie::find($id);
                $data->title = $request->title;
                $image = $request->file('image');    
                if($image){
                    $imagename = $image->getClientOriginalName();  
                    $destinationPath = public_path('/industrie');
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
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if($validator->fails())
            {
                $this->response['status'] = 'error';
                $this->response['message'] = $validator->getMessageBag()->toArray();
                return response()->json($this->response);
            }

        $data = new Industrie;
        $image = $request->file('image');  
        $data->title = $request->title;  
        if($image){
            $imagename = $image->getClientOriginalName();  
            $destinationPath = public_path('/industrie');
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

    public function delete_industries(Request $request)
    {
        $id = $request->get("id");
        Industrie::where('id',$id)->delete();
        return "Successfully record deleted";
    }
}
