<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServicesDetails;

class ServicesController extends Controller
{
    public function page($sku)
    {

        $data = Service::where('url',$sku)->first();
        $service_list = ServicesDetails::where('services_id',$data->id)->get();  
        if(!$data){
            return abort('404');
        }
        return view('front.service.page',compact('data','service_list'));
    }
}
