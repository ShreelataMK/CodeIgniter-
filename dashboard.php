<!DOCTYPE html>
<html>
<head>
  <title></title>
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

.button2 {
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

  <?php echo form_open_multipart('User/upload');?>
    
    <table width="500" height="500" align="center" border="1" cellspacing="5" cellpadding="5" style="background-color:#90EE90" class="table table-hover">
      <tr>
        <td colspan="2"><?php echo @$error; ?></td>
      </tr>
      <tr style="background-color:#B22222">
        <th colspan="2"><h2 class="txt">DATA INSERT</h2></th>
      </tr>
      <tr>
        <td colspan="2"><?php echo validation_errors(); ?></td>
      </tr>
       <tr style="background-color:#FFD700">
    <th width="230" align="right">Enter Your Name :</th>
    <td width="329"><input type="text" name="name" value="" required/></td>
  </tr>
  <tr style="background-color:#FFD700">
    <th width="230" align="right">Enter Your Mobile No. :</th>
    <td width="329"><input type="text" name="number" value="" required/></td>
  </tr>
  <tr style="background-color:#FFD700">
    <th align="right">
            <label for="address">Address :</label></th>
            <td>
            <textarea  name="address" name="address" value="" required/ ></textarea>
        </td>
  </tr>
  <tr style="background-color:#FFD700">
    <th width="230" align="right">Upload file :</th>
    <td width="329"><input type='file' name='picture' size='20'/></td>
  </tr>
  <tr style="background-color:#FFD700">
    <th colspan="2" align="center"><input type='submit' name='submit' value='upload' style="background-color:DodgerBlue;" class="button" /></th>
    </tr>



    
    <!-- <tr><td align="right" colspan="2"><a href='http://localhost/codeigniter/index.php/User/viewdata?id=$row->id'>Click here for view the details</td></tr> -->
    <tr><th align="right" colspan="2"><a href='http://localhost/codeigniter/index.php/User/display'>view the details</th></tr>
</table>
</body>
</html>
















<!-- <!DOCTYPE html>
<html>
<head>
  <title>Home</title>
</head>
<body>

<h1>Insert Data</h1>

<table width="50%" border="1">
  <?php echo @$error; ?> 
 <form  method="post">
  
  <tr>
    <th>Column</th>
    <th>Data</th>
    
  </tr>
  <tr>
    <td>Name:</td>
    <td><input type="text" name="name" value="<?php echo set_value('name');?>"/>
      <?php if (form_error('name')) {
        echo "<span style='color:red'>".form_error('name')."<span>";
      }?>
      </td>
  </tr>
  <tr>
    <td>Roll No:</td>
    <td><input type="text" name="rollno" value="<?php echo set_value('rollno');?>"/>
      <?php if (form_error('rollno')) {
        echo "<span style='color:red'>".form_error('rollno')."<span>";
      }?></td>
  </tr>
  <tr>
    <td>Class:</td>
    <td><input type="text" name="class"></td>
  </tr>
  <tr>
    <td>Address:</td>
    <td><input type="text" name="address" value="<?php echo set_value('address');?>"/>
      <?php if (form_error('address')) {
        echo "<span style='color:red'>".form_error('address')."<span>";
      }?></td></tr>
  </tr>
  <tr>
  <tr> <td><?php echo @$error; ?> 
  <?php echo form_open_multipart('User/upload');?>
  <?php echo "<input type='file' name='profile_pic' size='20' />"; ?>
  <?php echo "<input type='submit' name='submit' value='upload' /> ";?>
  <?php echo "</form>"?>
  </td><td>
           
       </td>
  </tr>
 <tr>
    <td colspan="2" align="center"><input type="submit" name="submit"></td>
  </tr>
  </form>

</table>
</body>
</html> -->