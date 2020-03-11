<!DOCTYPE html>
<html>
<head>
<title>User Registration form</title>
</head>
<style>
body {
  background-image: url("../../assets/css/bgimage.png");
}

table {
  border-collapse: collapse;
  width: 60%;
}

h2{
  color: white;
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}




</style>

<body>


  
          <!--  Status message -->
  <tr><th colspan="2"><?php if(!empty($success_msg)){
    echo '<p class ="status-msg success">'.$status-msg.'</p>';
    }elseif(!empty($error_msg)){
    echo '<p class="<p class="status-msg error">"'.$error_msg.'</p>';
  }?></th></tr> 


       <!-- Registration form -->
	<form method="post">
		<table width="600" height="500" align="center" border="1" cellspacing="5" cellpadding="5" style="background-color:#90EE90" class="table table-hover">
      <tr>
        <th colspan="2" style="background-color:Tomato;"><h2>REGISTER NEW ACCOUNT</h2></th>
      </tr>
	<tr>
		<td colspan="2"><?php echo @$error; ?></td>
	</tr>	
  
  <tr style="background-color:Orange;">

    <th width="230">Enter Your Name </th>
    <td width="329"><input type="text" name="name" placeholder="Name" value="" required=""/>
      <?php echo form_error('name');?>
    </td>
  </tr>
  
  <tr style="background-color:Orange;">

    <th>Enter Your Email </th>
    <td><input type="text" name="email" required placeholder="Email" value="" required="" />
      <?php echo form_error('email');?></td>
  </tr>
  
  <tr style="background-color:Orange;">
    <th>Enter Your Password </th>
    <td><input type="password" name="pass" placeholder="Password" required/>
     <?php echo form_error('pass');?></td>
  </tr>

  <tr style="background-color:Orange;">
    <th>Confirm Your Password </th>
    <td><input type="password" name="passconf" placeholder="Password Confirmation" required/>
     <?php echo form_error('pass');?></td>
  </tr>

  
  
  <tr  style="background-color:Orange;">
    <th colspan="2" align="center"> <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
	<input type="submit" name="signupSubmit" value="Register Me"  style="background-color:DodgerBlue;" class="button" /></th>
  </tr>


<tr>
    <th colspan="2" align="right">Click here for 
  <a href="<?php echo site_url('User/login') ?>">Login</a></th>
  </tr>
</table> 


</body>
</html>