<?php 
require "config.php";
if( $_SESSION["is_admin"] == 'admin'){
	header('location: login.php');
}
if( $_SESSION["is_admin"]!='admin')
{	
$id = $_GET['id'];
$query = "DELETE FROM task WHERE id='$id'";
$data = mysqli_query($conn,$query);
if($data)
{
	echo "Record Deleted Successfully";
}
else{
	echo "Sorry , Delete process failed";
}
header('location: userpanel.php');
}
?>