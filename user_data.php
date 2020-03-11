<!DOCTYPE html>
<html>
<head>
	<title>User Data</title>
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



<table width="600" height="500" align="center" border="1" cellspacing="5" cellpadding="5" style="background-color:#90EE90" class="table table-hover">
	<tr style="background-color:#808000">
		<td colspan="8" align="center"><h2>DATA BY ID</h2></td>
	</tr>
	
	<?php $i=1;
	foreach ($data as $row) {
		# code...
	}
	?>

<tr style="background-color:#FDF5E6"><th>Roll No.:</th><td><?php echo $row->id; ?></td></tr>
<tr style="background-color:#FDF5E6"><th>Name:</th><td><?php echo $row->name; ?></td></tr>
<tr style="background-color:#FDF5E6"><th>Mobile:</th><td><?php echo $row->mobile; ?></td></tr>
<tr style="background-color:#FDF5E6"><th>Address:</th><td><?php echo $row->address; ?></td></tr>				
<tr style="background-color:#FDF5E6"><th>Uploaded file:</th><td><img src="<?php echo base_url('image/bgimage.png');?>" width=100px height=100px/></td></tr>

<!-- <tr style="background-color:#FDF5E6"><th>Uploaded file:</th><td><img src="<?php echo base_url().'image/'.$row->picture;?>" width=100px height=100px/></td></tr> -->
<!-- <tr><td align="right" colspan="2"><a href="<php echo editdata?id=$roid;?>"/>Click here for view the list of details</td></tr> -->
<th align="right" colspan="2"><a href='http://localhost/codeigniter/index.php/User/dispdata'><br>Click here for view the details<br></th><br></tr>
<tr><td colspan="2"><p align="right"><a href='http://localhost/codeigniter/index.php/User/home' class="button2" style="background-color:DodgerBlue;">Home</a></p></td></tr>
</table>
</body>
</html>