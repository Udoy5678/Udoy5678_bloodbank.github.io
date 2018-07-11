
@include('include.hospitalheader_logout')
{{--sweetalert--}}
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


{{--sweetalert--}}
{{--url--}}
<style>
        * {
            box-sizing: border-box;
        }
        
        .column {
            float: left;
            width: 33.33%;
            padding: 5px;
        }
        
        /* Clearfix (clear floats) */
        .row::after {
            content: "";
            clear: both;
            display: table;
        }
        </style>

<link rel="stylesheet" href="css/signUp.css">



<div class="row" >
    <div class="column" style="margin-top: 120px;margin-left:70px"> 
        <img src="img/re.gif" alt="">
       
 
    </div>
<div class="column"  style="margin-top: 120px;margin-left:10px">
        <button type="button" class="btn " ><a href="{{url('hospital_new_donors', ['name' => Crypt::encrypt($input1[0]['name'])])}}" style="color:black;font-size: 15px">New Donor Registration</a></button>
    </div>
<div class="column" style="margin-left: 600px;margin-top:-90px;color:black">

        <button type="button" class="btn " ><a href="{{url('searchdonorbyhospital', ['name' => Crypt::encrypt($input1[0]['name'])])}}"style="color:black;font-size: 15px">Search Donor By Name</a></button>
</div>
  <div class="column"style="margin-left: 800px;margin-top:-240px">
 
  
<img src="img/seagif.gif" alt="" >
</div>

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
	  
@include('include.footerallhospital')
