<?php
	include('includes/connection.php');
	$user=$_SESSION['user_name'];
	$get_user= "select * from users where user_name='$user'";
	$run_user=mysqli_query($con,$get_user);
	$row= mysqli_fetch_array($run_user);

	$user_id = $row['user_id'];
	$user_name=$row['user_name'];
	$describe= $row['describe_user'];
	$user_pass=$row['password'];
	$user_image=$row['user_image'];
	$name=$row['name'];
	$registered=$row['user_reg_date'];
	$recover=$row['recovery'];
	$relation=$row['relationship'];

	$user_posts = "select * from posts where user_id='$user_id'";
	$run_posts= mysqli_query($con,$user_posts);
	$posts= mysqli_num_rows($run_posts);

?>