<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use App\blooddivision;
use DB;
use Session;
use \Crypt;
use App\blooddonorsignUp;

class signsController extends Controller
{
  function _construct() { $this->global = "some value";} 
//insertion donorsignUp



function signuppage()
{
  
   

  $divisions=blooddivision::all();
  return view('/signUp')->with('divisions',$divisions);
}


    function insertdonor(Request $request)
    {
 
 
      $firstname=$request->input('firstName');
      
      $lastname=$request->input('lastName');
      $username=$request->input('username');
      $email=$request->input('email');
      $password=$request->input('password');
      $gender=$request->input('gender');
      $birthday=$request->input('birthday');
      $division=$request->input('division');
      $district=$request->input('district');
      $location=$request->input('location');
      $hospital=$request->input('hospital');
      $phonenum=$request->input('phonenum');

      
      
  
   //var_dump($firstname);
      $username_exist=DB::table('blooddonorsign_ups')->where('username','=',$username)->get();
   // dd($query);
   $phonenum_exist=DB::table('blooddonorsign_ups')->where('phonenum','=',$phonenum)->get();
      if(  $username_exist!=NULL)
      {
        $notification=array(

          'message'=>'Username already exists.',
          'alert-type'=>'error'
            );
            session()->set('notification',$notification);
             return back()->with($notification);
      }
      elseif($phonenum_exist!=NULL)
      {
        $notification=array(

          'message'=>'Phone Number already exists.',
          'alert-type'=>'error'
            );
            session()->set('notification',$notification);
             return back()->with($notification);

      }
     
   else
    {
   
         

       $data=array('firstname'=>$firstname,'lastname'=>$lastname,'username'=>$username,
      'email' =>$email,'password'=>$password, 'gender' =>$gender,'birthday' =>$birthday,
       'division'=>$division,'district'=>$district,'location'=>$location,'hospital'=>$hospital,'phonenum'=>$phonenum);
       //$input=implode($data, ',');
       $query = http_build_query(array('aParam' => $data));
       $input=json_decode(json_encode( $query), True);
     //  dd($input );
    //  $donor_info=DB::table('bloodlocations')->join('hospitals','bloodlocations.id','=','hospitals.location_id')->where('bloodlocations.id','=',$location)->get();
  //    $input=json_decode(json_encode($data), True);
     // dd($phonenum);
      
    //  $inserts=DB::table('blooddonorsign_ups')->insert($data);
     
     // $input1=json_decode(json_encode(  $inserts), True);
     
    //  return view('bloodbank_to_donor',compact('input'))->with('phonenum', $phonenum);
    return view('donor_verify',compact('input'))->with('phonenum', $phonenum);
      //get message from us about donor profile
     // return response()->json([
      //  "message" => "You have registered successfully"
  //]);
      //return dd($input1);
   //    return view('/logindonorprofile')->with('inserts',$inserts);
   //return view('/logindonorprofile')->withDetails( $input1);
    
 
  }}
    //main login page
    function loginpage()
    {

      return view('/login');
    }
    //login verification
    function logindonor(Request $request)
    {
      $username=$request->input('username');
      $password=$request->input('password');
    // dd( $password);
    $verify=DB::table('blooddonorsign_ups')->where('username','=',$username )->where('password','=',$password)->get();
     $query=DB::table('blooddonorsign_ups')->join('hospital_newblood_donors','blooddonorsign_ups.id','=','hospital_newblood_donors.userid')->join('bloodlocations','blooddonorsign_ups.location','=','bloodlocations.id')->where('username','=',$username )->where('password','=',$password)->get();
   
   // $hospital_register_donor=DB::table('blooddonorsign_ups')->where('username','=',$username)->get();
    $input1=json_decode(json_encode(  $query), True);
    /*json_decode,encode pure array*/
    //dd($input1);

 //  $wrong=DB::table('blooddonorsign_ups')->where('username','=',$username)->where('password','=',$password)->get();

   //var_dump($hospital_register_donor_find);
    if($verify!=NULL)
     {
    
     if($input1!=NULL)
     {
         //  echo "success";
           $notification=array(

         'message'=>'Successfully logged in',
         'alert-type'=>'success'
           );
           session()->set('notification',$notification);
          // $request->session()->flash($notification);
//return back()->with($notification);
return view('/logindonorprofile')->withDetails($input1)->with('notification',$notification);
     }
     
      else
      {
        
      // return response()->json([
      //   "message" => "Your Profile has been postponed.please go to hospital for registartion."
      // ]);
      $notification=array(

        'message'=>'Your Profile has been postponed.please go to hospital for registartion.',
        'alert-type'=>'warning'
          );
          session()->set('notification',$notification);
           return back()->with($notification);
      }
    
     }
    
    else
    {
      $notification=array(

        'message'=>'Wrong username and password',
        'alert-type'=>'error'
          );
          session()->set('notification',$notification);
           return back()->with($notification);
     // return response()->json([
      //  "message" => "Wrong username and password."
    // ]);

    }

      
    }
    //forgot password
    function forgotpassword(Request $request)
    {
     $email=$request->input('email');
     $query=DB::table('blooddonorsign_ups')->where('email','=',$email )->get();
      if($query!=NULL)
      {
        return response()->json([
          "message" => "The instructions have been given via mail"
          ]);
      }
      else
      {
        return response()->json([
          "message" => "You are not a registered donor"
          ]);

      }
    }
    //hospital main page
    function hospitalmainpage()
    {

      return view('/hospitalpage');
    }
    //hospital register

function hospitalregister(Request $request)
{
      $hospitalname=$request->input('hospitalname');
      $password=$request->input('password');
      $email=$request->input('email');
      
      $query=DB::table('hospitalsignupnames')->where('name','=',$hospitalname )->get();
      $query2=DB::table('loginhospitals')->where('name','=',$hospitalname )->get();
      if($query!=NULL)
      {
        if($query2==NULL)
        {
        $data=array('name'=>$hospitalname,
        'password'=>$password,'email'=>$email );
        $input1=DB::table('loginhospitals')->insert($data);
        return view('/after_hospital_login',compact('input1'));
      }
      else
      {
        return response()->json([
          "message" => "this hospital is already  registered "
          ]);
      }
      }
      else
      {
        return response()->json([
          "message" => "You are not  registered "
          ]);

      }

}


//login verification hospital
function loginhospital(Request $request)
{
  
  
  
  $hospitalname=$request->input('hospitalname');
  //dd($hospitalname);
  $password=$request->input('password');
  $query=DB::table('loginhospitals')->where('name','=', $hospitalname )->where('password','=',$password)->get();
  //dd($query);
  
  $input1= json_decode(json_encode($query), True);
 
  if($query!=NULL)
  {
    $notification=array(

      'message'=>'Successfully logged in.',
      'alert-type'=>'success'
        );
        session()->set('notification',$notification);
       
  //  $input1=DB::table('hospitalsignupnames')->where('name','=', $hospitalname )->get();
  //  $input1= json_decode(json_encode($hospital_id), True);
   // $id=$input1->hospital_id;
    return view('/after_hospital_login',compact('input1'))->with($notification);
    //return response()->json([
    //  "message" => "success"
 // ]);
  }
  else
  {
    $notification=array(

      'message'=>'Wrong username and password.',
      'alert-type'=>'error'
        );
        session()->set('notification',$notification);
return view('loginhospitalmainpage')->with($notification);
  }
}
  

//forgot password hospital
function forgotpasswordhospital(Request $request)
{
 $email=$request->input('email');
 $query=DB::table('loginhospitals')->where('email','=',$email )->get();
  if($query!=NULL)
  {
    return response()->json([
      "message" => "The instructions have been given via mail"
      ]);
  }
  else
  {
    return response()->json([
      "message" => "You are not a registered donor"
      ]);

  }
}
//hospital new donor main page


function hospital_new_donors($name)
{
  
  //dd(session()->get('global_variable'));
  

  
  
    $name=\Crypt::decrypt($name);
    // dd($name);
     return view('hospital_new_donor_reg')->with('name',$name);

  
  
 
    



}
//hospital new donor submit
function hospital_new_donor_submit(Request $request,$name)
{
 
  $name=\Crypt::decrypt($name);

  $user=$request->input('id');
 // 
  $username=$request->input('username');
  $bloodgroup=$request->input('bloodgroup');
  $condition=$request->input('condition');
 
  $verify_donor=DB::table('hospitalsignupnames')->where('name','=',$name )->get();

 $query_verify= json_decode(json_encode( $verify_donor), True);

//dd($query_verify);
 $verify_donor_hospital=DB::table('blooddonorsign_ups')->where('hospital','=',$query_verify[0]['id'])->where('username','=',$username)->get();

 //dd($verify_donor_hospital);
 
  $query2=DB::table('blooddonorsign_ups')->where('username','=',$username )->get();
 $query= json_decode(json_encode($query2), True);
if($verify_donor_hospital!=NULL)
{
    //   if($query2!=NULL)
     //  {
        $user_duplication_check=DB::table('hospital_newblood_donors')->where('userid','=',$query[0]['id'] )->get();
         if($user_duplication_check==NULL)//no duplication
         {
       $data=array('userid'=>$query[0]['id'],
      'bloodgroup'=>$bloodgroup,'condition'=>$condition );
      //var_dump($data);
      $input1=DB::table('hospital_newblood_donors')->insert($data);
      $find_hospital=DB::table('hospitals')->where('id','=',$query_verify[0]['hospital_id'])->get();
    //  dd($query);
    $find_hospital_query= json_decode(json_encode($find_hospital), True);
      
    $notification=array(

      'message'=>'Donor Profile created  successfully.',
   'alert-type'=>'success'
      );
  session()->set('notification',$notification);
//return view('loginhospitalmainpage')->with($notification);
        return view('hospital_to_donor',compact('query'),compact('find_hospital_query'))->with($notification);
      }
      else
      {
        $notification=array(

          'message'=>'This donor is already registered.',
          'alert-type'=>'error'
            );
            session()->set('notification',$notification);
    return back()->with($notification);
    
      }
    }
    
     else
     {
      $notification=array(

        'message'=>'This  is not your hospital registered donor.',
        'alert-type'=>'error'
          );
          session()->set('notification',$notification);
  return back()->with($notification);

     }
    
    }
    //hospital own donor search
    function hospital_own_donor_search($name)
    {
      //for preventing back button
  

  $name=\Crypt::decrypt($name);

  // dd($name);
  $notification=array(

    'message'=>'Search donor by their username.',
    'alert-type'=>'warning'
      );
      session()->set('notification',$notification);
//return back()->with($notification);
    return view('/hospital_search_donor')->with('name',$name)->with($notification);


    




    }
    //hospital own donor verification search
    function hospital_own_donor_search_verify(Request $request,$name)
    {
      $name=\Crypt::decrypt($name);

      $search=$request->input('search');
     // dd($search);
     // 
    //  $username=$request->input('username');
    //  $bloodgroup=$request->input('bloodgroup');
     // $condition=$request->input('condition');
     
      $verify_donor=DB::table('hospitalsignupnames')->where('name','=',$name )->get();
    
     $query_verify= json_decode(json_encode( $verify_donor), True);
    
   // dd($query_verify);
     $verify_donor_hospital=DB::table('blooddonorsign_ups')->join('hospital_newblood_donors','blooddonorsign_ups.id','=','hospital_newblood_donors.userid')->where('hospital','=',$query_verify[0]['id'])->where('username','=',$search)->get();
    
     //dd($verify_donor_hospital);
     
    //  $query2=DB::table('blooddonorsign_ups')->where('username','=',$username )->get();
    // $query= json_decode(json_encode($query2), True);
    if($verify_donor_hospital!=NULL)
    {
      $input1= json_decode(json_encode($verify_donor_hospital), True);
     // dd($input1);
     $notification=array(

      'message'=>'Successfully search completed.',
      'alert-type'=>'success'
        );
        session()->set('notification',$notification);
      return view('hospital_search_donor',compact('name'))->withDetails( $input1)->with($notification);

          
        }
         else
         {
          $notification=array(

            'message'=>'This donor is not your hospital registered donor.',
            'alert-type'=>'error'
              );
              session()->set('notification',$notification);
              return view('/hospital_search_donor',compact('name'))->with($notification);
          
    
         }
        


    }
    
    //edit donor info by hospital with decryption {{with foreign key}}
    function editdonor($id)//passed by routes
    {
  
  $input=\Crypt::decrypt($id);
  //query more than one table
  
  $result=DB::table('blooddonorsign_ups')->select('blooddonorsign_ups.id','blooddonorsign_ups.username','bloodgroup','condition')->join('hospital_newblood_donors',
   'blooddonorsign_ups.id','=','hospital_newblood_donors.userid')->where('blooddonorsign_ups.id','=',$input)->get();
  $input1= json_decode(json_encode($result), True);
  //var_dump($input1);
//dd($input1);
//$notification=array(

  //'message'=>'You have authority to edit only permissible filed.',
  //'alert-type'=>'warning'
  //  );
  //  session()->set('notification',$notification);
   

    return view('editdonor',compact('input1'));

    
  }
    //update donor info
    function updatedonor( Request $request,$id)
    {
 
     //decrypt userid
   $userid=\Crypt::decrypt($id);
   $inp = $request->all();
   
   $username=$request->input('username');
   $bloodgroup=$request->input('bloodgroup');
   $condition=$request->input('condition');
   $input1= json_decode(json_encode($userid), True);
  
 
  $data=array('userid'=>$userid,'bloodgroup'=>$bloodgroup,'condition'=>$condition);
  $query=DB::table('hospital_newblood_donors')->where('userid','=',$input1)->Update($data);
  var_dump($query);  
  $notification=array(

    'message'=>'Donor profile has been updated.',
    'alert-type'=>'success'
      );
      session()->set('notification',$notification);
   return back()->with($notification);

    
  }   
    //log out donor
    function logout_donor()
  {

   
    return view('login');

  }
  //log out hospital
    function logout_hospital()
  {
 
   
   
    $notification=array(

      'message'=>'Successfully log out.',
      'alert-type'=>'success'
        );
        session()->set('notification',$notification);
return view('loginhospitalmainpage')->with($notification);

   

  }
  //admin log in page


  function admin_login()
{

return view('admin_login');

}
//admin log in verification
function admin_verification(Request $request)
{

$admin_name=$request->username;
$admin_password=$request->password;
$admin_table=DB::table('admins')->where('admin_name','=',$admin_name)->where('admin_password','=',$admin_password)->get();
if($admin_table!=NULL)
{
  $notification=array(

    'message'=>'Successfully logged in.',
    'alert-type'=>'success'
      );
      session()->set('notification',$notification);
return view('donor_hospital_info')->with($notification);

}



}
//admin register donor
function register_donor()
{

$donor_info=DB::table('blooddonorsign_ups')->select('firstname','lastname','username','password','gender','birthday','phonenum','email','blooddivisions.name','blooddistricts.name','bloodlocations.name','hospitals.hospital_name','hospital_newblood_donors.bloodgroup','hospital_newblood_donors.condition')
->join('bloodlocations','bloodlocations.id','=','blooddonorsign_ups.location')->join('blooddistricts','blooddistricts.id','=','bloodlocations.district_id')->join('blooddivisions','blooddivisions.id','=','blooddistricts.division_id')->join('hospitals','hospitals.location_id','=','bloodlocations.id')->join('hospital_newblood_donors','hospital_newblood_donors.userid','=','blooddonorsign_ups.id')->get();
//dd($donor_info);
   $input1= json_decode(json_encode($donor_info), True);
 //  dd($input1);
return view('register_donor')->withDetails($input1);






}
//admin hospital register info
function register_hospital()
{

$admin_hospital=DB::table('hospitals')->select('hospital_name','loginhospitals.name','password')->join('hospitalsignupnames','hospitals.id','=','hospitalsignupnames.hospital_id')->join('loginhospitals','loginhospitals.name','=','hospitalsignupnames.name')->get();
$input1= json_decode(json_encode($admin_hospital), True);
//  dd($input1);
return view('register_hospital')->withDetails($input1);


}
//sign up donor
function donor_signup(Request $request,$input,$verification_code)
{

  $input_code=$request->code;
  //url decode  changes the symbols which is converted into it's original image
 //dd(urldecode($input));
 $url_decode=urldecode($input);
 //dd($url_decode);
// echo htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
  $verification_code_decrypt=\Crypt::decrypt($verification_code);
 // $a=substr($input,21,28);
  $length=strlen($url_decode);
  $donor=array();
  $phone=array();
  for($i=0;$i<$length;$i++)
  {
if($url_decode[$i]=='=')
{
//dd($i);
  for($j=$i+1;$j<$length;$j++)
  {
   
    if($url_decode[$j]=='&'){
    //  dd($j);
    //  for($k=$i+1;$k<$j;$k++)
    //  {
     
    //   echo $input[$k];
    // }
    $donor[]=substr($url_decode,$i+1,$j-($i+1));
 // dd($a);
 // dd ($a);
     
      break;
    }
  }
  
 // break;

}
elseif($url_decode[$i]=='+')
{

  $phone[]=substr($url_decode,$i,14);
}

    
  }
 // dd($donor[5]);
 /*
  foreach ($donor as $value) {
    echo $value."<br />";
    
  }
  foreach ($phone as $value) {
    echo $value."<br />";
    
  }
 */
 //dd($a);
 /*
$equal='='; echo $pho
$and='&';
$lastPos=0;
$positions = array();
$position = array();

while (($lastPos = strpos($input, $equal, $lastPos))!== false) {
  $positions[] = $lastPos;
  $lastPos = $lastPos + strlen($equal);
}
while (($lastPos = strpos($input, $and, $lastPos))!== false) {
  $position[] = $lastPos;
  $lastPos = $lastPos + strlen($and);
}


foreach ($positions as $value) {
  echo $value."<br />";
  
}
echo "<br />"."<br />";
foreach ($position as $value1) {
  echo $value1."<br />";
}
*/
 // $b=preg_match('~=(.*?)&~', $input, $output);
 //dd($output[1]);
  
  if($input_code==$verification_code_decrypt)
{
  $insert_data=array('firstname'=>$donor[0],'lastname'=>$donor[1],'username'=>$donor[2],
  'email' =>$donor[3],'password'=>$donor[4], 'gender' =>$donor[5],'birthday' =>$donor[6],
   'division'=>$donor[7],'district'=>$donor[8],'location'=>$donor[9],'hospital'=>$donor[10],'phonenum'=>$phone[0]);
//dd($insert);
$inserts=DB::table('blooddonorsign_ups')->insert( $insert_data);
if($inserts)
{
$notification=array(

  'message'=>'You need to get hospital verification for completing the full registartion process.',
  'alert-type'=>'warning'
    );
    session()->set('notification',$notification);
     return back()->with($notification);
   //  return view('master');
 
}
else
{
  $notification=array(
  'message'=>'Resubmit the form.',
  'alert-type'=>'error'
    );
    session()->set('notification',$notification);
     return back()->with($notification);

}



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
  

