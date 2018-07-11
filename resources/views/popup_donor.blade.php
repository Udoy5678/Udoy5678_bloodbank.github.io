

@include('include.header')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
   
    <!-- Load icon library 
   
    -->
    <link  href="css/hospitalsearch.css" rel="stylesheet">
   <style>
   
   /*hospital search*/			
	
   .footer {
    background: #cc0000;
    color: #fff;
    /* bottom: 0; */
    font-size: 20px;
    text-align: center;
    font-weight: bold;
    /* width: 100%; */
    /* padding: 30px; */
}
.footer p {
    margin:0;
}
.footer a {
    color: #fccf7b;
    text-decoration: none;
}
	  /* Style the search field */
	  form.example input[type=text] {
          margin-left: 300px;
		padding: 10px;
		font-size: 17px;
		border: 1px solid grey;
		float: left;
		width: 30%;
		background: #f1f1f1;
	
	  }
	  
	  /* Style the submit button */
	  .example button {
		margin-top: 0px;
	  float: left;
	  width: 20%;
	  padding: 10px;
	  background: #2196F3;
	  color: white;
	  font-size: 17px;
	  border: 1px solid grey;
	  border-left: none; /* Prevent double borders */
	  cursor: pointer;
	}
	  
	  .example button:hover {
		background: #0b7dda;
	  }
	  
	  /* Clear floats */
	  .example::after {
		content: "";
		clear: both;
		display: table;
    }
    a.btn:hover {
     -webkit-transform: scale(1.1);
     -moz-transform: scale(1.1);
     -o-transform: scale(1.1);
 }
 a.btn {
     -webkit-transform: scale(0.8);
     -moz-transform: scale(0.8);
     -o-transform: scale(0.8);
     -webkit-transition-duration: 0.5s;
     -moz-transition-duration: 0.5s;
     -o-transition-duration: 0.5s;
 }
 /*!
 * Start Bootstrap - Full Slider (https://startbootstrap.com/template-overviews/full-slider)
 * Copyright 2013-2017 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-full-slider/blob/master/LICENSE)
 */

 .carousel-item {
 
 height: 100vh;
 min-height: 300px;
 background: no-repeat center center scroll;
 -webkit-background-size: cover;
 -moz-background-size: cover;
 -o-background-size: cover;
 background-size: cover;
}

   </style>
    
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
  
</head>


<body >
@include('include.fixedNavbar')
  
        <h2 style="text-align: center">Find Donor</h2>
        <br>
        <br>
        
       
      
        
     

           <div class="container" >
              
                @if(isset($details))
                {{--coming from routes   @if(isset($details))--}}
              
        <table class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th class="text-center">Donor Name</th>
              <th class="text-center">Phone Number</th>
              <th class="text-center">Blood group</th>
              <th class="text-center">Contact</th>
              
            </tr>
          </thead>
          <tbody>
             {{--user condition change--}}
           
               {{--with details--}}   
               @foreach($details as $user)
                <tr>
                        <td class="text-center">{{$user['firstname']}} {{$user['lastname']}}</td>
                      <td class="text-center">{{$user['phonenum']}}</td>
  
        <td class="text-center">{{$user['bloodgroup']}}</td>
                        
                    
                       <td class="text-center"> 
                          {{--route with encryption --}}
                       
                          <a href="{{url('message_request_todonor', ['phonenum_donor' => Crypt::encrypt($user['phonenum'])])}}" type="hidden" class="btn btn-primary a-btn-slide-text">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                <span><strong>Message</strong></span>            
                            </a>
                    
                           </td>
                    </tr>
                        {{--   --}}
                        @endforeach
          </tbody>
         
        </table>
      {{--   --}}
      @endif
    </div>

           
      
          
</body>
</html>


{{--@include('include.hospitalheader') @include('include.footerall')--}}
{{--footer--}}
<script src="js/vendor/modernizr-2.8.3.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
<script src="../js/plugins.js"></script>

<script src="../js/jquery.min.js"></script>

<script src="../js/uikit.min.js"></script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID.
<script>
(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
e=o.createElement(i);r=o.getElementsByTagName(i)[0];
e.src='https://www.google-analytics.com/analytics.js';
r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
-->
<div class="footer">
    <p>Copyright &copy; <?php
        echo date("Y");?>
        <span style="color: rgb(213, 213, 213);">Mr.Tanvir Ahmed</span>
    </p>
    All rights reserved.
</div>
<script type="text/javascript" src="../js/scrolltop.js"></script>
<div id="topcontrol" title="Scroll to Top" style="position: fixed; bottom: 5px; right: 5px; opacity: 1; cursor: pointer;"><img src="img/arrow.png"></div>

</body>
</html>