

<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
   
 
    <link rel="stylesheet" href="css/signUp.css">
    
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>  
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<script src="js/login.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 {{--sweetalert--}}
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

 
 {{--sweetalert--}}



</head>

<body>

  
        <div class="container">
                <div class="row">
                
                    <div class="col-md-6 col-md-offset-3">
              <h4 style="text-align: center;background: #87ceeb85;font-weight:  bold;color: #3c3a3afa;padding: 10px;">
                <i class="glyphicon glyphicon-user">
                </i>
               Donor Account Access
              </h4>
              <div style="padding: 20px;" id="form-olvidado">
              <form accept-charset="UTF-8" role="form" id="login-form" method="post" action="/loginverification">
                  <fieldset>
                    <div class="form-group input-group">
                            {{csrf_field()}}
                            <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user">
        
                                    </span>
                        </span>
                            
                      <input class="form-control" placeholder="username" name="username" type="text" required="" autofocus="">
                    </div>
                    <div class="form-group input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-lock">
                        </i>
                      </span>
                      <input class="form-control" placeholder="Password" name="password" type="password" value="" required="">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">
                        Access
                      </button>
                      <p class="help-block">
                        <a class="pull-right text-muted" href="#" id="olvidado"><small>Forgot your password?</small></a>
                      </p>
                    </div>
                  </fieldset>
                </form>
              </div>
              <div style="display: none;" id="form-olvidado">
                <h4 class="">
                  Forgot your password?
                </h4>
                <form accept-charset="UTF-8" role="form" id="login-recordar" method="post" action="/forgotpassword">
                    {{csrf_field()}}
                    <fieldset>
                       
                    <span class="help-block">
                      Email address you use to log in to your account
                      <br>
                      We'll send you an email with instructions to choose a new password.
                    </span>
                    <div class="form-group input-group">
                           
                      <span class="input-group-addon">
                      @
                      </span>
                      <input class="form-control" placeholder="email" name="email" type="email" required="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="btn-olvidado">
                      Continue
                    </button>
                    <p class="help-block">
                      <a class="text-muted" href="#" id="acceso"><small>Account Access</small></a>
                    </p>
                  </fieldset>


                 
           
                </form>


           
              </div>
            </div>
                </div>
            </div>
            
            <script>
                @if(Session::has('message'))
                alert("{{ Session::get('notification.alert-type') }}");
                var type = "{{ Session::get('notification.alert-type', 'info') }}";
                
                  switch(type){
                  case 'info':
                       toastr.info("{{ Session::get('message') }}");
                       break;
                    case 'success':
                      toastr.success("{{ Session::get('message') }}");
                      break;
                     case 'warning':
                      toastr.warning("{{ Session::get('message') }}");
                      break;
                    case 'error':
                      toastr.error("{{ Session::get('message') }}");
                      break;
                  }
                @endif
                </script>
                  
        
</body>


</html>


