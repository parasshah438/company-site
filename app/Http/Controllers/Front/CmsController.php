<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Help;
use App\Models\Service;
use App\Models\Category;
use App\Models\Portfolio;
use Validator;
use Hash;
use Response;
use App\Models\CmsPage;
use App\Models\Blog;
use App\Models\Page;


class CmsController extends Controller
{

    public function page($sku){

    $data = Page::where('url',$sku)->first();
        if(!$data){
            return abort('404');
        }
        return view('front.cms.page',compact('data','sku'));
    }

    public function about_us(){

        return view('front.cms.about');
    }

    public function career(){

        return view('front.cms.career');
    }

    public function help(){

        $help = Help::latest()->get();
        return view('front.cms.help',compact('help'));
    }

    public function search_help(Request $request){
        
        $search = $request->search;
        if(isset($search) && !empty($search)){
            $help = Help::
                        where('title','LIKE','%'.$search."%")
                        ->orWhere('description','LIKE','%'.$search."%")
                        ->latest()->get();
            $html = view('front.search.help',compact('help'))->render();
            return Response::json(['success' => '1','html'=>$html]); 
        }else{
            $help = Help::latest()->get();
            $html = view('front.search.help',compact('help'))->render();
            return Response::json(['success' => '1','html'=>$html]);
        }
    }

    public function services(){

        $services = Service::latest()->get();
        return view('front.cms.services',compact('services'));
    }

    public function blogs(){

        $blog = Blog::latest()->where('status','active')->paginate('6');
        return view('front.cms.blogs',compact('blog'));
    }

    public function terms_of_service(){

        return view('front.cms.terms_of_service');
    }

    public function legal(){

        return view('front.cms.legal');
    }

    public function privacy_policy(){
        
         return view('front.cms.privacy_policy');
    }

    public function faqs(){
        return view('front.cms.faqs');
    }

    public function team(){
        return view('front.cms.team');
    }

    public function pricing (){
        return view('front.cms.pricing');
    }

    public function portfolio(){

        $data = Category::get();
        $portfolios = Portfolio::get();

        return view('front.cms.portfolio',compact('data','portfolios'));
    }
}
