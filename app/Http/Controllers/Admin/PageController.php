<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {   
        $this->validate($request,
        [
            'title' => 'required|unique:pages',
            'url' => 'required',
            'banner_title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',    
        ]);

        $data = new Page;
            $data->url = $request->url;
            $data->title = $request->title;
            $data->banner_title = $request->banner_title;
            $data->short_description = $request->short_description;
            $data->description = $request->description;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $completeFileName = $request->file('image')->getClientOriginalName();
                $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $compPic = str_replace(' ', '_', $fileNameOnly).'-'. rand() .'_'.time().'.'.$extension;
                $destinationPath = public_path('uploads/pages');
                $image->move($destinationPath,$compPic); 
                $data->image = $compPic;
            }    
            $data->save();
        return redirect()->route('page.index');
    }

    public function manage_pages()
    {
      $user = Page::latest()->get();
      $data = array();
      foreach ($user as $result) {
        $row = array();
        $row[] = $result['id'];
        $row[] = $result['title'];
        $action_column = '<a href="'.route('page.delete',$result['id']).'" id="'.$result['id'].'"><span class="glyphicon glyphicon-trash" style="padding: 0 10px 0 0;"></span></a> ';
        
        $action_column .= '<a href="'.route('page.edit',$result['id']).'" id="'.$result['id'].'"><span class="glyphicon glyphicon-edit" style="padding: 0 10px 0 0;"></span></a> ';

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
        $data = Page::findOrFail($id);
        return view('admin.pages.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {   

        $this->validate($request,
        [
            'title' => 'required|unique:pages,title,'.$id,
            'url' => 'required',
            'banner_title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',    
        ]);

        $data = Page::findOrFail($id);
            $data->url = $request->url;
            $data->title = $request->title;
            $data->banner_title = $request->banner_title;
            $data->short_description = $request->short_description;
            $data->description = $request->description;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $completeFileName = $request->file('image')->getClientOriginalName();
                $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $compPic = str_replace(' ', '_', $fileNameOnly).'-'. rand() .'_'.time().'.'.$extension;
                $destinationPath = public_path('uploads/pages');
                $image->move($destinationPath,$compPic); 
                $data->image = $compPic;
            }    
            $data->save();
        return redirect()->route('page.index');
    }

    public function delete_page(Request $request,$id)
    {
        Page::where('id',$id)->delete();
        return redirect()->route('page.index');
    }
}
