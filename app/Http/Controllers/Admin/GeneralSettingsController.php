<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Generalsetting;
use Artisan;

class GeneralSettingsController extends Controller
{

    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function cache_clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('view:cache');

        return redirect()->back()->with('success','System Cache Has Been Removed.');
    }

    public function manage_logo(){

        $data = Generalsetting::first();
        return view('admin.logo.index',compact('data'));
    }

    public function store_logo(Request $request)
    {
        $generalsetting = GeneralSetting::first();

        if($request->hasFile('site_logo')){

            $site_logo = $request->file('site_logo');
            $imagename = $site_logo->getClientOriginalName();  
            $destinationPath = public_path('/uploads/logo');
            $site_logo->move($destinationPath,$imagename); 
            $generalsetting->site_logo = $imagename;

        }

        if($request->hasFile('footer_logo')){


            $footer_logo = $request->file('footer_logo');
            $imagename = $footer_logo->getClientOriginalName();  
            $destinationPath = public_path('/uploads/logo');
            $footer_logo->move($destinationPath,$imagename); 
            $generalsetting->footer_logo = $imagename;
             
        }

        if($generalsetting->save()){
            return redirect()->back()->with('success','Logo settings has been updated successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong');            
        }
    }


    public function index(){

    	$data = Generalsetting::first();
    	return view('admin.generalsettings.index',compact('data'));
    }

    public function update(Request $request){

    	$general = 
    	[  
            'site_title' => $request->get('site_title'),
    		'site_address' => $request->get('site_address'),
    		'site_conatct' => $request->get('site_conatct'),
    		'site_copyright' => $request->get('site_copyright'),
    		'site_email' => $request->get('site_email'),
    		'site_fb_url' => $request->get('site_fb_url'),
    		'site_instagram_url' => $request->get('site_instagram_url'),
    		'site_youtube_url' => $request->get('site_youtube_url'),
            'site_skype_url' => $request->get('site_skype_url'),
            'site_linkedin_url' => $request->get('site_linkedin_url'),
            'description' => $request->get('description'),
            'home_description' =>$request->get('home_description')
    	];

                if ($request->hasFile('home_banner')) {
                        $image = $request->file('home_banner');
                        $completeFileName = $request->file('home_banner')->getClientOriginalName();
                        $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
                        $extension = $request->file('home_banner')->getClientOriginalExtension();
                        $compPic = str_replace(' ', '_', $fileNameOnly).'-'. rand() .'_'.time().'.'.$extension;
                        $destinationPath = public_path('front_assets/img');
                        $image->move($destinationPath,$compPic); 
                        $general['home_banner'] = $compPic;
                }

    	$data = Generalsetting::where('id',1)->update($general);
    	if($data){
    		return redirect()->back()->with('success','Generalsetting data updated successfully');
    	}
    }
}
