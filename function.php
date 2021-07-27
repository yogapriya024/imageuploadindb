<?php

function insert($request ,$conn)
{
	
		if (empty($request['username']) ||
			empty($request['firstname']) ||
			empty($request['lastname']) ||
			empty($request['email']) ||
			empty($request['password'])||
			empty($request['phone']) ||
			empty($request['mobile']))
	
		{
    
			echo "Please fill all required fields!";
		}

			if ($request['password'] !== $request['confirmpassword']) 
			{
				echo "Password and Confirm password should match!";   
			}
	$username=mysqli_real_escape_string($conn,$request['username']);
	$firstname=mysqli_real_escape_string($conn,$request['firstname']);
	$lastname=mysqli_real_escape_string($conn,$request['lastname']);
	$email=mysqli_real_escape_string($conn,$request['email']);
	$address=mysqli_real_escape_string($conn,$request['address']);
	$phone=mysqli_real_escape_string($conn,$request['phone']);
	$mobile=mysqli_real_escape_string($conn,$request['mobile']);
	$password=mysqli_real_escape_string($conn,$request['password']);
	$city=mysqli_real_escape_string($conn,$request['city']);
	$state=mysqli_real_escape_string($conn,$request['state']);
	$zipcode=mysqli_real_escape_string($conn,$request['zipcode']);
	$usertype=mysqli_real_escape_string($conn,$request['usertype']);
	 $sql = "INSERT INTO user(username,firstname,lastname,email,address,phone,mobile,password,city,state,zipcode) VALUES ('$username','$firstname','$lastname','$email','$address','$phone','$mobile','$password','$city','$state','$zipcode')";
	 $result = mysqli_query($conn,$sql);
		if(!$result)
		{
		    echo "Not Registered ........";
		}else{
				echo "Registered Successfully";
			}

				redirect("login");
	mysqli_close($con);

}




















?>