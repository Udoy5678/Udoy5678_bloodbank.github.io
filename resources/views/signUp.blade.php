
<!DOCTYPE html>
<html lang="en">
<head>
     {{--sweetalert--}}
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    
    {{--sweetalert--}}
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

    
    {{--sweetalert--}}

    
    <link rel="stylesheet" href="/css/signUp.css">
    <link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.css">

    
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
    
</head>
<body>

   
      
<div class="container">
	<div class="row">
            <h2 style="text-align: center;background: #87ceeb85;font-weight:  bold;color: #3c3a3afa;padding: 10px;">Donor Sign Up</h2>
	</div>
    
    <form id="defaultForm" method="get" class="form-horizontal" action="/insertdonorsignUp">
                        <div class="form-group">
                            {{csrf_field()}}
                            <label class="col-lg-3 control-label">Full name</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="firstName" placeholder="First name" />
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="lastName" placeholder="Last name" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Username</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="username" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email address</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="email" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Password</label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control" name="password" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Retype password</label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control" name="confirmPassword" />
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-lg-3 control-label">Phone Number (format: +8801(no space)last 9 digits):</label>
                                <div class="col-lg-5">
                                        <input  type="tel" pattern="^(?:\+?88)?01[15-9]\d{8}$"  name="phonenum" required >
                                </div>{{--BD pattern--}}
                            </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Gender</label>
                            <div class="col-lg-5">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" value="male" /> Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" value="female" /> Female
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" value="other" /> Other
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Birthday</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="birthday" /> (YYYY/MM/DD)
                            </div>
                        </div>

                       
                        
                        
                       
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Division</label>
                            <div class="col-lg-5">
                                <select class="form-control" name="division" id="division">
                                    <option value="">-- Select a division --</option>
                                   {{--division from database--}}
                                   @foreach($divisions as $division)
                                <option value="{{$division->id}}">{{$division->name}}</option>
                                   @endforeach
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">District</label>
                            <div class="col-lg-5">
                                <select class="form-control" name="district" id="district">
                                    <option value="">-- Select a district --</option>
                                   
                                    
                                    
                                  
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Location</label>
                            <div class="col-lg-5">
                                <select class="form-control" name="location" id="location">
                                    <option value="">-- Select a location --</option>
                                    
                                   
                                </select>
                            </div>
                        </div>
                        {{--hospital--}}
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Hospital</label>
                            <div class="col-lg-5">
                                <select class="form-control" name="hospital" id="hospital">
                                    <option value="">-- Select a hospital --</option>
                                    
                                   
                                </select>
                            </div>
                        </div>
                   {{--new--}}
                {{--script for district changed by division  using ajax--}}
                        
                <script>
                    $('#division').on('change',function(e)
                    {
                     console.log(e);
                     var division_id=e.target.value;
                     //ajax
                     $.get('/ajax-district?division_id=' +division_id,function(data){
                       
                   
                     
                        $('#district').empty();
                        //success data
                        
                        $('#district').append('<option value="" >'+null+'</option>');
                        $.each(data,function(index,districtObj){
                          


                           $('#district').append('<option value="'+districtObj.id+'" >'+districtObj.name+'</option>');




                        });

                     });
                    });
               $('#district').on('change',function(e)
                    {
                     console.log(e);
                     var district_id=e.target.value;
                     //ajax
                     $.get('/ajax-location?district_id=' +district_id,function(data){
                       
                   //console.log(data);
                     
                        $('#location').empty();
                        //success data
                    
                        $('#location').append('<option value="" >'+null+'</option>');
                        $.each(data,function(index,locationObj){
                            $('#location').append('<option value="'+locationObj.id+'">'+locationObj.name+'</option>');




                        });

                     });       
                    });
//hospital
$('#location').on('change',function(e)
                    {
                     console.log(e);
                     var location_id=e.target.value;
                     //ajax
                     $.get('/ajax-hospital?location_id=' +location_id,function(data){
                       
                   console.log(data);
                     
                        $('#hospital').empty();
                        //success data
                    
                        $('#hospital').append('<option value="" >'+null+'</option>');
                        $.each(data,function(index,hospitalObj){
                            $('#hospital').append('<option value="'+hospitalObj.id+'">'+hospitalObj.hospital_name+'</option>');




                        });

                     });       
                    });
               


                

                    
            


                     
                    
                    


                   
                    
                    
                    </script>
                        
                       

                        <div class="form-group">
                            <label class="col-lg-3 control-label" id="captchaOperation"></label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control" name="captcha" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up" style="
                                width: 30%;
                                /* height: 41%; */
                                font-weight:  bold;
                            ">Sign up</button>
                               
                            </div>
                        </div>
                    </form>
</div>
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

    <script type="text/javascript" src="../js/scrolltop.js"></script>
    <div id="topcontrol" title="Scroll to Top" style="position: fixed; bottom: 5px; right: 5px; opacity: 1; cursor: pointer;"><img src="img/arrow.png"></div>
    {{--alert--}}
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
          
          
</body>

</html>

