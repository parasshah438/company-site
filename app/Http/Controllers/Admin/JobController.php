<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Care;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Response;
use Image;

class JobController extends Controller
{
    public function index()
    {
       $category = Job::get();
       return view('admin/manage_job',compact('category'));
    }

    public function view_job(Request $request)
    {
      $id = $request->get('id');
      $data = Job::where('id',$id)->get();
      return response()->json($data);
    }

    public function manage_job()
    {
      $user = Job::latest()->get();
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

    public function add_edit_job(Request $request){

        $id = $request->get("id");
        if($id!="")
        {

            $validator = Validator::make($request->all(),
            [
                'title' => 'required|unique:jobs,title,'.$id,
                'position' => 'required',
                'experience' => 'required',
                'qualification' => 'required'
            ]);

            if($validator->fails())
            {
                $this->response['status'] = 'error';
                $this->response['message'] = $validator->getMessageBag()->toArray();
                return response()->json($this->response);
            }

                $data = Job::find($id);
                $data->title = $request->title;
                $data->position = $request->position;
                $data->experience = $request->experience;
                $data->qualification = $request->qualification;
                $data->save();

                $this->response['status'] = 'success';
                $this->response['message'] = "Job Openings details update Successfully";
                return response()->json($this->response);
      }
      else
      {

            $validator = Validator::make($request->all(),
            [
                'title' => 'required|unique:jobs',
                'position' => 'required',
                'experience' => 'required',
                'qualification' => 'required'
            ]);

            if($validator->fails())
            {
                $this->response['status'] = 'error';
                $this->response['message'] = $validator->getMessageBag()->toArray();
                return response()->json($this->response);
            }

                $data = new Job;
                $data->title = $request->title;
                $data->position = $request->position;
                $data->experience = $request->experience;
                $data->qualification = $request->qualification;
                $data->save();  
                $this->response['status'] = 'success';
                $this->response['message'] = "Job Openings details added Successfully";
                return response()->json($this->response);
            }
        }

    public function delete_job(Request $request)
    {
        $id = $request->get("id");
        Job::where('id',$id)->delete();
        return "Successfully record deleted";
    }
}
