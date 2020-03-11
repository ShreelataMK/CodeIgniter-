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

  
  <!-- <?php echo "<input type='file' name='profile_pic' size='20' />"; ?>
  <?php echo "<input type='submit' name='submit' value='upload' /> ";?> -->
<?php $i=1;
foreach($data as $row) {

  ?>
  
  <?php echo form_open_multipart('User/updatedata');?>

    
    <table width="600" height="500" align="center" border="1" cellspacing="5" cellpadding="5" style="background-color:#90EE90" class="table table-hover">
     
      <tr style="background-color:#B22222">
        <th colspan="2"><h2 class="txt">DATA UPDATE</h2></th>
      </tr>
       <tr>
        <td colspan="2"><?php echo @$error; ?></td>
      </tr>
      <tr>
        <td colspan="2"><?php echo validation_errors(); ?></td>
      </tr>

      <tr style="background-color:#FFD700"> 
        <td width="230">Enter Your Roll No. </td>
       <td width="329"><input type="text" name="id" value="<?php echo $row->id;?>"></td>
       </tr>           
      
      <tr style="background-color:#FFD700">  
      <td width="230">Enter Your Name </td>
    <td width="329"><input type="text" name="name" value="<?php echo $row->name;?>"></td>
  </tr>
   
  
  <tr style="background-color:#FFD700">
    <td width="230">Enter Your Mobile No. </td>
    <td width="329"><input type="text" name="number" value="<?php echo $row->mobile;?>"></td>
  </tr>
  

  <tr style="background-color:#FFD700">
    <td>
    <label for="address">Address:</label></td>
            <td>
          <input  type="text" name="address" value="<?php echo $row->address;?>"/>
        </td>
  </tr>


  <tr style="background-color:#FFD700">
    <td width="230">Upload file:</td>
    <td width="329"><input type = "file" name = "picture" value="<?php echo $row->picture;?>"/></td>
  </tr> 
 

  <tr style="background-color:#FFD700">
    <td colspan="2" align="center"><input type='submit' name='update' value='update' style="background-color:DodgerBlue;" class="button"/></td>
    </tr>


    <tr>
      <th align="right" colspan="2"><a href='http://localhost/codeigniter/index.php/User/dispdata'>Click here for view the details</th>
      </tr>

    <tr><th colspan="2"><p align="right"><a href='http://localhost/codeigniter/index.php/User/home'>Home</a></p></th>
</tr>  

</table>
<?php }?>


</body>
</html>