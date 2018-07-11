<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    
    .alert{


        background:red;
        color:#fff;
        padding:20px;
        margin-bottom:20px;

    }
    
    
    </style>
</head>
<body>
   
    @if(Session::has('message'))
"<div class="alert">"

{{Session::get('message')}}



</div>
@endif

</body>
</html>