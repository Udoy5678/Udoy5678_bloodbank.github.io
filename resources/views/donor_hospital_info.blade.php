<a href="/logouthospital" class="btn btn-info btn-lg" style="margin-bottom: 0px">
    <span class="glyphicon glyphicon-log-out"></span> Log out
  </a>
<link rel="stylesheet" href="css/bootstrap.css">
{{----}}
{{--sweetalert--}}
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<body style="
    background: url(img/background.jpg);
">
      <form action="" style="text-align:  center;margin-top: 170px;">
            
            <button type="button" class="btn btn-outline-success"style="
            padding-right: 246px; background: #008000ad; color: white;
        " ><h2 style="margin-left: 217px;" >  <a href="/register_donor" style="
            text-decoration: none;
            color:  #fff;
            font-weight: bold;
        ">  Registered Donor</a></h2></button>
            <br>
            <br>
            <br>
            
            
            <button type="button" class="btn btn-outline-success"style="
            padding-right: 220px; background: #008000ad; color: white;
        "><h2 style="margin-left: 217px;"> <a href="/register_hospital" style="
            text-decoration: none;
            color:  #fff;
            font-weight: bold;
        ">Registered Hospital</a></h2></button>
         



      </form><script>
          
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