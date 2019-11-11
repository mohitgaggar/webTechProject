<?php

session_start();

include('includes/connection.php');

if(isset($_POST['login']))
{
	$Username=htmlentities(mysqli_real_escape_string($con,$_POST['Username']));
	$Password=htmlentities(mysqli_real_escape_string($con,$_POST['Password']));

	$select_user = "select * from users where user_name='$Username' AND password='$Password' ";
	$query= mysqli_query($con,$select_user);
	$check_user= mysqli_num_rows($query);

	if($check_user == 1)
	{
		$_SESSION['user_name']=$Username;
		echo "<script>window.open('profile.php','_self')</script>";
	
	}
	else
	{
		echo "<script>alert('Incorrect username or password');</script>";
	}
}
?>