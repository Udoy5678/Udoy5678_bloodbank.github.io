


<!DOCTYPE html>
<html lang="en">
<head>
   <style>
    
    .footer {
    background: #cc0000;
    color: #fff;
    /* bottom: 0; */
    font-size: 20px;
    text-align: center;
    font-weight: bold;
    /* width: 100%; */
    /* padding: 30px; */
    margin-top: 810px;

}
.footer p {
    margin:0;
}
.footer a {
    color: #fccf7b;
    text-decoration: none;
}
    
    
    </style>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--sweetalert--}}
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   
    
    {{--sweetalert--}}

    
    <link rel="stylesheet" href="/css/signUp.css">
    <link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.css">

    
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
    
</head>
<body>
        <a href="/logoutdonor" class="btn btn-info btn-lg" >
            <span class="glyphicon glyphicon-log-out"></span> Log out
          </a>
@if(isset($details))
@foreach($details as $donor)
<div class="container">
	<div class="row">
            <h2 style="text-align: center;background: #87ceeb85;font-weight:  bold;color: #3c3a3afa;padding: 10px;;margin-top:  -55px"> Hello! {{$donor['firstname']}} {{$donor['lastname']}}</h2>
	</div>
	
    <form id="defaultForm" method="post" class="form-horizontal" >
                        <div class="form-group">
                            {{csrf_field()}}
                            <label class="col-lg-3 control-label">Full name</label>
                            <div class="col-lg-5">
									{{$donor['firstname']}} {{$donor['lastname']}}
                            </div>
                          
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Username</label>
                            <div class="col-lg-5">
									{{$donor['username']}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email address</label>
                            <div class="col-lg-5">
									{{$donor['email']}}
                            </div>
                        </div>

                       
                        <div class="form-group">
								<label class="col-lg-3 control-label">Date Of Birth</label>
								<div class="col-lg-5">
										{{$donor['birthday']}}
								</div>
							</div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Gender</label>
                            <div class="col-lg-5">

											{{$donor['gender']}}
 
                            </div>
						</div>
						<div class="form-group">
								<label class="col-lg-3 control-label">Phone Number</label>
								<div class="col-lg-5">
									
									
												{{$donor['phonenum']}}
									
								</div>
							</div>

							<div class="form-group">
									<label class="col-lg-3 control-label">Location</label>
									<div class="col-lg-5">
										
										
													{{$donor['name']}}
											
									 
										
									</div>
								</div>
								<div class="form-group">
										<label class="col-lg-3 control-label">Blood Group</label>
										<div class="col-lg-5">
											
												
														{{$donor['bloodgroup']}}
												
										 
											
										</div>
									</div>
									<div class="form-group">
											<label class="col-lg-3 control-label">Donor Availability</label>
											<div class="col-lg-5">
												
													
															{{$donor['condition']}}
													
											 
												
											</div>
										</div>

                       
                        
                        
                       
                      
         
                        
                
                        
                       

                       
                      
					</form>
					@endforeach
</div>
@endif
<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstName: {
                group: '.col-lg-4',
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    }
                }
            },
            lastName: {
                group: '.col-lg-4',
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                }
            },
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    },
                    /*remote: {
                        type: 'POST',
                        url: 'remote.php',
                        message: 'The username is not available'
                    },*/
                    different: {
                        field: 'password,confirmPassword',
                        message: 'The username and password cannot be the same as each other'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            birthday: {
                validators: {
                     notEmpty: {
                        message: 'The birthday field cannot be empty'
                    },
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'The birthday is not valid'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
            
            File: {
                validators: {
                    notEmpty: {
                        message: 'Please select value'
                    },
                    file: {
                        extension: 'pdf',
                        type: 'application/pdf',
                        message: 'Please choose a pdf file.'
                    }
                }
            },
             division: {
                validators: {
                    notEmpty: {
                        message: 'The division is required and can\'t be empty'
                    }
                }
            },
            district: {
                validators: {
                    notEmpty: {
                        message: 'The district required and can\'t be empty'
                    }
                }
            },
            location: {
                validators: {
                    notEmpty: {
                        message: 'The location is required and can\'t be empty'
                    }
                }
            },
           hospital: {
                validators: {
                    notEmpty: {
                        message: 'The hospital is required and can\'t be empty'
                    }
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

  
});
</script>
<div class="footer">
        <p>Copyright &copy; <?php
            echo date("Y");?>
            <span style="color: rgb(213, 213, 213);">Mr.Tanvir Ahmed</span>
        </p>
        All rights reserved.
    </div>
    <script type="text/javascript" src="../js/scrolltop.js"></script>
    <div id="topcontrol" title="Scroll to Top" style="position: fixed; bottom: 5px; right: 5px; opacity: 1; cursor: pointer;"><img src="img/arrow.png"></div>
    
{{----}}
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
	  
	  
</body>

</html>


{{----}}

