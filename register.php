<?php
require "config.php";


if(isset($_POST['submit']))
{
	
		if (empty($_POST['username']) ||
			empty($_POST['firstname']) ||
			empty($_POST['lastname']) ||
			empty($_POST['email']) ||
			empty($_POST['password'])||
			empty($_POST['phone']) ||
			empty($_POST['mobile']))
	
		{
    
			echo "Please fill all mandatory fields!";
		}

			if ($_POST['password'] !== $_POST['confirm password']) 
			{
				echo "Password and Confirm password should match!";   
			}
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
	$lastname=mysqli_real_escape_string($conn,$_POST['lastname']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$address=mysqli_real_escape_string($conn,$_POST['address']);
	$phone=mysqli_real_escape_string($conn,$_POST['phone']);
	$mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$city=mysqli_real_escape_string($conn,$_POST['city']);
	$state=mysqli_real_escape_string($conn,$_POST['state']);
	$zipcode=mysqli_real_escape_string($conn,$_POST['zipcode']);
	
	 $sql = "INSERT INTO user(username,firstname,lastname,email,address,phone,mobile,password,city,state,zipcode) VALUES ('$username','$firstname','$lastname','$email','$address','$phone','$mobile','$password','$city','$state','$zipcode')";
	 $result = mysqli_query($conn,$sql);
		if(!$result)
		{
		    echo "Not Registered ........";
		}else{
				echo "Registered Successfully";
			}

				header('location:login.php');
	mysqli_close($con);

}


?>







<html>
<head>
<title>USER REGISTERATION</title>
</head>
<body>
<form action="register.php" method="post" value="register" >
<center>
<label for="username">USER NAME</label>
<input type="text" id="username" name="username" > <br><br>
<label for="firstname">FIRST NAME</label>
<input type="text" id="firstname" name="firstname" ><br><br>
<label for="lastname">LAST NAME</label>
<input type="text" id="lastname" name="lastname" ><br><br>
<label for="email">EMAIL</label>
<input type="email" id="email" name="email" ><br><br>
<label for="address">ADDRESS</label>
<textarea id="body" rows="5" placeholder="Type Message" name="address"></textarea><br><br>
<label for="phone">PHONE</label>
<input type="tel" id="phone" name="phone" ><br><br>
<label for="mobile">MOBILE</label>
<input type="tel" id="mobile" name="mobile" ><br><br>
<label for="password">PASSWORD</label>
<input type="password" id="password" name="password" ><br><br>
<label for="confirmpassword">CONFIRM PASSWORD</label>
<input type="password" placeholder="Enter password" name="confirmpassword" ><br><br>
<label for="city">CITY</label>
<input type="text" id="city" name="city" ><br><br>
<label for="state">STATE</label>
<input type="text" id="state" name="state" ><br><br>
<label for="zipcode">ZIPCODE</label>
<input type="text" id="zipcode" name="zipcode" ><br><br>
 <input type="submit" name="submit" value="register"><br><br>
 <a href="login.php">LOGIN</a>
</center>
</form>
</body>
</html>