


{{--sweetalert--}}
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


{{--sweetalert--}}
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
	//$info = $nexmo_sms->sendText( $phonenum_user, "Blood 24//7", 'You are requested to put verification code.Your verification code is '.$string.'-'.$number);

	$info = $nexmo_sms->sendText( $phonenum_user, $phonenum_donor_own, 'You are requested to put verification code.Your verification code is '.$string.'-'.$number);
    
	// Step 3: Display an overview of the message
	?>

	<?php ?>
	<?php echo "<div style='background: #c8fbbe;width: 23%;height: 25%;color:  white;text-align:  center;margin-left: 40%;margin-top: 10px;padding: 40px;'>" . $nexmo_sms->displayOverview($info) . "</div>";    ?>             

    
    


<link rel="stylesheet" href="../css/signUp.css">
<link rel="stylesheet" href="../css/bootstrap.css">
<form action="{{url('validation_further', ['phonenum_donor_own' => $phonenum_donor_own,'phonenum_user' => $phonenum_user,'verification_code' => Crypt::encrypt($verification_code)])}}" method="post">
	
		{{--validation code--}}{{csrf_field()}}
		<div class="form-group" style="
       
        padding: 150px;
        font-weight:  bold;
    ">
		<div class="form-group">
				<label class="col-lg-12 control-label" style="
    font-weight:  bold;
    color: #000000ad;
    text-align: center;
    /* margin-left: 87px; */
	background: #c9efed;
	font-size: 20px;
    ">Validation Code</label>
				<div class="col-lg-12">
					<center><input type="text" class="form-control" name="code" style="font-size: 15px;"/>
					</center>
					</div>
			</div>
			
			<div class="form-group">
					<div class="col-lg-9 col-lg-offset-3">
						<center style="margin-left: -100px">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up" style="
								background: #c9efed;
								color: #000000b5;
								font-weight:  bold;
								border-color: #99abaa;
								font-size: 15px
							">Verify</button>
					</center>
					</div>
				</div>
		
		
		
		</form>
		
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