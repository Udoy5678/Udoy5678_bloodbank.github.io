<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\bloodlocation;
use DB;
class searchdonorController extends Controller
{
    //get donor location
    function searchdonor(Request $request)
    {

$lat=$request->lat;
$lon=$request->lon;
//$donor=bloodlocation::whereBetween('lat',[$lat-0.1,$lat+0.1])->whereBetween('lon',[$lon-0.1,$lon+0.1])->get();
$donor=DB::table('blooddonorsign_ups')->join('bloodlocations',
'bloodlocations.id','=','blooddonorsign_ups.location')->join('hospital_newblood_donors',
'blooddonorsign_ups.id','=','hospital_newblood_donors.userid')->where('hospital_newblood_donors.condition','=',"available")->whereBetween('lat',[$lat-0.1,$lat+0.1])->whereBetween('lon',[$lon-0.1,$lon+0.1])->get();
$input1= json_decode(json_encode($donor), True);
return $input1;


    }
    function donor_location(Request $request)
    {

$donor_id=$request->donor_loc_id;
$input= json_decode(json_encode($donor_id), True);
//dd($input);
//$find_location=bloodlocation::where('bn_name',$location)->get();
$find_donor_info=DB::table('blooddonorsign_ups')->join('hospital_newblood_donors','blooddonorsign_ups.id','=',
'hospital_newblood_donors.userid')->where('blooddonorsign_ups.id','=',$input)->get();

$input1= json_decode(json_encode($find_donor_info), True);
//dd($input1);
return view('popup_donor')->withDetails($input1);
//return $find_location;
//return view('popup_donor');  
}
//get blood group provided by user
function sendbloodgroup(Request $req,$id)
{
    $location_id=\Crypt::decrypt($id);
  
    $bloodgroup=$req->bloodgroup;
    $result=DB::table('blooddonorsign_ups')->select('blooddonorsign_ups.username','bloodlocations.name','hospital_newblood_donors.bloodgroup','bloodlocations.id')->join('hospital_newblood_donors',
   'blooddonorsign_ups.id','=','hospital_newblood_donors.userid')->join('bloodlocations',
   'bloodlocations.id','=','blooddonorsign_ups.location')->where('bloodlocations.id','=',$location_id)->where('hospital_newblood_donors.bloodgroup','=',$bloodgroup)->where('hospital_newblood_donors.condition','=',"available")->get();
   //dd($result);
   
   if($result!=Null)
   {
    $input1=json_decode(json_encode($result), True);
    //dd($result);
   return view('popup_donor',compact('input1'))->withDetails($input1);
   }
  
   // var_dump($location_id);
    //var_dump($bloodgroup);
  //$find_user=blooddonorsignUp::where('bn_name',$location)->get();
    

}
//Request for blood 
function message_request_todonor($phonenum_donor)
{
    $phonenum_donor=\Crypt::decrypt($phonenum_donor);
  
$phonenum_donor_own=json_decode(json_encode($phonenum_donor), True);
    
  //dd($phonenum_donor_own);
    return view('user_phonenum')->with('phonenum_donor_own',$phonenum_donor_own);

}
//validatio page for user
function validation_code_page(Request $request,$phonenum_donor_own)
{
    
  $phonenum_donor=\Crypt::decrypt($phonenum_donor_own);
  
  // $phonenum_donor2=\Crypt::decrypt($phonenum_donor1);
$phonenum_donor_own=json_decode(json_encode($phonenum_donor), True);
   
   
    $phonenum_user=$request->phonenum;
   // dd($phonenum_donor_own);
    //dd( $phonenum_user);
 /*   $notification=array(

        'message'=>'Put the validation code here.',
        'alert-type'=>'warning'
          );
          session()->set('notification',$notification);*/
  return view('verification_code',compact('phonenum_donor_own'))->with('phonenum_user',$phonenum_user);
    


}
//validation further
function validation_further(Request $request,$phonenum_donor_own,$phonenum_user,$verification_code)
{

$input_code=$request->code;
$phonenum_donor_own=$phonenum_donor_own;
$phonenum_user=$phonenum_user;
$verification_code_decrypt=\Crypt::decrypt($verification_code);
//d($phonenum_user);
if($input_code==$verification_code_decrypt)
{

    $notification=array(

        'message'=>'Your request has been forwarded.',
        'alert-type'=>'success'
          );
          session()->set('notification',$notification);
    return view('user_contact_donor',compact('phonenum_donor_own'))->with('phonenum_user',$phonenum_user)->with($notification); 
}
else
{
    $notification=array(

        'message'=>'Wrong verification code.',
        'alert-type'=>'error'
          );
          session()->set('notification',$notification);
          return back()->with($notification);

}
}
}