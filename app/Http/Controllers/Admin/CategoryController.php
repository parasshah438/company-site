<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Response;

class CategoryController extends Controller
{
    public function index()
    {
       return view('admin/manage_category');
    }

    public function view_category(Request $request)
    {
      $id = $request->get('id');
      $data = Category::where('id',$id)->get();
      return response()->json($data);
    }

    public function manage_category()
    {
      $user = Category::latest()->get();
      $data = array();
      foreach ($user as $result) {
        $row = array();
        $row[] = $result['id'];
        $row[] = $result['name']; 
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

    public function add_edit_category(Request $request)
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
            $data = Category::find($id);
            $data->name = $request->input('name');
            $data->save();

            $this->response['status'] = 'success';
            $this->response['message'] = "Category update Successfully";
            return response()->json($this->response);
        }
        else
        {
            $data = new Category;
            $data->name = $request->input('name');
            $data->save();

            $this->response['status'] = 'success';
            $this->response['message'] = "Category added Successfully";
            return response()->json($this->response);
        }
    }

    public function delete_category(Request $request)
    {
      $id = $request->get("id");
      Category::where('id',$id)->delete();
      return "Successfully record deleted";
    }
}
