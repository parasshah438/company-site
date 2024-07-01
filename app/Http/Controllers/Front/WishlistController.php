<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Response;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->paginate(10);
        return view('front.customer.wishlist', compact('wishlists'));
    }

    
    public function store(Request $request)
    {
        if(Auth::check()){
            $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();

            if($wishlist){
                return 0;
            }else{
                $wishlist = new Wishlist;
                $wishlist->user_id = Auth::user()->id;
                $wishlist->product_id = $request->id;
                $wishlist->save();
            }
            return 1;
            //return view('frontend.partials.wishlist');
        }
        return 0;
    }

    public function remove(Request $request)
    {

        $wishlist = Wishlist::findOrFail($request->id);
        if($wishlist!=null){
            if(Wishlist::destroy($request->id)){
            $wishlists_count = Wishlist::where('user_id', Auth::user()->id)->count(); 
            return Response::json(['success' => '1','message'=>"Item Successfully Removed From Wishlist",'count'=>$wishlists_count]);
               
            }
        }
    }

    public function wishlistcounter(){

        if(Auth::check()){
            $wishlists_count = Wishlist::where('user_id', Auth::user()->id)->count();
            if($wishlists_count){
                return Response::json(['count'=>$wishlists_count]);
            }
            return Response::json(['count'=> 0 ]);
        }    
    }

    public function removell(Request $request){

        Wishlist::where('user_id', Auth::user()->id)->delete(); 
        return Response::json(['success' => '1','message'=>"All The Items From Your Wishlist Have Been Removed"]);
    }
}
