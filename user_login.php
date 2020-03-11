<!DOCTYPE html>
<html>
<head>
<title>Login form</title>
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
	<form method="post" action="<?php echo base_url();?>User/login_validation"> 
<table width="600" height="500" align="center" border="1" cellspacing="5" cellpadding="5" style="background-color:#90EE90">

  <tr style="background-color:Tomato;"><th colspan="2"><h2>LOGIN ACCOUNT</h2></th></tr>
  
          <!--  Status message -->
 <?php 
    
     echo $this->session->flashdata("error");
   ?>
  <!-- Login Form -->
 <tr>
		<td colspan="2"><?php echo @$error; ?></td>
	</tr>
  <tr style="background-color:Orange;">
    <th>Enter Your Email </th>
    <td><input type="email" name="email" placeholder="Email" required=""/>
      <?php echo form_error('email');?></td>
 </tr>

 <tr style="background-color:Orange;">
    <th width="230">Enter Your Password </th>
    <td width="329"><input type="password" name="pass" placeholder="Password" required=""/>
      <?php echo form_error('password');?></td>
  </tr> 
   <tr style="background-color:Orange;">
    <th colspan="2" align="center">
	<input type="submit" name="login" value="LOGIN" class="button" style="background-color:DodgerBlue;"/></th>
  </tr>

  <tr><th colspan="2" align="right">Don't have an Account?
  <a href="<?php echo site_url('User/register') ?>">Register</a></th></tr>
</table>

	</form>
</body>
