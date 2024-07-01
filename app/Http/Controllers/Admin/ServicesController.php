<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServicesDetails;
use App\Models\ServiceCategory;

class ServicesController extends Controller
{
    public function index()
    {
        return view('admin.services.index');
    }

    public function create()
    {   
        $category = ServiceCategory::get();
        return view('admin.services.create',compact('category'));
    }

    public function store(Request $request)
    {   
        $data = new Service;
            $data->url = $request->url;
            $data->title = $request->title;
            $data->title1 = $request->title1;
            $data->title2 = $request->title2;
            $data->description1 = $request->description1;
            $data->description2 = $request->description2;
            $data->short_description = $request->short_description;
            $data->description = $request->description;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $completeFileName = $request->file('image')->getClientOriginalName();
                $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $compPic = str_replace(' ', '_', $fileNameOnly).'-'. rand() .'_'.time().'.'.$extension;
                $destinationPath = public_path('uploads/services');
                $image->move($destinationPath,$compPic); 
                $data->image = $compPic;
            }    
            $data->save();
        return redirect()->route('services.index');
    }

    public function manage_services()
    {
      $user = Service::latest()->get();
      $data = array();
      foreach ($user as $result) {
        $row = array();
        $row[] = $result['id'];
        $row[] = $result['title'];
        $action_column = '<a href="'.route('services.delete',$result['id']).'" id="'.$result['id'].'"><span class="glyphicon glyphicon-trash" style="padding: 0 10px 0 0;"></span></a> ';
        
        $action_column .= '<a href="'.route('services.edit',$result['id']).'" id="'.$result['id'].'"><span class="glyphicon glyphicon-edit" style="padding: 0 10px 0 0;"></span></a> ';

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

    public function edit(Request $request,$id)
    {
        $data = Service::findOrFail($id);
        $sdetails = ServicesDetails::where('services_id',$id)->get();
        $category = ServiceCategory::get();
        return view('admin.services.edit',compact('data','category','sdetails'));
    }

    public function update(Request $request,$id)
    {   
        $data = Service::findOrFail($id);
            $data->url = $request->url;
            $data->title = $request->title;
            $data->title1 = $request->title1;
            $data->title2 = $request->title2;
            $data->description1 = $request->description1;
            $data->description2 = $request->description2;
            $data->category_id = $request->category_id;

            $data->short_description = $request->short_description;
            $data->description = $request->description;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $completeFileName = $request->file('image')->getClientOriginalName();
                $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $compPic = str_replace(' ', '_', $fileNameOnly).'-'. rand() .'_'.time().'.'.$extension;
                $destinationPath = public_path('uploads/services');
                $image->move($destinationPath,$compPic); 
                $data->image = $compPic;
            }    

            if($request->services_image != '')
            {
            $arr_services_image = array();
            $arr_services_title = array();
            $arr_services_description = array();

            foreach($request->services_title as $item)
            {
                $arr_services_title[] = $item;
            }

            foreach($request->services_description as $item)
            {
                $arr_services_description[] = $item;
            }

            foreach($request->services_image as $key => $item)
            {
                $arr_services_image[] = $item;
                $file_in_mb = $item->getSize()/1024/1024;
                $main_file_ext = $item->extension();
                $main_mime_type = $item->getMimeType();
                if(($main_mime_type == 'image/jpeg' || $main_mime_type == 'image/png' || $main_mime_type == 'image/svg' || $main_mime_type == 'image/gif') && $file_in_mb <= 2 )
                {
                    $rand_value = md5(mt_rand(11111111,99999999));
                    $final_photo_name = $rand_value.'.'.$main_file_ext;
                    $item->move(public_path('uploads/services_photos'), $final_photo_name);
                    $obj = new ServicesDetails;
                    $obj->services_id = $id;
                    $obj->services_image = $final_photo_name;
                    $obj->services_title = $arr_services_title[$key];
                    $obj->services_description = $arr_services_description[$key];
                    $obj->save();
                }        
            }
        }
        $data->save();
        return redirect()->route('services.index');
    }

    public function delete_services(Request $request,$id)
    {
        Service::where('id',$id)->delete();
        return redirect()->route('services.index');
    }

    public function delete_services_detail(Request $request,$id)
    {
        ServicesDetails::where('id',$id)->delete();
        return redirect()->back();
    }
}
