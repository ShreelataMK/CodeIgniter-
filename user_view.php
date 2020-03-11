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
<table width="600" height="500" align="center" border="1" cellspacing="5" cellpadding="5" style="background-color:#90EE90" class="table table-hover">

	<tr style="background-color:#808000">
        <th colspan="9"><h2 class="txt">VIEW DATA LIST</h2></th>
      </tr>
      
	<tr style="background-color:#FF8C00">
    <th>Sr.no</th>		
	<th>roll_no</th>	
	<th>Name</th>
	<th>Mobile No.</th>
	<th>Address</th>
	<th>Files</th>
	<th colspan="3">Action</th>
	
</tr>
<?php $i=1;
foreach($data as $row) {

	?>
<tr style="background-color:#FDF5E6" align="center">
<td><?php echo $i;?></td>	
<td><?php echo $row->id;?></td>	
<td><?php echo $row->name;?></td>
<td><?php echo $row->mobile;?></td>
<td><?php echo $row->address;?></td>				
<td><img src="<?php echo base_url().'image/'.$row->picture;?>" width=100px height=100px/></td>

<?php 
	
	echo "<th><a href='editdata?id=".$row->id."'>EDIT</a></th>";
	echo "<th><a href='deletedata?id=".$row->id."'>DELETE</a></th>";
	echo "<th><a href='viewdata?id=".$row->id."'>VIEW</a><br></th>";
	echo "<tr>";

	$i++;
}?>
<tr><th colspan="9"><p align="right"><a href='http://localhost/codeigniter/index.php/User/home' class="button" style="background-color:DodgerBlue;">Home</a></p></th></tr>
</table>

</body>
</html>