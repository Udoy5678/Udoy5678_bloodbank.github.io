

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{--sweetalert--}}
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  
   
   {{--sweetalert--}}
<link rel="stylesheet" href="../css/signUp.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
    
</head>
<body>
    
        <div class="container">
               
                <h2 style="text-align:center;color: #000;background-color: #baecdc;">New Donor Register</h2>
                
             {{--   <a href="/logouthospital" class="btn btn-info btn-lg" style="margin-bottom: 0px">
                        <span class="glyphicon glyphicon-log-out"></span> Log out
                      </a>
                --}}
                <form id="defaultForm" method="post" class="form-horizontal" action="{{url('hospital_new_donor_submit', ['name' => Crypt::encrypt($name)])}}">
                                    
                                        {{csrf_field()}}
                                  
                                       
          
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Username</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" name="username" />
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                            <label class="col-lg-3 control-label">Blood Group</label>
                                            <div class="col-lg-5">
                                                <select  name="bloodgroup" required>
                                                        <option value="">--select a blood group--</option>
                                                    <option value="O-">O-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="A+">A+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="AB-">AB-</option>
                                                  
                                                    <option value="AB+">AB+</option>
                                                    
                                                   
                                                    
                                                    
                                                  
                                                </select>
                                            </div>
                                        </div>
                                <div class="form-group">
                                        <label class="col-lg-3 control-label">Donor Condition</label>
                                        <div class="col-lg-5">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="condition" value="available" /> Available
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="condition" value="not available" /> Not Available
                                                </label>
                                            </div>
                                           
                                        </div>
                                    </div>
            
                                   
            
                            
            
                                  
            
                                   
                                    
                                    
                                   
                                    
                                   
                                <br>
                               
                                
                                <br>
                          
            
                                    <div class="form-group">
                                        <div class="col-lg-9 col-lg-offset-3">
                                            <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Register</button>
                                           
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
                            condition: {
                                validators: {
                                    notEmpty: {
                                        message: 'The condition is required'
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
                            bloodgroup: {
                                validators: {
                                    notEmpty: {
                                        message: 'The bloodgroup is required and can\'t be empty'
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