
@include('src.NexmoMessage')
{{--sweetalert--}}
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<a href="/logouthospital" class="btn btn-info btn-lg" >
	<span class="glyphicon glyphicon-log-out"></span> Log out
  </a>

{{--sweetalert--}}
<?php



//	include ( "./src/NexmoMessage.php" );

//require_once __DIR__.'/src/NexmoMessage.php';
	/**
	 * To send a text message.
	 *
	 */
	//echo $phonenum;
	
	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage('fcd36a8e', 'Ses7BfRLOEylxTKv');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( $query[0]['phonenum'], $find_hospital_query[0]['hospital_name'], 'You are now a registered user and your profile has been completed' );

 
	// Step 3: Display an overview of the message
	//echo $nexmo_sms->displayOverview($info);

	// Done!

?>
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