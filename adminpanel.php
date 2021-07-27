<?php
require "config.php";
if( $_SESSION["is_admin"] != 'admin'){
	header('location: login.php');
}
if( $_SESSION["is_admin"]=='admin')
{
	if($_SESSION["id"]){
		
	?>
	
	
	

<table cellpadding="1" cellspacing="15">
<tr><td><a href ="upload.php">Upload</a></td>
	<td><a href ="addreg.php">Add User</a></td>
	<td><a href="logout.php">Logout</a></td>
	<td><a href="index.php">index</a></td></tr>
<tr>
<th>id</th>
<th>username</th>
<th>firstname</th>
<th>lastname</th>
<th>email</th>
<th>phone</th>
<th>image</th>

<th colspan=3> operation</th>
</tr>
<?php 


 $sql="SELECT * ,user.id as id,task.id as taskid FROM user INNER JOIN task ON user.id = task.user_id"; 
 
$result = mysqli_query($conn,$sql);
	
    if(mysqli_num_rows($result)>0)  
    {  
	
    while($row = mysqli_fetch_array($result))  
    {  
    echo "<tr>";
	echo "<td>".$row['id']."</td>";
	echo "<td>".$row['username']."</td>";
	echo "<td>".$row['firstname']."</td>";
	echo "<td>".$row['lastname']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['phone']."</td>";
	echo '<td><img src="'.$row['image'].'"height="50" width="50"> </td>';
      echo "<td> <a href=\"edit.php?id=".$row['taskid']."\">edit</a>";
      echo "<td> <a href=\"delete.php?id=".$row['taskid']."\">delete</a>";
	  echo "</tr>";  

    }	
	}
	
  echo "</table>" ;
}
	 
}

?>

</body>
</html>








