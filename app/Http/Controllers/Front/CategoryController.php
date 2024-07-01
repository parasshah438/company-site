<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use Validator;
use Hash;

class CategoryController extends Controller
{
    public function index(){

    	$allCategories = Category::with('subCategory')->where('status',1)->get();        
        return view('front.category',compact('allCategories'));
    }

    public function category($slug){

    	$category = Category::where('slug',$slug)->first();
    	if(!$category){
        	abort('404');
    	}
    	return $category;    	
    }
}
