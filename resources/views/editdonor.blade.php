

<html lang="en">
    <head>
        <title>
            Bootstrap Validation example using validator.js
        </title>
        <link rel="stylesheet" href="../css/signUp.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"></link>
        <script src="https://code.jquery.com/jquery-1.12.4.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js">
        </script>
        <style>
        form{

margin-top: -38px;

        }
       
       
        </style>
        {{--sweetalert--}}
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  
   
   {{--sweetalert--}}
    </head>
    <body>
            
        <br/>
        
       

{{--
        <a href="/logouthospital" class="btn btn-info btn-lg" style="margin-bottom: 0px">
            <span class="glyphicon glyphicon-log-out"></span> Log out
          </a>
                
--}}
      
                <form  id="defaultForm" class="form-horizontal" action="{{url('update', ['id' => Crypt::encrypt($input1[0]['id'])])}}" method="POST"  style="
                        margin-top: 66px;>
                        <h2 style="text-align: center"><strong style="
                            margin-left: 281px;
                            font-weight:  bold;
                            font-size: 32px;
                            background:  #000;
                            background-color: #add7f5;
                        ">Edit Donor Info
                                                    </strong>
                {{csrf_field()}}
              
                  <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                      
                      <label class="control-label" for="inputName">User Name</label>
                    {{-- input field read only mode--}}
                      
                  <input class="form-control" data-error="Please enter name field." id="inputName" value="{{$input1[0]['username']}}"  type="text" name="username" readonly="true"required />
                      <div class="help-block with-errors"></div>
                  </div>
                </div>

                  <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                    <label for="inputEmail" class="control-label">Blood Group</label>
                    {{-- input field read only mode--}}
                    <input type="text" class="form-control" name="bloodgroup" id="bloodgroup" placeholder="Blood Group" value="{{$input1[0]['bloodgroup']}}"  readonly="true"required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                  <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                    <label for="inputPassword" class="control-label">Donor Condition</label>
                    <div class="form-group" style="margin-left: 8px">
                    
                           
                      <div class="radio" >
                            <label>
                                
                                <input type="radio" name="condition" value="available" {{ $input1[0]['condition'] == 'available' ? 'checked' : ''}}  id="available" data-error="Please select this field." placeholder="Password" required/> Available
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="condition" value="not available" {{ $input1[0]['condition'] == 'not available' ? 'checked' : ''}} id="notavailable"/> Not Available
                            </label>
                        </div>


                    </div>
                </div>
                      {{--for change radio button--}}
                    
                      
                      
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Update</button>
                           
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

          
</html>

