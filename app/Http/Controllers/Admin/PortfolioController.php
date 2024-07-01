<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Category;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Response;
use Image;

class PortfolioController extends Controller
{
    public function index()
    {
       $category = Category::get();
       return view('admin/manage_portfolio',compact('category'));
    }

    public function view_portfolio(Request $request)
    {
      $id = $request->get('id');
      $data = Portfolio::where('id',$id)->get();
      return response()->json($data);
    }

    public function manage_portfolio()
    {
      $user = Portfolio::latest()->get();
      $data = array();
      foreach ($user as $result) {
        $row = array();
        $row[] = $result['id'];
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



    public function add_edit_portfolio(Request $request){

      $id = $request->get("id");
      $image = request()->file('image');

        
            $validator = Validator::make($request->all(),
            [
                'title' => 'required|unique:portfolios,title,'.$id,
                'url' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ],[
                'title.required' => 'Name is required',
                'url.required' => 'Url is required'
            ]);

            if($validator->fails())
            {
                $this->response['status'] = 'error';
                $this->response['message'] = $validator->getMessageBag()->toArray();
                return response()->json($this->response);
            }    


        if($validator->fails())
        {
            $this->response['status'] = 'error';
            $this->response['message'] = $validator->getMessageBag()->toArray();
            return response()->json($this->response);
        }

      
      if($id!=""){
            if($image == "")
            {
                $data = Portfolio::find($id);
                $data->title = $request->input('title');
                $data->category_id = $request->input('category_id');
                $data->url = $request->input('url');
                $data->save();

                $this->response['status'] = 'success';
                $this->response['message'] = "Portfolio update Successfully";
                return response()->json($this->response);
            }
            elseif($image !== ""){
              
                $data = Portfolio::find($id);
                $data->title = $request->input('title');
                $data->category_id = $request->input('category_id');
                $data->url = $request->input('url');
              
                $image = $request->file('image');    
                if($image){
                $imagename = $image->getClientOriginalName();  
                $destinationPath = public_path('/portfolios');
                $thumb_img = Image::make($image->getRealPath())->resize(385, 350);
                $thumb_img->save($destinationPath.'/'.$imagename,80);  
                $data->image = $imagename;
                }
                $data->save();

                $this->response['status'] = 'success';
                $this->response['message'] = "Portfolio update Successfully";
                return response()->json($this->response);
            }
            else
            {
                $data = Portfolio::find($id);
                $data->title = $request->input('title');
                $data->category_id = $request->input('category_id');
                $data->url = $request->input('url');
                $image = $request->file('image');    
                if($image){
                $imagename = $image->getClientOriginalName();  
                $destinationPath = public_path('/portfolios');
                $thumb_img = Image::make($image->getRealPath())->resize(385, 350);
                $thumb_img->save($destinationPath.'/'.$imagename,80);  
                $data->image = $imagename;
                }
                $data->save();

                $this->response['status'] = 'success';
                $this->response['message'] = "Portfolio update Successfully";
                return response()->json($this->response);
            }
      }
      else
      {
        $data = new Portfolio;
        $data->title = $request->input('title');
        $data->category_id = $request->input('category_id');
        $data->url = $request->input('url');
        $image = $request->file('image');    
        
        if($image){
            $imagename = $image->getClientOriginalName();  
            $destinationPath = public_path('/portfolios');
            $thumb_img = Image::make($image->getRealPath())->resize(385, 350);
            $thumb_img->save($destinationPath.'/'.$imagename,80);  
            $data->image = $imagename;
        }
        $data->save();

            $this->response['status'] = 'success';
            $this->response['message'] = "Portfolio update Successfully";
            return response()->json($this->response);
      }
    }

    public function add_edit_portfolios(Request $request)
    {
        $id = $request->get("id");

        $validator = Validator::make($request->all(),
        [
            'name' => 'required|unique:categories,name,'.$id,
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
            $data = Portfolio::find($id);
            $data->name = $request->input('name');
            $data->save();

            $this->response['status'] = 'success';
            $this->response['message'] = "Portfolio update Successfully";
            return response()->json($this->response);
        }
        else
        {
            $data = new Portfolio;
            $data->name = $request->input('name');
            $data->save();

            $this->response['status'] = 'success';
            $this->response['message'] = "Portfolio added Successfully";
            return response()->json($this->response);
        }
    }

    public function delete_portfolio(Request $request)
    {
      $id = $request->get("id");
      Portfolio::where('id',$id)->delete();
      return "Successfully record deleted";
    }
}
