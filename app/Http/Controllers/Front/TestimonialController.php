<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Image;

class TestimonialController extends Controller
{
    public function index(){
        return view('front.testimonial');
    }

    public function storetestimonials(Request $request){
        
    // $validatefrm = $request->validate([ 
    //          'name' => 'required',
    //          'email' => 'required'
    //      ],[
    //          'name.required' => 'Please enter name',
    //          'email.required' => 'Please enter email'
    //      ]
    //  );

        $testimonial = new Testimonial;
        $testimonial->name = $request->get('name');
        $testimonial->description = $request->get('description');

        if($request->hasFile('image')) {
            $photo = $request->file('image');
            $imagename = time().'.'.$photo->getClientOriginalExtension(); 
            $destinationPath = public_path('images/testimonial/');
            $thumb_img = Image::make($photo->getRealPath())
             ->resize(182,190);
            $thumb_img->save($destinationPath.'/'.$imagename,80);
            $testimonial->image = $imagename;
        }

        //Mail Parameters:
        // $contactarr= $contact->toArray();
        // $sendMailTo = config('constants.email_options.SEND_TO_ADMIN_EMAIL');
        
        // $sendMailFrom = $request->get('email');

        // Mail::send('contact.contactemail', $contactarr, function ($message) use ($sendMailTo,$sendMailFrom)
        // {           
        //     $message->from($sendMailFrom);
        //     $message->to($sendMailTo)->subject('Contact Request');
        // });

        $testimonial->save();
        
        return back()->with('success','Successfully added you testimonial');
    }
}
