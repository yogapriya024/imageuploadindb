<?php
require "config.php";

if( $_SESSION["is_admin"] != 'admin'){
	header('location: login.php');
}
if( $_SESSION["is_admin"]=='admin')
{	
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
    
       echo "Please fill all required fields!";
	}

		if ($_POST['password'] !== $_POST['confirmpassword']) 
		{
			echo "Password and Confirm password should match!";   
		}
       
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
        $phone = mysqli_real_escape_string($conn,$_POST['phone']);
        $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
        $addressline_1 = mysqli_real_escape_string($conn,$_POST['address']);
        $city = mysqli_real_escape_string($conn,$_POST['city']);
        $state = mysqli_real_escape_string($conn,$_POST['state']);
        $zipcode = mysqli_real_escape_string($conn,$_POST['zipcode']);
        $usertype = mysqli_real_escape_string($conn,$_POST['usertype']);
        
		
	 $sql = "INSERT INTO user(username,firstname,lastname,email,password,phone,mobile,address,city,state,zipcode,usertype) VALUES ('$username','$firstname','$lastname','$email','$password','$phone','$mobile','$addressline_1','$city','$state','$zipcode','$usertype')";
	 $result = mysqli_query($conn,$sql);
		if(!$result)
		{
		    echo "Not Registered ........";
		}else{
				echo "Registered Successfully";
			}
	}
				//header('location:adminpanel.php');
	mysqli_close($conn);
}
 ?>
 <style>.class{
	font-size: 20px;
	margin-top: 207px;
    margin-left: 373px;
	}
.class input[type=text],input[type=tel],input[type=email],input[type=password],select,textarea{
   
  width: 25%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
}
	

.class button[type=submit]
{
	padding: 25px 57px;
	background-color: #4CAF50;
  color: white;
  margin: 27px 267px;
}
</style>
<div class="class">
<form action="" method="POSt" name="addreg">
<h1>Add User</h1>
<label for="username"><b>username</b></label>
      <input type="text" placeholder="Enter username" name="username" ><br>
	  <label for="firstname"><b>firstname</b></label>
      <input type="text" placeholder="Enter firstname" name="firstname" ><br>
	  <label for="lastname"><b>lastname</b></label>
      <input type="text" placeholder="Enter lastname" name="lastname" ><br>
	  <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" ><br>
      
	  <label for="pwd"><b>password</b></label>
      <input type="password" placeholder="Enter password" name="password" ><br>
	  <label for="cpwd"><b>confirm password</b></label>
      <input type="password" placeholder="Enter password" name="confirmpassword" ><br>
	  <label for="phone"><b>phone</b></label>
      <input type="tel" placeholder="Enter phone" name="phone" ><br>
	  <label for="mobile"><b>mobile</b></label>
      <input type="tel" placeholder="Enter mobile" name="mobile" ><br>

      <label for="addressline_1"><b>address</b></label>
      <input type="text" placeholder="Enter addressline" name="addressline_1" ><br>
	  <label for="city"><b>city</b></label>
      <input type="text" placeholder="Enter city" name="city" ><br>
	  <label for="state"><b>state</b></label>
      <input type="text" placeholder="Enter state" name="state" ><br>
	  <label for="zipcode"><b>zipcode</b></label>
      <input type="text" placeholder="Enter zipcode" name="zipcode" ><br>
	  <label for="usertype"><b>usertype</b></label>
      <input type="text" placeholder="Enter usertype" name="usertype" ><br>
	  
	  <input type="submit" name="submit" value="register"/>
</form>
</div>

