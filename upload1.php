<?php 
require "config.php";
if( $_SESSION["is_admin"] == 'admin'){
	header('location: login.php');
}
if( $_SESSION["is_admin"]!='admin')
{	
if(isset($_POST['upload'])) 
	{
		$id = $_POST['id'];
	$user_id = $_POST['user_id'];
		 $filename = $_FILES['image']['name'];
		 $filetmpname = $_FILES['image']['tmp_name'];
		  $folder = 'uploads/';
		 $filepath = "uploads/" . $_FILES["image"]["name"];
		 move_uploaded_file($filetmpname,$folder.$filename);
	echo "<img src=".$filepath." height=50 width=50 />";
	$user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
	
		$sql="insert into task(user_id,image)values('$user_id','$filepath')";
$qry = mysqli_query($conn,$sql);
if($qry)
{
	echo"image uploaded";
}

else{
	echo"image not selected";
}

//header('location: adminpanel.php');
	
 




	
}

 
?>

<html>
<head>
</head>
<body>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<center>
<form action="upload1.php" method="post"  enctype="multipart/form-data">
<h2>UPLOAD IMAGES</h2>



<input type="hidden" name="id" value="<?php echo $task['id']; ?>"/><br><br>
<label>user_name</label>
<select id="user_id"  name="user_id">
<?php
$sql="select * from user";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
	echo '<option value="'.$row['id'].'" '.($row['id']==$task['user_id']? "selected": "").'>'.$row['firstname']." ".$row['lastname'].'</option>';
}



?>
</select>




<label>choose an image</label>
<input type="file" name="image">
<input type="submit" name="upload" value="upload">
<a href="userpanel.php">userpanel</a>
</form>
  </center>
  
</div>
</body>
</html>
<?php
}
?>