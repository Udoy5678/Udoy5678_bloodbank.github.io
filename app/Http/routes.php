<?php

use App\blooddivision;
use App\blooddistrict;
use App\bloodlocation;
use App\hospital;
use App\blooddonorsignUp;
use App\hospital_newblood_donor;

//use DB;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('master');
});
//from hospital to main page
Route::get('/main', function () {
  return view('master');
});

//get all divisions
Route::get('/signUp', 'signsController@signuppage');
/*function () {
    $divisions=blooddivision::all();
    return view('/signUp')->with('divisions',$divisions);
});*/

//get all district based upon divisions
Route::get('/ajax-district', function () {
  $division_id=Input::get('division_id');
  $districts=blooddistrict::where('division_id','=',$division_id)->get();
  
  
  
  return Response::json($districts);
  
  
  
  

});


  //get all locations based upon district
  Route::get('/ajax-location', function () {
    $district_id=Input::get('district_id');
    $locations=bloodlocation::where('district_id','=',$district_id)->get();
    
    
    
    return Response::json($locations);
    
    
    
    
  
  });

  //hospital based upon location
  Route::get('/ajax-hospital', function () {
    $location_id=Input::get('location_id');
    $hospitals=hospital::where('location_id','=',$location_id)->get();
    
    
    
    return Response::json($hospitals);
    
    
    
    
  
  });

  
  //login page
  Route::get('/login','signsController@loginpage');
 
  
  //forgot password
  Route::post('/forgotpassword','signsController@forgotpassword');
  

  //hospital signup page
  
  Route::get('/signUphospital', function () {
    return view('/signUphospitalmainpage');
});
//hospital register
Route::post('/hospitalregister', 'signsController@hospitalregister');
//hospital login page
  

 
 
 //forgot password hospital
 Route::post('/forgotpasswordhospital','signsController@forgotpasswordhospital');
 


 
 


//get blood group from user
Route::post('sendbloodgroup/{id}','searchdonorController@sendbloodgroup');
//send request for blood to donor
Route::get('message_request_todonor/{phonenum_donor}','searchdonorController@message_request_todonor');

//validation code page
Route::get('validation_code_page/{phonenum_donor_own}','searchdonorController@validation_code_page');
//validation code generate

Route::post('validation_further/{phonenum_donor_own}/{phonenum_user}/{verification_code}','searchdonorController@validation_further');
//login return after log out prevent back button in middleware

//session
Route::group(['middleware' => 'revalidate'], function(){
 
//hospital new donor submit
Route::post('/hospital_new_donor_submit/{name}','signsController@hospital_new_donor_submit');
  //insert donor sign up
  Route::get('/insertdonorsignUp','signsController@insertdonor');
  //log in hospital
  Route::get('/loginhospitalmain', function () {
     
    return view('/loginhospitalmain');
  });
  //hospital login verification
Route::post('/hospitalloginverification','signsController@loginhospital');
   //login verification
  Route::post('/loginverification','signsController@logindonor');
   //logout donor
  Route::get('/logout_donor','signsController@logout_donor');
  
  //logout hospital
  Route::get('logouthospital','signsController@logout_hospital');
  //hospital new donor register
 Route::get('hospital_new_donors/{name}', 'signsController@hospital_new_donors');
  //hospital donor search page
 Route::get('searchdonorbyhospital/{name}','signsController@hospital_own_donor_search'); 
//hospital donor own search verify
Route::any('searchdonor/{name}','signsController@hospital_own_donor_search_verify');
//hospital donor edit
Route::get('edit/{id}','signsController@editdonor'); 
//hospital donor update
Route::post('update/{id}','signsController@updatedonor'); 
//hospital page
  Route::get('/hospitalpage', 'signsController@hospitalmainpage');
  //admin log in page
  Route::get('/admin_login', 'signsController@admin_login');
  //log out admin
  Route::get('/logoutadmin', function()
  {
return view('admin_login');

  });
 
 
  //validation donor

Route::get('validate_donor/{input}/{verification_code}', 'signsController@donor_signup');
//donor log out
Route::get('logoutdonor', function ()
{

  return view('/login');
});
//registered donor by admin
Route::get('/register_donor','signsController@register_donor');
 //registered hospitals by admin
 Route::get('/register_hospital', 'signsController@register_hospital');
  //admin log in verification
Route::post('/admin_verification','signsController@admin_verification');
});

//donor map search
Route::get('/donormapsearch', function () {
  return view('/donormapsearch');
});
//find donor my map searchdonor
Route::get('/searchdonormap','searchdonorController@searchdonor');
//user specified donor location
Route::get('donor_location','searchdonorController@donor_location');


 
