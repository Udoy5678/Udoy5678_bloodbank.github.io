
@include('src.NexmoMessage')

<?php


//	include ( "./src/NexmoMessage.php" );

//require_once __DIR__.'/src/NexmoMessage.php';
	/**
	 * To send a text message.
	 *
	 */
	//echo $phonenum;
	
		
	
	//echo $phonenum;
	// Step 1: Declare new NexmoMessage.api and secret key have to place
	$nexmo_sms = new NexmoMessage('fcd36a8e', 'Ses7BfRLOEylxTKv');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( $phonenum, 'Blood 24//7', 'You need to verify your blood through  ' .$input[0]['hospital_name']. '  at ' .$input[0]['name'].'  for completing your registration' );
//$info = $nexmo_sms->sendText( '+01790542359', 'Tanha', 'tore ami valo mone krchilam.tui amar sathe physical relation ');
 
	// Step 3: Display an overview of the message
	echo $nexmo_sms->displayOverview($info);

	// Done!

?>
<?php echo "<div style='background: #c8fbbe;width: 35%;color:  white;text-align:  center;margin-left: 29%;margin-top: 150px;padding: 110px;'>" . $nexmo_sms->displayOverview($info) . "</div>";    ?>    