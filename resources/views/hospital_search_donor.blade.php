



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <title>hospital donor search</title>
    {{--sweetalert--}}
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 {{--sweetalert--}}  
<!-- Load icon library -->
    <link rel="stylesheet" href="../css/signUp.css">
    <link rel="stylesheet" href="../css/hospitalsearch.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
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


</style>
</head>
<body >
        <h2 style="text-align: center">Donor Information</h2>
        <br>
        <br>
        {{--<a href="/logouthospital" class="btn btn-info btn-lg" style="margin-bottom: 0px">
                    <span class="glyphicon glyphicon-log-out"></span> Log out
                  </a>--}}
        
       <!-- The form -->
<form class="example" method="POST" action="{{url('searchdonor', ['name' => Crypt::encrypt($name)])}}" >
    {{csrf_field()}}
  
        <input type="text" placeholder="Search Donor by Name" name="search" >
        <button type="submit" style="margin-top: 8px"><i class="fa fa-search"></i></button>
        <br>
        <br>
        <br>
        <br>
        
       
                

              

           </form>
      
           <div class="container" style="margin-top: 100px">
                
                @if(isset($details)){{--coming from routes--}}
        <table class="table table-bordered table-striped table-hover" style="background:  #000;
        background-color: #62afff;">
          <thead>
            <tr>
              <th class="text-center">Username</th>
              <th class="text-center">Blood Group</th>
              <th class="text-center">Donor Condition</th>
              <th class="text-center">Action</th>
             
              
              
            </tr>
          </thead>
          <tbody>
             {{--user condition change--}}
            @foreach($details as $user)
                
                    
                <tr>
                        <td class="text-center">{{$user['username']}}</td>
                      <td class="text-center">{{$user['bloodgroup']}}</td>
  
        <td class="text-center">{{$user['condition']}}</td>
                        
                    
                       <td class="text-center"> 
                          {{--route with encryption --}}
                         
                          <a href="{{url('edit', ['id' => Crypt::encrypt($user['userid']) ])}}" type="hidden" class="btn btn-primary a-btn-slide-text">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                <span><strong>Edit</strong></span>            
                            </a>
                    
                           </td>
                           <td class="text-center"> 
                                {{--logout --}}
                               
                                <a href="/logouthospital" class="btn btn-info btn-lg" style="margin-bottom: 0px">
                                    <span class="glyphicon glyphicon-log-out"></span> Log out
                                  </a>
                          
                                 </td>
                    </tr>
                @endforeach
          </tbody>
         
        </table>
    
        @endif
    </div>

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


