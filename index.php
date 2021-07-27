<?php 
require "config.php";
?>
	<html>
	<head>
	<title>view images</title>
	<style>
	.formdesign{
		width:50%;
		margin:auto;
		
		
	}
	</style>
	</head>
	<body>
	<div class="formdesign">
	<form action="index.php" method="post" enctype="multipart/form-data">
	<table>
	<tr>
	<th>Name</th>
	<th>Email</th>
	<th>Image</th>
	<a href="logout.php">Logout</a>
	<?php
	$query=mysqli_query($conn,"SELECT * FROM  user INNER JOIN task ON user.id = task.user_id ");  
	if($query->num_rows!=0)
     {
  
  while($row=mysqli_fetch_assoc($query)){
	  
    echo "<tr>";
	echo "<td>".$row['username']."</td>";
	echo "<td>".$row['email']."</td>";
	echo '<td><img src="'.$row['image'].'"height="50" width="50"> </td>';
	echo "</tr>";
	
  }
  
	 }
  ?>
	</form>
	</div>
	</body>
	</html>