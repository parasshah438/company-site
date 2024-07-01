<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Validator;
use Hash;
use Response;
use Auth;
use App\Models\Generalsetting;

class ExchangerateController extends Controller
{
    
    public function check_rates(Request $request){

        $api_data = Generalsetting::first();

        $key = '17c7dea2d2a983ff90effa300eced266';
        $sender_val = $request->get('sender_val');
        $receiver_val = $request->get('receiver_val');
        $itrval = $request->get('itrval');
        $fee = $api_data->charges_amount;
        $gst = '18';
        $tcs = '10';
        $base = 'USD';
        $title = 'GST';
        $samount = $request->get('samount');

        $rate_response = Http::get("http://api.exchangeratesapi.io/v1/latest?access_key=".$key."&symbols=".$receiver_val."&base=INR")
                ->json(); 
       
        if($sender_val == $receiver_val){
            return response()->json(['status' =>'error','message' =>'Country must be different']);
            exit;
        }

        if(empty($samount)){
            return response()->json(['status' =>'error','message' =>'Amount is required']); 
            exit;
        }

        if(!is_numeric($samount)){
            return response()->json(['status' =>'error','message' =>'Amount is not valid']); 
            exit;
        }

        if($samount == '700000' || $samount > '700000'){

            if($itrval != 'yes'){
                $title = 'TCS';
                $gst_pay_amount = $samount * $tcs / 100;
                $payamount = $fee * $tcs / 100 + $fee + $samount;
                $itr = "yes";

                //user update
                if(Auth::check()) {
                    $id = Auth::user()->id;
                    $data = User::find($id);
                    $data->itrval = 'no';
                    $data->save();    
                }

            }else{
                $title = 'TCS';
                $tcs = '5';
                $gst_pay_amount = $samount * $tcs / 100;
                $payamount = $fee * $tcs / 100 + $fee + $samount;
                $itr = "yes";
                //user update
                if(Auth::check()) {
                    $id = Auth::user()->id;
                    $data = User::find($id);
                    $data->itrval = $request->get('itrval');
                    $data->save();    
                }
            }

            $response = Http::get("http://api.exchangeratesapi.io/v1/convert?access_key=".$key."&from=".$sender_val."&to=".$receiver_val."&amount=".$samount."&base=USD")
                ->json();

          
            
            
            $recipient_gets = $response['result'];
                return response()->json(['status' =>'success',
                    'info'=>$recipient_gets,
                    'payamount'=>$payamount,
                    'gst' => $tcs,
                    'fee' => $fee,
                    'gst_pay_amount' => $gst_pay_amount,
                    'title' => $title,
                    'itr' => $itr,
                    'rate' => $rate_response['rates'][$receiver_val]]);

        }elseif($samount < '5000'){
             return response()->json(['status' =>'error','message' =>'The smallest amount you can send is 5000']); 
        }
        else{           
    
            $gst_pay_amount = $fee * $gst / 100;
            $payamount = $fee * $gst / 100 + $fee + $samount;
            if(!empty($sender_val) && !empty($receiver_val) && $sender_val != $receiver_val){

                $response = Http::get("http://api.exchangeratesapi.io/v1/convert?access_key=".$key."&from=".$sender_val."&to=".$receiver_val."&amount=".$samount."&base=USD")
                ->json();

                $recipient_gets = $response['result'];
                return response()->json(['status' =>'success',
                    'info'=>$recipient_gets,
                    'payamount'=>$payamount,
                    'gst' => $gst,
                    'fee' => $fee,
                    'gst_pay_amount' => $gst_pay_amount,
                    'title' => $title,
                    'rate' => $rate_response['rates'][$receiver_val]]);
            }
        }    
    }
}
