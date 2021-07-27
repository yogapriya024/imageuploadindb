<?php 
require "config.php";
if( $_SESSION["is_admin"] == 'admin'){
	header('location: login.php');
}
if( $_SESSION["is_admin"]!='admin')
{	
	
    $result = mysqli_query($conn,"SELECT * FROM task where id=".$_REQUEST['id']); 
	$task = $result->fetch_array(MYSQLI_ASSOC);
	
	 if(isset($_POST['submit']))
{
	$id = $_POST['id'];
	$user_id = $_POST['user_id'];
	if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
		 $filename = $_FILES['image']['name'];
		 $filetmpname = $_FILES['image']['tmp_name'];
		  $folder = 'uploads/';
		 $filepath = "uploads/" . $_FILES["image"]["name"];
	$size = $_FILES['image']['size'];
	$type = $_FILES['image']['type'];
	$image=$_FILES['image']['name'];
	//1st delete old file from folder
	//unlink("uploads/$old_image");
	//new image upload to folder
	move_uploaded_file($filetmpname,$folder.$filename);
	echo "<img src=".$filepath." height=50 width=50 />";
	}

	$query = "UPDATE task SET image='$filepath' WHERE id=$id ";
	//print_r($query);
	$data=mysqli_query($conn,$query);
	if($data)
	{
		
		echo "Record updated successfully";
	}
	else
	{
		"Record not updated";
	}
//header('location: userpanel.php');
}
?>
<body>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">


  <center><form action="" method="post" enctype="multipart/form-data">
<h2>upload image</h2>

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
<input type="file" name="image" id="image">
<input type="submit" name="submit" value="submit" />
<a href="userpanel.php">userpanel</a>
<a href="index.php">index</a>
</form>
  </center>
  
</div>
</body>
<?php
}
?>