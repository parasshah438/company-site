<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_inventory;
use App\Models\Cart;
use App\Models\CartItem;
use Session;
use Response;
use Auth;
use App\Http\Traits\CommonTrait;

class CartController extends Controller
{
    use CommonTrait;

    public $mainCartId;
    public $whereCartCond;

    public function __construct() {
        
        $this->middleware(function ($request, $next) {
            $this->mainCartId = '';

            //Check if user logged in:
            if(Auth::check()){              
                $mainuserid = $this->user = \Auth::user()->id;       
                               
                if($this->user != ''){
                    $cart_sess_id = Session::get('cart_ses_id');
                    if($cart_sess_id != ''){
                        Session::forget('cart_ses_id');
                    }

                    $this->mainCartId =  $this->user;
                    $this->whereCartCond = 'cart.customer_id';
                }
            }          
            //If Guest user:  
            elseif(Session::get('cart_ses_id') != ''){

                $this->mainCartId = Session::get('cart_ses_id');
                $this->whereCartCond = 'cart.id';
            }            
            return $next($request);
        });
    }

    /***Function to get total items from the cart **/
    public function carttotalitems(){       
        //Query to get total items in cart:
        $cart_sess_id = $this->mainCartId;
        if($cart_sess_id != ''){         
            $cart_total = Cart::select('cart.*')            
            ->where($this->whereCartCond, $cart_sess_id)
            ->first();            
        }else{
            $cart_total = '0';
        }

        return $cart_total;
    }
    //-------------------/

    public function display_cart(){

         //$cart_sess_id can hold userid if logeedin and cart session id if guest:----------------        
         $cart_sess_id =  $this->mainCartId;        

         if($cart_sess_id != ''){
            $cart_details = Cart::select('cart.*','cart_items.*','cart_items.id as citemid','products.*','products.id as prodid')
            ->join('cart_items', 'cart_items.cart_id', '=', 'cart.id')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->where($this->whereCartCond, $cart_sess_id)
            ->latest('citemid')->get();

            $totalcart = count($cart_details);

            // Query to get total:
            $cart_total = $this->carttotalitems();

            return view('front.shop.cart', compact('cart_details', 'totalcart', 'cart_total'));           
        }else{
            $totalcart = 0;
            return view('front.shop.cart', compact('totalcart'));
        }
    }

    //Insert new item in cartitem table:    
    public function insertCartItem($request, $cartid){

        $product_id = $request->product_id;
        $quantity = $request->quantity;

        //get product details
        $product_Detail = Product::where(['id'=>$product_id])->first();
        if($product_Detail){                
            $sku = $product_Detail->sku;
            $productname = $product_Detail->name;
            $product_weight = $product_Detail->weight;
            $product_price = $product_Detail->price;           
        }
        //-----------end get product details---------------

        //Get cart item total :
        $total = $this->cartitemtotal($product_price, $quantity);

            $cartItems = new CartItem;
            $cartItems->quantity = $request->get('quantity');
            $cartItems->sku = $sku;
            $cartItems->name = $productname;
            $cartItems->weight = $product_weight;
            $cartItems->price = $product_price;
            $cartItems->product_id =  $request->get('product_id');
            $cartItems->cart_id = $cartid;
            $cartItems->total = $total;
            $cartItems->save();

            //Update Main cart table:   
            $this->updateMainCartTable($cartid);              
    }

    //Cart calculations:
    public function cartitemtotal($price, $quantity){
        $total = $price * $quantity;
        return $total;
    }

    public function updateMainCartTable($cart_session_id){

        //Update total and quantity count in cart main table:
        $cart_Quantity_Sum = CartItem::where(['cart_id'=>$cart_session_id])->sum('quantity');

        $cart_Grand_Total = CartItem::where(['cart_id'=>$cart_session_id])->sum('total');

        $cart_Item_Total = CartItem::where(['cart_id'=>$cart_session_id])->count();

        //If user logged in get cart by user id:
        if(Auth::check()){                       
            Cart::where('customer_id', '=', Auth::user()->id)
                    ->update([                   
                       'items_count'=> $cart_Item_Total,
                       'items_qty'=>$cart_Quantity_Sum,
                       'sub_total'=>$cart_Grand_Total,
                       'grand_total'=>$cart_Grand_Total
                    ]);  
        }else{ //For guest get cart by session:
              Cart::where('id', '=', $cart_session_id)
                    ->update([                   
                       'items_count'=> $cart_Item_Total,
                       'items_qty'=>$cart_Quantity_Sum,
                       'sub_total'=>$cart_Grand_Total,
                       'grand_total'=>$cart_Grand_Total
                    ]);  
        }        
    }

    //update cart when user is logged in:
    public function updatecartitemtotal_user($product_id, $cartuserid){

        $product_Detail = Product::where(['id'=>$product_id])->first();
        $usercart = Cart::where('customer_id', Auth::user()->id)->first();
        $usercart_id = $usercart->id;        

        $cartitem = CartItem::where([
                                    ['cart_id', '=', $usercart_id],
                                    ['product_id', '=', $product_id]
                                ])->first();
        
        $quantity = $cartitem->quantity;
        $price = $product_Detail->price;   

        $total = $this->cartitemtotal($price, $quantity);

        //Update total in cartitem:
        CartItem::where([
                    ['cart_id', '=', $usercart_id],
                    ['product_id', '=', $product_id]
                ])
                ->update([
                   'total'=>$total                                
        ]);                  

        $this->updateMainCartTable($usercart_id);
    }

    public function updatecartitemtotal($product_id, $cart_session_id){

        $product_Detail = Product::where(['id'=>$product_id])->first();

        $cartitem = CartItem::where([
                                    ['cart_id', '=', $cart_session_id],
                                    ['product_id', '=', $product_id]
                                ])->first();
        
        $quantity = $cartitem->quantity;
        $price = $product_Detail->price;        

        $total = $this->cartitemtotal($price, $quantity);

        //Update total in cartitem:
        CartItem::where([
                    ['cart_id', '=', $cart_session_id],
                    ['product_id', '=', $product_id]
                ])
                ->update([
                   'total'=>$total                                
        ]);  

        $this->updateMainCartTable($cart_session_id);
    }

 	public function addToCart(Request $request){ 
 		
 		if($request->isMethod('post')){
 			$product_id = $request->product_id;
 			$quantity = $request->quantity;

 			//Check if product id in post:
 			if(!$product_id){
 				return abort('404');
 			}

           $getProductStock = Product_inventory::select('*')
           ->where('product_id', $product_id)->first()->toArray();
           //echo $getProductStock['qty'];exit;

           if($getProductStock['qty'] < $quantity){
                return Response::json(['success' => '2','message'=>"Requested quantity is not available!"]);   
           }
            
            $cart_session_id = Session::get('cart_ses_id');

            //Check for session & user login and Generate session if not exist:               
            if(empty($cart_session_id) && (!Auth::check()) ){  
                $customerid = '0';
                $is_guest = '1';                
          
                //Save product to cart & cart item table:
                $cart = new Cart;
                $cart->is_guest = $is_guest;
                $cart->customer_id = $customerid;
                /*$cart->customer_first_name = $userDetails->first_name;
                $cart->customer_last_name = $userDetails->last_name;
                $cart->customer_email = $userDetails->email;            $cart->is_active = 1;*/
                $cart->save();
                $lastCartId = $cart->id;

                Session::put('cart_ses_id',$lastCartId);

                if($lastCartId != ''){               
                    //Insert new item in cartitem table:
                    $this->insertCartItem($request, $lastCartId);

                    return Response::json(['success' => '1','message'=>"Product added successfully!"]);                
                }else{
                    return abort('404');
                }
            }else{
                //Check if user logged in and have any items in cart or not:
                if(Auth::check()){

                    //Check if user have already added items to cart:
                    $usercart = Cart::where('customer_id', Auth::user()->id)->first();

                    if($usercart){
                        //If items already added then Check if product already exist in cart:----
                         $isExist = CartItem::leftJoin('cart', 'cart.id', '=', 'cart_items.cart_id')
                            ->where("cart_items.product_id", $product_id)
                            ->where("customer_id", Auth::user()->id)
                            ->exists();   
                    }else{
                        //Start new cart:
                         //If user is logged in and session not found then add new session:
                         if(Auth::check() && empty($cart_session_id)){
                            $cart = new Cart;               
                            $cart->is_guest = '0';
                            $cart->customer_id = Auth::user()->id;
                            $cart->save();
                            //$lastCartId = $cart->id;
                            //Session::put('cart_ses_id',$lastCartId);

                            $isExist = false;
                        }
                    }
                }else{
                    //For guest Check if product already exist in cart:----
                    $isExist = CartItem::where("product_id", $product_id)
                            ->where("cart_id", $cart_session_id)
                            ->exists();   
                }

                //If product already exist in cart then update cart for that particular product for user/guest:-----
                if ($isExist) {                   
                        if(Auth::check())
                        {
                           $get_cartitem = CartItem::leftJoin('cart', 'cart.id', '=', 'cart_items.cart_id')
                                    ->where([
                                        ['cart.customer_id', '=', Auth::user()->id],
                                        ['cart_items.product_id', '=', $product_id]
                                    ])->increment('quantity',$quantity);
                                   
                           //Update total in cartitem on Add to cart:
                           $this->updatecartitemtotal_user($product_id, Auth::user()->id); 
                        }else{
                           //For guest If product already exist in cart then increase quantity:  
                          $get_cartitem = CartItem::where([
                                        ['cart_id', '=', $cart_session_id],
                                        ['product_id', '=', $product_id]
                                    ])->increment('quantity',$quantity);

                           //Update total in cartitem on Add to cart:
                            $this->updatecartitemtotal($product_id, $cart_session_id);
                        }   
                }else{                    
                    //If product not found in cart for particular user/guest then Insert new item in cartitem table:
                    if(Auth::check())
                    {
                        $usercart = Cart::where('customer_id', Auth::user()->id)        ->first();
                        if($usercart){
                            $usercartid = $usercart->id;
                        }

                        $this->insertCartItem($request, $usercartid);
                    }else{
                        $this->insertCartItem($request, $cart_session_id);
                    }
                }                
                
                return Response::json(['success' => '1','message'=>"Product added successfully!"]);
            }
            //----------------------end generate session-----------------------
    	} 		
 	}

    public function cartquantity_update(Request $request)
    {  
        //Check if product already exist in cart:----
        $quantity = $request->quantity;
        $product_id = $request->product_id;
        $cartitemid = $request->cartitemid;

        if(Auth::check()){
            $usercart = Cart::where('customer_id', Auth::user()->id)->first();
            $usercartid = $usercart->id;
            $cart_session_id = $usercartid;
        }else{
            $cart_session_id = Session::get('cart_ses_id');
        }

        if($cart_session_id != '' && $quantity != '' && $product_id != '')
        {
            $isExist = CartItem::where("product_id", $product_id)
                ->where("cart_id", $cart_session_id)
                ->exists();   

        if ($isExist) {                   
              CartItem::where([
                            ['cart_id', '=', $cart_session_id],
                            ['product_id', '=', $product_id]
                        ])->update([
                                'quantity'=>$quantity              
                        ]);

             //Update total in cartitem on Add to cart:
             if(Auth::check()){                
                $this->updatecartitemtotal_user($product_id, Auth::user()->id); 
             }else{
                $this->updatecartitemtotal($product_id, $cart_session_id);
             }

            //Get grand total from cart 
            $grand_total = Cart::where('id',$cart_session_id)->first();
            
            //Get total from cart item:       
            $itemwise_cartdata = CartItem::where(['id'=>$cartitemid,'product_id'=>$product_id])->first();
            $itemwise_total = $itemwise_cartdata->total;
        }            
        
        return Response::json(['success' => '1','message'=>"Quantity updated successfully!",'itemwise_total'=>$itemwise_total,'cartitemid' => $cartitemid,'s_total'=>$grand_total->sub_total,'g_total'=>$grand_total->grand_total]);
        }
    }

    public function deletefromcart(Request $request){

        if($request->citemid != '' && $request->product_id != ''){
           $cartitemid = $request->citemid;
           $product_id = $request->product_id;

           $cart_item = CartItem::where('id',$cartitemid)->first();           
           $cartitem_total = $cart_item->total;
           $cart_id = $cart_item->cart_id;

           $currentCart = Cart::select('id','sub_total','grand_total','items_qty','items_count')->Where('id', $cart_id)->first();

           $curr_subtot = $currentCart->sub_total;
           $curr_gtot = $currentCart->grand_total;
           $curr_qty = ($currentCart->items_qty > $cart_item->quantity) ? $currentCart->items_qty - $cart_item->quantity : 0; 
           $curr_count = ($currentCart->items_count == 1) ? 0 : $currentCart->items_count - 1;

           Cart::Where('id', $cart_id)->update([
                'sub_total'=> $curr_subtot - $cartitem_total,
                'grand_total' => $curr_gtot - $cartitem_total,
                'items_qty' => $curr_qty,
                'items_count' =>  $curr_count
           ]);

           CartItem::where('id', $cartitemid)->delete();

           $nxt_Cart = Cart::select('id','sub_total','grand_total','items_qty')->Where('id', $cart_id)->first();

           $productname = Product::select('id','name')->firstWhere('id', $product_id);
           
           $returnmsg = $productname->name. " removed from cart successfully!";

           $cartitemcount =  CartItem::where('cart_id', $cart_id)->count();
          
           return Response::json(['success' => '1','message'=>"removed from cart successfully",'cartitemid' => $cartitemid,'s_total'=>$nxt_Cart->sub_total,'g_total'=>$nxt_Cart->grand_total,'itmqty'=>$nxt_Cart->items_qty,'count'=>$cartitemcount]);
        }
    }

     public function delete_allfromcart(Request $request){

        $cart_sess_id = Session::get('cart_ses_id');

        if($cart_sess_id != ''){

           Cart::Where('id', $cart_sess_id)->delete(); 
           CartItem::Where('cart_id', $cart_sess_id)->delete();
           Session::forget('cart_ses_id');
           $returnmsg = "Your cart is empty!";
           return Response::json(['success' => '1','message'=>$returnmsg]);  
        }
    }

    public function cart_count(){

        if(Auth::check()){
            $customer_id = Auth::user()->id;
            $cart = Cart::where('customer_id',$customer_id)->first();
            $total_Cart_Count = CartItem::where('cart_id',$cart->id)->count();    
        }else{
            $total_Cart_Count = CartItem::where('cart_id',Session::get('cart_ses_id'))->count();
        }    
        return Response::json(['success' => 1,'cartcountval'=>$total_Cart_Count]);  
    }

    public function displayCartSideBar(){
        
         $cart_sess_id =  $this->mainCartId;
        
        if($cart_sess_id != ''){
            $cart_details = Cart::select('cart.*','cart_items.*','cart_items.id as citemid','products.*','products.id as prodid')
            ->join('cart_items', 'cart_items.cart_id', '=', 'cart.id')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->where($this->whereCartCond, $cart_sess_id)
            ->latest('citemid')->get();

            $totalcart = count($cart_details);

            // Query to get total:
            $cart_total = $this->carttotalitems();
          
            $html = view('layouts.cartsidebar', compact('cart_details', 'totalcart', 'cart_total'))->render();
            return Response::json(['success' => '1','html'=>$html,'totalcart'=>$totalcart]); 
           
        }else{
            //$totalcart = 0;
            //return view('front.shop.cart', compact('totalcart'));
            $cart_details = 0;
            $totalcart = 0;
            $cart_total= 0;
            $htmlw = view('layouts.cartsidebar', compact('cart_details', 'totalcart', 'cart_total'))->render();
            return Response::json(['success' => '1','html'=>$htmlw,'totalcart'=>$totalcart]);
        }   
    }
}
