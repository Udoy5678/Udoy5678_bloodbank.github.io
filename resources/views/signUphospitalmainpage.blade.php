@include('include.hospitalheader')
<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
   
 
    <link rel="stylesheet" href="css/signUp.css">
    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="js/login.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  
        <div class="container">
                <div class="row">
                
                    <div class="col-md-6 col-md-offset-3">
              <h4 style="border-bottom: 1px solid #c5c5c5;text-align: center;">
                <i class="glyphicon glyphicon-user">
                </i>
               Hospital Account SignUp
              </h4>
              <div style="padding: 20px;" id="form-olvidado">
              <form accept-charset="UTF-8" role="form" id="login-form" method="post" action="/hospitalregister">
                  <fieldset>
                    <div class="form-group input-group">
                            {{csrf_field()}}
                            <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user">
        
                                    </span>
                        </span>
                            
                      <input class="form-control" placeholder="hospitalname" name="hospitalname" type="text" required="" autofocus="">
                    </div>
                    <div class="form-group input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-lock">
                        </i>
                      </span>
                      <input class="form-control" placeholder="Password" name="password" type="password" value="" required="">
                    </div>
                    <div class="form-group input-group">
                           
                        <span class="input-group-addon">
                        @
                        </span>
                        <input class="form-control" placeholder="email" name="email" type="email" required="">
                      </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">
                        Register
                      </button>
                      
                    </div>
                  </fieldset>
                </form>
              </div>
              
            </div>
                </div>
            </div>
     
</body>
@include('include.footerallhospital')
</html>

