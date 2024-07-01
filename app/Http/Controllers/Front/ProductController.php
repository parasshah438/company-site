<?php

namespace App\Http\Controllers\Front;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Product_Inventory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Http\Traits\CommonTrait;

class ProductController extends Controller
{
    use CommonTrait;

    public function product(){
      /*  $products = Product::with('productInventory')->where('status',1)->latest()->get();        
        $total_products = count($products);*/
        return view('front.shop.product');
    }

    public function productLoading(){
        
        //8 Product:
        $products = Product::with('productInventory')
                    ->where('status',1)
                    ->latest()->take(8)->get();        
        $totalProducts = count($products);

        //All product:
        $products_total = Product::with('productInventory')
                    ->where('status',1)
                    ->latest()->get();        
        $allTotalProduct = count($products_total);

        $html = view('front.shop.product-load',compact('products','totalProducts','allTotalProduct'))->render();
            return Response::json(['success' => '1','html'=>$html]);         
    }

    public function productLoadMore(Request $request){
        if($request->ajax())
        {   
            $selectedSorting = $request->sortingValue;
            $skipVal = $request->skipVal;

                if($request->id > 0)
                  {
                      $query = Product::with('productInventory');

                      if($selectedSorting == null){                        
                        $query->where('id', '<', $request->id);
                      }
                  }
                  else
                  {
                    $query = Product::with('productInventory');
                  }

                  if( ($selectedSorting != null) && ($query != '') ){
                    
                          if($selectedSorting == '1'){ //Ascending
                              $query->where('status',1)
                                   ->orderBy('price','asc')
                                   ->skip($skipVal)->take(4);
                          }else if($selectedSorting == '2'){ //Decending

                             $query->where('status',1)
                                  ->orderBy('price','desc')
                                  ->skip($skipVal)->take(4);
                          }
                          else if($selectedSorting == '3'){ //Alphabetical
                              $query->where('status',1)   
                                   ->orderBy('name','asc')
                                   ->skip($skipVal)->take(4);
                          }
                          else{ //New Arrival
                             $query->where([ 
                                      ['status', '=', 1],
                                      ['new', '=', 1]
                                  ])->orderBy('created_at','desc')
                                  ->skip($skipVal)->take(4);
                          }

                          $query->get();
                          
                          /*else($request->get('sort') == '0'){ //Popular
                              $products = Products::where('sub_category_id',$subcategory_id)
                              ->where('popular',1)
                              ->where('status',1);
                          }*/
                 }else{
                    $data  = $query->orderBy('id', 'DESC')
                          ->limit(4);
                 }


                // $data
                // dd($data->get()->toArray());exit;
                  $data = $query->get()->toArray(); 
                 // dd($data);exit;

                  $output = '';
                  $last_id = '';
                
                  if(!empty($data))
                  { 
                       foreach($data as $product)
                       {
                        $sku =$product['sku'];
                        $thumbnail =$product['thumbnail'];
                        $productid = $product['id'];
                        $productname = $product['name'];
                        $productprice = $product['price'];


                        $output .= '
                            <div class="col-lg-3 col-md-6">
                    <div class="product-item mb-30">
                        <a href="route(\'shopdetail\','.$sku.')" class="product-img">
                            <img src="public/product/mainimage/'.$thumbnail.'" alt="">
                            <div class="product-absolute-options">
                                <span class="offer-badge-1">2% off</span>
                                <span class="like-icon" title="wishlist" onclick="addToWishList('.$productid.');"></span>
                            </div>
                        </a>
                        <div class="product-text-dt">
                            <p>Available<span>(In Stock)</span></p>
                            <h4>'.$productname.'</h4>
                            <div class="product-price">₹'.$productprice.'<span>$13</span></div><div class="qty-cart">';

                            if(isset($product['productInventory']['qty']) && $product['productInventory']['qty'] > 0){

                                 $output .=  '<button type="button" class="add-cart-btn hover-btn add-to-cart-btn" data-productid = "'.$productid.'"><i class="uil uil-shopping-cart-alt"></i>Add to Cart</button>';
                            }
                            else{                        
                                $output .=  '<button class="add-cart-btn hover-btn" disabled><i class="uil uil-shopping-cart-alt"></i>Out of Stock</button>';
                            }
                        
                            $output .=  '</div>
                            </div>
                            </div>
                        </div>';                        
                        $last_id = $productid;
                       }

                       if($data){
                          $newSkipVal = $skipVal + count($data);
                       }

                       if(count($data) < 4){
                              $output .= '
                                   <div class="more-product-btn">
                                    <button disabled class="show-more-btn hover-btn load-more"
                                        >No Data Found</button>
                                   </div>
                           ';                    
                        }else{
                             $output .= '
                           <div class="more-product-btn">
                            <button type="button" class="show-more-btn hover-btn load-more scrollbtn" data-id="'.$last_id.'" id="load_more_button">Load More</button>
                           
                           </div>
                           ';
                        }
            }//end of empty data
            else{
               $output .= '
                       <div class="more-product-btn">
                        <button disabled class="show-more-btn hover-btn load-more scrollbtn"
                            >No Data Found</button>
                       </div>
               ';                
            }
            return Response::json(['success' => '1','html'=>$output,'newSkipVal'=>$newSkipVal]);
        }
    }

    public function productDetail(Request $request,$sku){        
    	$product_sku = $sku;
    	$productsDetails = Product::with('productInventory')
                            ->where('sku',$sku)->first();    

    	if($productsDetails) {       
            $productid = $productsDetails->id;
      		return view('front.shop.product-detail', compact('productsDetails'));            
        }   
        else{
            return abort('404');            
        }           
    	
    }

    public function new_arrival(){

        $products = $this->getnewarrivalproduct();
        return view('front.shop.new_arrival',compact('products'));
    }

    public function displayProductFilterSideBar(){
        
            
            //$html = view('front.shop.productfilter', compact('cart_details', 'totalcart', 'cart_total'))->render();
            $html = view('front.shop.productfilter')->render();
            return Response::json(['success' => '1','html'=>$html]); 
           
       
   }

   public function getProductSortResult(Request $request){
        $selectedSorting = $request->selectedSorting;

        if($selectedSorting != ''){
            if($selectedSorting == '1'){ //Ascending
                $products = Product::where('status',1)
                            ->orderBy('price','asc');
            }else if($selectedSorting == '2'){ //Decending

                $products = Product::where('status',1)
                            ->orderBy('price','desc');
            }
            else if($selectedSorting == '3'){ //Alphabetical
                $products = Product::where('status',1)
                            ->orderBy('name','asc');
            }
            else{ //New Arrival
                $products = Product::where([ 
                                    ['status', '=', 1],
                                    ['new', '=', 1]
                                ])->orderBy('created_at','desc');
            }
            /*else($request->get('sort') == '0'){ //Popular
                $products = Products::where('sub_category_id',$subcategory_id)
                ->where('popular',1)
                ->where('status',1);
            }*/

            $products = $products->limit(8)->get();
            $totalProducts = count($products);           

            $html = view('front.shop.product-load',compact('products','totalProducts'))->render();
            return Response::json(['success' => '1','html'=>$html]); 
   }

}

}
