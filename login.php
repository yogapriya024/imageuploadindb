<?php
require "config.php";
if(isset($_POST['login']))
 { 
$email=$_POST['email'];
$password=$_POST['password'];
$usertype=$_POST['usertype'];
if (
empty($_POST['email']) ||
empty($_POST['password'])) 
{
    
    echo('Please fill all required fields!');
	
}
	$sql = "SELECT * FROM user WHERE email='".$email."' and password='".$password."' and usertype='".$usertype."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " Email: " . $row["email"]. " " . $row["usertype"]. "<br>";
	 $email=$row['email'];  
    $password=$row['password'];  
	$usertype = $row['usertype'];
	$id = $row['id'];
	$_SESSION["email"]=$email;
	$_SESSION["is_admin"]=$usertype;
	$_SESSION["id"]=$id;
  }
} else {
  echo "0 results";
}
if( $_SESSION["is_admin"] != 'admin'){
	header('location: userpanel.php');
}
if( $_SESSION["is_admin"]=='admin')
{	header('location:adminpanel.php');

}
 }

?>
<html>
<body>
<h1>LOGIN </h1>
<form action="" method="post" name="login">
<table>
<tr>
<td>EMAIL:<input type="email" name="email" placeholder="Enter your email"></td>
</tr>
<tr>
<td>PASSWORD:<input type="password" name="password" placeholder="Enter your password"></td>
</tr>
<tr>
<td>Select Usertype:<select name="usertype">
<option value ="admin">Admin</option>
<option value ="user">User</option>
</select>
</td>
</tr>
<tr>
<td><input type="submit" name="login" value="login"></td>
</tr>
<tr>
<td><a href="reg.php">Register</a><br><br><a href="logout.php">Logout</a>
</tr>
</table>
</form>
</body>
</html>