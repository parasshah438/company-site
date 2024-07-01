<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\Addresses;
use Session;
use Auth;
use Razorpay\Api\Api;
use Redirect;
use Response;

class CheckoutController extends Controller
{	

	use CommonTrait;
	public $whereCartCond;
    public function checkout(){

    	if(Auth::check()){
            $customer_id = Auth::user()->id;
            $cart = Cart::where('customer_id',$customer_id)->first();
        } 

    	if (!$cart){
            return redirect()->route('cart.index')->with('success',"You don't have any product to checkout.");
		}   
    	return view('front.shop.checkout',compact('cart'));
    }

    public function store_checkout(Request $request){

        //store address

        $user_id = Auth::user()->id;
        $user_address_id = Addresses::where('user_id',$user_id)->first();



    if($user_id == $user_address_id->user_id){

        $address = Addresses::where('user_id',$user_address_id->user_id)->first();
        $address->user_id = Auth::user()->id;
        $address->phone  =  $request->get('phone');  
        $address->email =     $request->get('email'); 
        $address->address =   $request->get('address');
        $address->address_type = $request->get('address_type');
        $address->country_id =   $request->get('country_id');
        $address->state_id =   $request->get('state_id');
        $address->city_id =   $request->get('city_id');
        $address->postal_code =   $request->get('postal_code');
        $address->save();

        /*
        $address = request()->except(['_token']);
        Addresses::where('user_id',$user_address_id->user_id)
                ->update($address);
                 return redirect()->back();
        */

    }else{
        $address = new Addresses;
        $address->user_id = Auth::user()->id;
        $address->phone  =  $request->get('phone');  
        $address->email =     $request->get('email'); 
        $address->address =   $request->get('address');
        $address->address_type = $request->get('address_type');
        $address->country_id =   $request->get('country_id');
        $address->state_id =   $request->get('state_id');
        $address->city_id =   $request->get('city_id');
        $address->postal_code =   $request->get('postal_code');
        $address->save();
    }    

        return redirect()->back();

        $payment_method = $request->get('payment_method');

        
        // if($payment_method == 'cod'){

        //     $orders = new orders;
        //     $orders->user_id = Auth::user()->id;
        //     $orders->product_id  = Auth::user()->id; 
        //     $orders->method = $request->get('payment_method');
        //     $orders->price = 10;
        //     $orders->save();

        //     $html = view('front.shop.order_placed')->with('payment_method',$payment_method)->render();
        //     return Response::json(['status' => '0','html'=>$html,'payment_method'=>$payment_method]);

        //     //return response()->json(['status' => '0','key' => 'rzp_test_YBx4zPRCR0GHbF']);
        // }
        // return response()->json(['status' => '1']);        
    }

    public function razorpay_submit(Request $request){

        // $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
        //     $payment = $api->payment->fetch(request()->razorpay_payment_id);

        //     if(count($input)  && !empty($input['razorpay_payment_id'])) {
        //         try {

        //             $payment->capture(array('amount'=>$payment['amount']));

        //         } catch (\Exception $e) {
        //             return  $e->getMessage();
        //             \Session::put('error',$e->getMessage());
        //             return redirect()->back();
        //         }
        //     }

            $orders = new orders;
            $orders->user_id = Auth::user()->id;
            $orders->product_id  = Auth::user()->id; 
            $orders->method = 'Razorpay';
            $orders->price = $request->get('amount');
            $orders->save();
            return response()->json(['status' => '1']);
        
    }

    public function thyankyou(){

        return view('front.shop.order_placed');
    }
}
