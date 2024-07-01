<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\AdminForgotPasswordController;
use App\Http\Controllers\Admin\AdminResetPasswordController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ValuesController;
use App\Http\Controllers\Admin\CaresController;
use App\Http\Controllers\Admin\IndustrieController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\RecognitionController;
use App\Http\Controllers\Admin\WorksController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\JobController;


Route::group(['prefix'=>'admin'],function(){

	Route::group(['middleware'=>'guest:admin'],function(){

		//login
		Route::get('/',[LoginController::class, 'login'])->name('admin.login');
		Route::post('/',[LoginController::class, 'dologin'])->name('admin.login.submit');
	});	

	
	Route::group(['middleware'=>'auth:admin'],function(){

		//dashboard
		Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
		Route::get('admin-logout',[DashboardController::class,'logout'])->name('admin.logout');

		//profile
		Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
		Route::post('/profile',[ProfileController::class, 'update_profile']);
		
		//profile
		Route::get('/change-password', [ProfileController::class, 'change_password'])->name('admin.change-password');
		Route::post('/change-password',[ProfileController::class, 'update_change_password']);


		//job
		Route::get('view_requirement_details',[RequirementController::class,'view_requirement_details']);
		Route::get('requirement',[RequirementController::class,'index']);
		Route::get('view_requirement',[RequirementController::class,'view_requirement']);
		Route::get('manage_requirement',[RequirementController::class,'manage_requirement']);
		Route::get('delete_requirement',[RequirementController::class,'delete_requirement']);
		Route::get('delete_all_requirement',[RequirementController::class,'delete_all_requirement']);


		//category
		Route::get('portfolio-category',[CategoryController::class,'index']);
		Route::get('manage_portfolio_category',[CategoryController::class,'manage_category']);
		Route::get('view_category',[CategoryController::class,'view_category']);
		Route::post('add_edit_category',[CategoryController::class,'add_edit_category']);
		Route::get('delete_portfolio_category',[CategoryController::class,'delete_category']);
		
		//portfolio
		Route::get('portfolio',[PortfolioController::class,'index']);
		Route::get('manage_portfolio',[PortfolioController::class,'manage_portfolio']);
		Route::get('view_portfolio',[PortfolioController::class,'view_portfolio']);
		Route::post('add_edit_portfolio',[PortfolioController::class,'add_edit_portfolio']);
		Route::get('delete_portfolio',[PortfolioController::class,'delete_portfolio']);

		//values
		Route::get('values',[ValuesController::class,'index']);
		Route::get('manage_value',[ValuesController::class,'manage_value']);
		Route::get('view_values',[ValuesController::class,'view_values']);
		Route::post('add_edit_value',[ValuesController::class,'add_edit_value']);
		Route::get('delete_value',[ValuesController::class,'delete_value']);


		//testimonial
		Route::get('testimonial',[TestimonialController::class,'index']);
		Route::get('manage_testimonial',[TestimonialController::class,'manage_testimonial']);
		Route::get('view_testimonial',[TestimonialController::class,'view_testimonial']);
		Route::post('add_edit_testimonial',[TestimonialController::class,'add_edit_testimonial']);
		Route::get('delete_testimonial',[TestimonialController::class,'delete_testimonial']);


		//recognition
		Route::get('works',[WorksController::class,'index']);
		Route::get('manage_works',[WorksController::class,'manage_works']);
		Route::get('view_works',[WorksController::class,'view_works']);
		Route::post('add_edit_works',[WorksController::class,'add_edit_works']);
		Route::get('delete_works',[WorksController::class,'delete_works']);

		//recognition
		Route::get('recognitions',[RecognitionController::class,'index']);
		Route::get('manage_recognitions',[RecognitionController::class,'manage_recognitions']);
		Route::get('view_recognitions',[RecognitionController::class,'view_recognitions']);
		Route::post('add_edit_recognitions',[RecognitionController::class,'add_edit_recognitions']);
		Route::get('delete_recognitions',[RecognitionController::class,'delete_recognitions']);


		//services category
		Route::get('service-category',[ServiceCategoryController::class,'index']);
		Route::get('manage_servicecategory',[ServiceCategoryController::class,'manage_servicecategory']);
		Route::get('view_servicecategory',[ServiceCategoryController::class,'view_servicecategory']);
		Route::post('add_edit_servicecategory',[ServiceCategoryController::class,'add_edit_servicecategory']);
		Route::get('delete_servicecategory',[ServiceCategoryController::class,'delete_servicecategory']);


		//services category
		Route::get('job-openings',[JobController::class,'index']);
		Route::get('manage_job',[JobController::class,'manage_job']);
		Route::get('view_job',[JobController::class,'view_job']);
		Route::post('add_edit_job',[JobController::class,'add_edit_job']);
		Route::get('delete_job',[JobController::class,'delete_job']);


		//industries
		Route::get('technologies',[TechnologyController::class,'index']);
		Route::get('manage_technologies',[TechnologyController::class,'manage_technologies']);
		Route::get('view_technologies',[TechnologyController::class,'view_technologies']);
		Route::post('add_edit_technologies',[TechnologyController::class,'add_edit_technologies']);
		Route::get('delete_technologies',[TechnologyController::class,'delete_technologies']);

		//industries
		Route::get('industries',[IndustrieController::class,'index']);
		Route::get('manage_industries',[IndustrieController::class,'manage_industries']);
		Route::get('view_industries',[IndustrieController::class,'view_industries']);
		Route::post('add_edit_industries',[IndustrieController::class,'add_edit_industries']);
		Route::get('delete_industries',[IndustrieController::class,'delete_industries']);

		//values
		Route::get('care-of-employees',[CaresController::class,'index']);
		Route::get('manage_care_of_employees',[CaresController::class,'manage_care_of_employees']);
		Route::get('view_care_of_employees',[CaresController::class,'view_care_of_employees']);
		Route::post('add_edit_care_of_employees',[CaresController::class,'add_edit_care_of_employees']);
		Route::get('delete_care_of_employees',[CaresController::class,'delete_care_of_employees']);

		//inquiry
		Route::get('inquiry',[InquiryController::class,'index']);
		Route::get('view_inquiry',[InquiryController::class,'view_inquiry']);
		Route::get('manage_inquiry',[InquiryController::class,'manage_inquiry']);
		Route::get('delete_inquiry',[InquiryController::class,'delete_inquiry']);
		Route::get('delete_all_inquiry',[InquiryController::class,'delete_all_inquiry']);
		Route::get('manage_activity_logs',[InquiryController::class,'manage_activity_logs']);

		//user
		Route::get('view_user_details',[DashboardController::class,'view_user_details']);
		Route::get('users',[UserController::class,'index']);
		Route::get('view_user',[UserController::class,'view_user']);
		Route::get('manage_user',[UserController::class,'manage_user']);
		Route::get('delete_user',[UserController::class,'delete_user']);


		//pages
		Route::get('pages',[PageController::class,'index'])->name('page.index');
		Route::get('page/create',[PageController::class,'create'])->name('page.create');
		Route::post('page/create',[PageController::class,'store']);
		Route::get('manage_pages',[PageController::class,'manage_pages']);
		Route::get('page/edit/{id}',[PageController::class,'edit'])
		->name('page.edit');
		Route::post('page/edit/{id}',[PageController::class,'update']);
		Route::get('page/delete/{id}',[PageController::class,'delete_page'])->name('page.delete');



		//pages
		Route::get('services',[ServicesController::class,'index'])->name('services.index');
		Route::get('services/create',[ServicesController::class,'create'])->name('services.create');
		Route::post('services/create',[ServicesController::class,'store']);
		Route::get('manage_services',[ServicesController::class,'manage_services']);
		Route::get('services/edit/{id}',[ServicesController::class,'edit'])
		->name('services.edit');
		Route::post('services/edit/{id}',[ServicesController::class,'update']);
		Route::get('services/delete/{id}',[ServicesController::class,'delete_services'])->name('services.delete');

		Route::get('services/detail/delete/{id}',[ServicesController::class,'delete_services_detail'])->name('service.detail.delete');


		Route::get('manage_user',[UserController::class,'manage_user']);
		Route::get('delete_user',[UserController::class,'delete_user']);


		Route::get('generalsettings',[GeneralSettingsController::class,'index']);
		Route::post('generalsettings',[GeneralSettingsController::class,'update']);

		Route::get('manage-logo',[GeneralSettingsController::class,'manage_logo']);
		Route::post('manage-logo',[GeneralSettingsController::class,'store_logo']);
	});

	//General
	Route::get('refresh_captcha', [GeneralSettingsController::class,'refreshCaptcha'])->name('refresh_captcha');
	//cache
	Route::get('cache_clear',[GeneralSettingsController::class,'cache_clear']);
			
	//admin password reset routes
    Route::post('/password/email',[AdminForgotPasswordController::class,'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('/password/reset',[AdminForgotPasswordController::class,'showLinkRequestForm'])->name('admin.password.request');
    Route::post('/password/reset',[AdminResetPasswordController::class,'reset']);
    Route::get('/password/reset/{token}',[AdminResetPasswordController::class,'showResetForm'])->name('admin.password.reset');
});
