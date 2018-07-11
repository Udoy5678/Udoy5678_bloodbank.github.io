<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
        html {
            background: url("img/background.jpg");
        }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    
    th, td {
        text-align: left;
        padding: 10px;
        border: 1px solid #ddd;
    
    }
    
    tr:nth-child(even){background-color: #f2f2f2}
    tr:nth-child(odd){background-color: #fff}
    th {
        background-color: #4CAF50;
        color: white;
    }
    </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
        @if(isset($details))

<div class="container">
    
        <h2 style="
        text-align:  center;
        background: #4caf5047;
        padding: 10px;
        margin-top:  0px;
    ">Hospital Information</h2>
  
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        
        <th>Hospital Name</th>
        <th>User Name</th>
       
        <th>password</th>
        
        
        
        
        
        
        
      </tr>
    </thead>
    <tbody>
      <tr>
            @foreach($details as $user)
           
        <td>{{$user['hospital_name']}}</td>
        <td>{{$user['name']}}</td>
        <td>{{$user['password']}}</td>
      
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
  </div>
</div>

</body>
</html>
