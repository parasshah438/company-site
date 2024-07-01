<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Front\FrontendController;
use App\Http\Controllers\Front\CmsController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\ServicesController;


Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('view:cache');       
    return '<h1>Cache cleared</h1>';
});


//home
Route::get('/',[FrontendController::class,'index'])->name('front.index');
Route::post('requirement', [FrontendController::class,'requirement_store']);
Route::get('referred_user', [FrontendController::class,'referred_user']);

//cms
Route::get('page/{slug}',[CmsController::class,'page'])->name('front.page');
Route::get('service/{slug}',[ServicesController::class,'page']);


Route::get('about-us',[CmsController::class,'about_us'])->name('front.about_us');
Route::get('career',[CmsController::class,'career'])->name('front.career');
Route::get('portfolio',[CmsController::class,'portfolio'])->name('front.portfolio');
Route::get('faqs',[CmsController::class,'faqs'])->name('front.faqs');
Route::get('privacy-policy',[CmsController::class,'privacy_policy'])->name('front.privacy_policy');


//contact
Route::get('contact-us',[ContactController::class,'index'])->name('front.contact');
Route::post('contact-us',[ContactController::class,'storecontact'])->name('front.store.contact');



//Auth Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

//Auth::routes();
Route::group(['prefix'=>'user'],function(){

    // Login Routes...
    Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class,'login']);
    Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');

    // Registration Routes...
    Route::get('register', [RegisterController::class,'showRegistrationForm'])
    ->name('register');
    Route::post('register', [RegisterController::class,'register']);

    //Password Reset Routes...
    Route::get('password/reset',[ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
    Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class,'reset'])
    ->name('password.update');
    Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');


    //after login
    Route::group(['middleware'=>'auth'],function(){
        
        Route::get('profile',[UserController::class,'profile'])->name('user.profile');
        Route::post('profile',[UserController::class,'upate_profile'])->name('user.profile.update');


        Route::get('change-password',[UserController::class,'change_password'])->name('user.password');
        Route::post('change-password',[UserController::class,'upate_change_password'])->name('user.password.update');



        Route::post('update_profile_picture', [UserController::class,'update_profile_picture'])->name('save.profile.picture');
        Route::get('dashboard',[UserController::class,'dashboard'])->name('customer.dashboard');
        Route::get('wishlists',[WishlistController::class,'index'])->name('wishlists.index');
        Route::post('add_wishlists',[WishlistController::class,'store'])->name('wishlists.store');
        Route::post('wishlists/remove',[WishlistController::class,'remove'])->name('wishlists.remove');
        Route::post('wishlistcounter', [WishlistController::class, 'wishlistcounter'])->name('wishlist.count');
        Route::post('wishlistremovell', [WishlistController::class, 'removell'])->name('wishlist.removell');

    }); 

});    

    
    
   






