<?php
	include("includes/connection.php");

	if(isset($_POST['sign_up']))
	{
		$name= htmlentities(mysqli_real_escape_string($con,$_POST['name']));
		$email= htmlentities(mysqli_real_escape_string($con,$_POST['email']));
		$user_name= htmlentities(mysqli_real_escape_string($con,$_POST['username']));
		$pass=htmlentities(mysqli_real_escape_string($con,$_POST['password']));
		// $ava=htmlentities(mysqli_real_escape_string($con,$_POST['avatar']));
		$status="verified";
		$posts="no";
		echo "<script>alert('$name')</script>";
		echo "<script>alert('$user_name')</script>";
		echo "<script>alert('$pass')</script>";

		if(strlen($pass)<7)
		{
			echo "<script>alert('Password should be more than 7 characters')</script>";
			exit();
		}
		$check_email= "select * from users where user_email='$email'";
		$run_email = mysqli_query($con, $check_email);
		$check=mysqli_num_rows($run_email);
		if($check == 1)
		{
			echo "<script>alert('Email already exists')</script>";
			echo "<script>window.open('register.php','_self')</script>";
			exit();
		}
		$ava=rand(1,4);
		if($ava==1)
		{
			$profile="Imagess/av1.jpg";
		}
		if($ava==2)
		{
			$profile="Imagess/av2.jpg";	
		}
		if($ava==3)
		{
			$profile="Imagess/av3.jpg";
		}
		if($ava==4)
		{
			$profile="Imagess/av4.jpg";
		}
		$insert="insert into users (name,user_email,user_name,password,describe_user,relationship,user_image,user_reg_date,status,post,recovery) values ('$name','$email','$user_name','$pass','Default Status','...','$profile',NOW(),'$status','$posts','ABCD')";
		$query1= mysqli_query($con,$insert);
		if($query1)
		{
			echo "<script>alert('Well done $user_name, you are good to go')</script>";
			echo "<script>window.open('login.php','_self')</script>";
		}
		else
		{
			echo "<script>alert('$email')</script>";
			echo "<script>alert('$query1')</script>";
			echo "<script>alert('FAILED. try again')</script>";
			echo "<script>window.open('register.php','_self')</script>";
		}
	}
?>



