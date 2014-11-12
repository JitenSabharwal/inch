<html>
<head>
<title>User Registeration</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
<style type="text/css"> label{margin-bottom: 5px;}</style>

        <script type="text/javascript">
            function validate_rigister () {
              

          var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          var phone_no=/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;
             
             if(document.register.fname.value=="")
              {
                alert("please fill first name");
                $(document.register.fname.parentNode).addClass('has-error');
                return false;
              }
              else
              {
                 $(document.register.fname.parentNode).removeClass('has-error');

              }

          if(document.register.type_of_user.value=="Select")
              {
                alert("please select type of user");
                $(document.register.type_of_user.parentNode).addClass('has-error');
                return false;
              }
              else
              {
                 $(document.register.type_of_user.parentNode).removeClass('has-error');
              }

        if(document.register.us_name.value=="")
              {
                alert("please select user name");
                $(document.register.us_name.parentNode).addClass('has-error');
                return false;
              }
              else
              {
                 $(document.register.us_name.parentNode).removeClass('has-error');
              }
           if(document.register.pwd.value=="")
              {
                alert("please fill the password");
                $(document.register.pwd.parentNode).addClass('has-error');
                return false;
              }

          if(document.register.conf_pwd.value=="" || (document.register.pwd.value).localeCompare(document.register.conf_pwd.value)!=0)
              {
                alert("please fill correct password");
                $(document.register.pwd.parentNode).addClass('has-error');
                return false;
              }
              
           if(document.register.ph1.value=="" || phone_no.test(document.register.ph1.value)==false)
              {
                alert("please enter phone no");
                $(document.register.ph1.parentNode).addClass('has-error');
                return false;
              }
              
              if(document.register.email1.value=="" || filter.test(document.register.email1.value)==false)
              {
                alert("please enter valid email id");
                $(document.register.email1.parentNode).addClass('has-error');
                return false;
              }

           if(document.register.addr1.value=="")
              {
                alert("please fill address");
                $(document.register.addr1.parentNode).addClass('has-error');
                return false;
              }
         if(document.register.city.value=="")
              {
                alert("please fill name");
                $(document.register.city.parentNode).addClass('has-error');
                return false;
              }
         if(document.register.state.value=="")
              {
                alert("please fill state name");
                $(document.register.state.parentNode).addClass('has-error');
                return false;
              }
          if(document.register.country.value=="")
              {
                alert("please fill country name");
                $(document.register.country.parentNode).addClass('has-error');
                return false;
              }
            
           return true;
                     
            }

        </script>






</head>

<body>
		<div class="container">

<div class="" style="padding-top:40px;">
		<h3 class="featurette-heading"  id="contact" style="text-align:center">USER REGISTERATION</h3><br><br>
		<form role="form"  method="post" name="register" action="register.php" onsubmit="return validate_rigister();">
	<div class="form-group col-md-3">
    <label for="InputName"> First Name</label>
    <input type="text" class="form-control "  placeholder="Enter Name" name="fname" id="fname">
  </div>
    <div class="form-group col-md-3">
    <label for="InputName">Middle Name</label>
    <input type="text" class="form-control"  placeholder="Enter Name" name="mname">
  </div>
    <div class="form-group col-md-3" >
    <label for="InputName">Last Name</label>
    <input type="text" class="form-control"  placeholder="Enter Name" name="lname">
  </div>

   <div class="form-group col-md-3" style="clear:both">
    <label for="InputName">Type Of User</label>
    <select class="form-control" name="type_of_user">
      <option>Select</option>
        <option>Managing Director</option>
        <option>Project Manager</option>
        <option>Site Engineer</option>
        <option>Fs</option>
        <option>Ps</option>
        <option>Pi</option>

    </select>
  </div>
   <div class="form-group col-md-3" style="clear:both">
    <label for="InputEmail">Username</label>
    <input type="text" class="form-control" name="us_name">
  </div>
   <div class="form-group col-md-3" style="clear:both">
    <label for="InputEmail">Password</label>
    <input type="password" class="form-control"  placeholder="Enter Password" name="pwd">
  </div>
   <div class="form-group col-md-3" style="clear:both">
    <label for="InputEmail">Confirm Password</label>
    <input type="password" class="form-control"  placeholder="Confirm Password" name="conf_pwd">
  </div>
  <div class="form-group col-md-3" style="clear:both" >
    <label for="InputEmail">Phone No.</label>
    <input type="text" class="form-control" name="ph1" >
  </div>
  <div class="form-group col-md-3">
    <label for="InputEmail">Alternate Phone No.</label>
    <input type="text" class="form-control" name="ph2">
  </div>
  <div class="form-group col-md-3" style="clear:both">
    <label for="InputEmail">Email address</label>
    <input type="text" class="form-control"  placeholder="Enter email" name="email1">
  </div>
  <div class="form-group col-md-3" style="clear:both">
    <label for="InputEmail"> Alternate Email address</label>
    <input type="email" class="form-control"  placeholder="Enter email" name="email2">
  </div>
  <div class="form-group col-md-3" style="clear:both">
    <label for="InputEmail">Fax No. 1</label>
    <input type="text" class="form-control" name="fax1">
  </div>
  <div class="form-group col-md-3">
    <label for="InputEmail">Fax No. 2</label>
    <input type="text" class="form-control"  name="fax2">
  </div>
  <div class="form-group col-md-5" style="clear:both">
    <label for="InputEmail">Address Line 1</label>
    <input type="text" class="form-control" name="addr1" >
  </div>
  <div class="form-group col-md-5" style="clear:both">
    <label for="InputEmail">Address Line 2</label>
    <input type="text" class="form-control" name="addr2"  >
  </div>
  <div class="form-group col-md-3" style="clear:both">
    <label for="InputEmail">City</label>
    <input type="text" class="form-control" name="city">
  </div>
  <div class="form-group col-md-3" style="clear:both">
    <label for="InputEmail">State</label>
    <input type="text" class="form-control" name="state">
  </div>
  
  <div class="form-group col-md-3" style="clear:both">
    <label for="InputEmail">Country</label>
    <input type="text" class="form-control" name="country">
  </div>

  <div class="form-group" style="clear:both">
  <button type="submit" class="btn btn-primary" style="clear:both">Submit</button>
</div>
</form>
	</div>






		</div>


</body>	