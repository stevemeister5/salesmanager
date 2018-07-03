<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Redirect from home page straight to login page
Route::view('/', 'auth.login');

//Activate Authentication
Auth::routes();

//First Time Landing
Route::get('/dashboard', 'DashboardController@landing')->name('dashboard');

//First Time Password Change
Route::post('/first_changepsw', 'DashboardController@first_changepsw')->name('first_changepsw');

//All Sales Related Routing
Route::prefix('sales')->group(function() {
    ############################
    #CREATE, VIEW & EDIT SALES##
    ############################
    //Record Sale
    Route::get('/make','sales\SaleController@make')->name('new_sale');

    //Save Sale
    Route::post('/save','sales\SaleController@save')->name('save_sale');

    //View Sale
    Route::get('/view','sales\SaleController@vista')->name('view_sale');

});


//All Staff Related Routing
Route::prefix('staff')->group(function(){


    ####################
    #MANAGE STAFF ROLE#
    ###################

    //Create Staff Role
    Route::get('/manage/staff_role/make','staff\StaffControllerManage@new_staff_role')->name('new_staff_role');
    //Save Staff Role
    Route::post('/manage/staff_role/save','staff\StaffControllerManage@save_staff_role')->name('save_staff_role');
    //Edit Staff Role
    Route::get('/manage/staff_role/edit','staff\StaffControllerManage@view_staff_role')->name('edit_staff_role');
    //Get Edit Staff Role Additional Information
    Route::post('/manage/staff_role/get_edit','AdditionalDataController@get_edit_staff_role')->name('get_edit_staff_role');
    Route::post('/manage/staff_role/get_view','AdditionalDataController@get_view_staff_role')->name('get_view_staff_role');
    //Save Edit Staff Role
    Route::post('/manage/staff_role/save_edit','staff\StaffControllerManage@save_edit_staff_role')->name('save_edit_staff_role');

    ###########################
    #CREATE, VIEW & EDIT STAFF##
    ###########################
	//Create staff
    Route::get('/make','staff\StaffController@make')->name('new_staff');
	
	//Save Staff
    Route::post('/save','staff\StaffController@save')->name('save_staff');
	
	//Save Staff Edits
    Route::post('/save_edits','staff\StaffController@save_edits')->name('save_edits');
	
    //View Staff
    Route::get('/vista','staff\StaffController@vista')->name('vista_staff');
	
	//Edit Staff
	Route::get('/edit','staff\StaffController@vista')->name('edit_staff');

	
	
});

//All Additional Data Requests

##STAFF
Route::post('/additional_data_staff_roles', 'AdditionalDataController@get_staff_roles')->name('get_staff_roles');
Route::post('/additional_data_username_check', 'AdditionalDataController@username_check')->name('username_check');
Route::post('/additional_data_dynamic_staff_build', 'AdditionalDataController@dynamic_staff_build')->name('dynamic_staff_build');
Route::post('/additional_data_dynamic_staff_query', 'AdditionalDataController@dynamic_staff_query')->name('dynamic_staff_query');
Route::post('/additional_data_dynamic_staff_view', 'AdditionalDataController@dynamic_staff_view')->name('dynamic_staff_view');
Route::post('/additional_data_dynamic_staff_edit', 'AdditionalDataController@dynamic_staff_edit')->name('dynamic_staff_edit');
Route::get('/additional_data_dynamic_staff_print/{id?}', 'AdditionalDataController@dynamic_staff_view')->name('dynamic_staff_print');

