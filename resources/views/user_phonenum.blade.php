
<style>




</style>



<link rel="stylesheet" href="../css/bootstrap.css">

<link rel="stylesheet" href="../css/bootstrap.min.css">



<link rel="stylesheet" href="../css/signUp.css">

<form form id="defaultForm" method="get" class="form-horizontal" action="{{url('validation_code_page', ['phonenum_donor_own' => Crypt::encrypt($phonenum_donor_own)])}}" >

       
        <img src="../img/picture1.jpg" alt="" style="
        width: 300px;
        /* margin:  0; */
        margin-left: -80px; ">

        <div class="form-group" style="
        margin-top: -55px;
        padding: 50px;
        font-weight:  bold;
    ">
        <center>
                <label class="col-lg-9 control-label" style="
                background:  #c9efed;
            ">Phone Number : ( format: +8801(no space)last 9 digits )</label>
</center>
    <center><div class="col-lg-12">
            <input type="tel" pattern="^(?:\+88|01)\d{2}?\d{9}\r?$" name="phonenum" required="" style="width: 70%; ">
</div>
</center>
</div>
<div class="form-group">
    <div class="col-lg-9 col-lg-offset-3">
        <center style="margin-left: 210px">
                <button type="submit" class="btn btn-primary" name="signup" value="Sign up" style="
                background: #c9efed;
                color: #000000b5;
                font-weight:  bold;
                border-color: #99abaa;
            ">Submit</button>
    </center>
    </div>
</div>


</form>