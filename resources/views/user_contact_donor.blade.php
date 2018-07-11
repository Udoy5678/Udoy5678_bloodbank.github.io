
{{--sweetalert--}}
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


{{--sweetalert--}}




<link rel="stylesheet" href="../css/signUp.css">
<link rel="stylesheet" href="../css/bootstrap.css">
@include('src.NexmoMessage')

		
<?php




//	include ( "./src/NexmoMessage.php" );

//require_once __DIR__.'/src/NexmoMessage.php';
	/**
	 * To send a text message.
	 *
	 */
 //echo $phonenum_user;
 //echo $phonenum_donor_own;
	//echo $phonenum_user;
    
    
    //random code generate send to user
    
    $string = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5);
$number = rand(100000,999999);
$verification_code=$string.'-'.$number;

//echo $string.'-'.$number;
	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage('4bbf6db3', '5w0HhBrw1FcgiJ1X');
//echo $phoneneum_user;
	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	

	$info = $nexmo_sms->sendText($phonenum_donor_own ,$phonenum_user , 'You are requested  for blood.The number is'.$phonenum_user);

   // $value= $nexmo_sms->displayOverview($info);
	// Step 3: Display an overview of the message echo $nexmo_sms->displayOverview($info);
	//<?php echo "<div style=\"float:right;\">" . $nexmo_sms->displayOverview($info) . "</div>"; ?>
<?php  ?>
    
    
<?php echo "<div style='background: #c8fbbe;width: 35%;color:  white;text-align:  center;margin-left: 29%;margin-top: 150px;padding: 110px;'>" . $nexmo_sms->displayOverview($info) . "</div>";    ?>             

<script>
          
		@if(Session::has('notification'))
		alert("{{ Session::get('notification.alert-type') }}");
		var type = "{{ Session::get('notification.alert-type', 'info') }}";
		
		  switch(type){
		  case 'info':
			   toastr.info("{{ Session::get('notification.message') }}");
			   break;
			case 'success':
			  toastr.success("{{ Session::get('notification.message') }}");
			  break;
			 case 'warning':
			  toastr.warning("{{ Session::get('notification.message') }}");
			  break;
			case 'error':
			  toastr.error("{{ Session::get('notification.message') }}");
			  break;
		  }
		@endif
		</script>  