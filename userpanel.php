<?php 
require "config.php";

if( $_SESSION["is_admin"]!='admin')
{	
?>
<table cellpadding="1" cellspacing="15">
<tr><td><a href="index.php">index</a></td>
<td><a href="logout.php">Logout</a></td></tr>
<a href ="upload1.php">Upload</a>
<tr>
<th> id</th>
<th> username</th>
<th> firstname</th>
<th> lastname</th>
<th> email</th>
<th>phone </th>
<th>user_id </th>
<th> image</th>

</tr>
<?php

$query=mysqli_query($conn,"SELECT *,user.id as id,task.id as taskid FROM  user INNER JOIN task ON user.id = task.user_id where user_id=".$_SESSION['id']);  

if($query->num_rows!=0)
     {
  
  while($row=mysqli_fetch_assoc($query)){
	  
    echo "<tr>";
	echo "<td>".$row['id']."</td>";
	echo "<td>".$row['username']."</td>";
	echo "<td>".$row['firstname']."</td>";
	echo "<td>".$row['lastname']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['phone']."</td>";
	echo "<td>".$row['user_id']."</td>";
	echo '<td><img src="'.$row['image'].'"height="50" width="50"> </td>';
	echo "<td> <a href=\"edit1.php?id=".$row['taskid']."\">edit</a>";
      echo "<td> <a href=\"delete1.php?id=".$row['taskid']."\">delete</a>";
	
	echo "</tr>";
	
  }
} 
	
	
	
	echo "</table>" ;
	

    	
	}
	
  
	 


?>











</body>
</html>
