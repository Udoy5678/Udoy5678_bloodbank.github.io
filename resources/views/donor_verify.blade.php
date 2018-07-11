
@include('src.NexmoMessage')

	
			 {{--sweetalert--}}
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    
    {{--sweetalert--}}
<?php


//dd($input);

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
	$nexmo_sms = new NexmoMessage('96df8978', '6Ju0HTIqRznjbojZ');
//echo $phoneneum_user;
//dd ($phonenum);
	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( $phonenum, "Blood 24/7", 'You are requested to put verification code.Your verification code is '.$string.'-'.$number);
//$name=addslashes('Blood 24 "7 ');
//	$info = $nexmo_sms->sendText( $phonenum,$name, 'You are requested to put verification code.Your verification code is '.$verification_code);

 

	// Step 3: Display an overview of the message
	?>

    <?php ?>
    
   
	         
    <?php echo "<div style='background: #c8fbbe;width: 23%;height: 25%;color:  white;text-align:  center;margin-left: 40%;margin-top: 10px;padding: 40px;'>" . $nexmo_sms->displayOverview($info) . "</div>";    ?>    
    
    


<link rel="stylesheet" href="../css/signUp.css">

<form action="{{url('/validate_donor', ['input'=>$input,'verification_code' => Crypt::encrypt($verification_code)])}}" method="get" style=" padding-bottom: 48px;
    font-weight:  bold;">
        {{csrf_field()}}
		{{--validation code----}}
		<div class="form-group" style="
       
        padding: 50px;
        font-weight:  bold;
    ">
		<div class="form-group">
				<label class="col-lg-12 control-label" style="
    font-weight:  bold;
    color: #000000ad;
    text-align: center;
    /* margin-left: 87px; */
    background: #c9efed;
    ">Validation Code</label>
				<div class="col-lg-12">
					<center><input type="text" class="form-control" name="code" />
					</center>
					</div>
			</div>
			
			<div class="form-group">
					<div class="col-lg-9 col-lg-offset-3">
						<center style="margin-left: 210px">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up" style="
								background: #c9efed;
								color: #000000b5;
								font-weight:  bold;
								border-color: #99abaa;
								text-align:  center;
								margin-left: -301px;
								margin-top: 14px;
							">Verify</button>
					</center>
					</div>
				</div>
		
		
		
		</form>
		
        <script>
                @if(Session::has('message'))
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
              
              