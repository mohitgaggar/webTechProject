<?php

session_start();

include('includes/connection.php');

 $value = $_POST['myKey'];
print_r($_POST);
print_r($_POST['myKey']);
$abcd = $_POST['myKey'];
print_r($abcd);
print_r(gettype($abcd));
print_r($abcd[4]);
print_r($abcd[5]);
echo "<br>";
print_r(count($_POST));
echo "<br>";
$all="";
for($i=1;$i<strlen($abcd)-1;$i++)
{
	if($abcd[$i]!='"')
	{
	$all.=$abcd[$i];
	}
}
print_r($all);
echo "<script>alert($value)</script>";
echo"<script>alert('IT WAS THE PHP FILE')</script>";
if(isset($_SESSION['user_name']))
{
	echo "<br>boomer";
	include('headerp.php');
	$user=$_SESSION['user_name'];
	$get_user= "select * from users where user_name='$user'";
	$run_user=mysqli_query($con,$get_user);
	$row= mysqli_fetch_array($run_user);
	$user_id=$row['user_id'];
	$user_name=$row['user_name'];
	echo "<br>$user_id";
	// $tasks= htmlentities(mysqli_real_escape_string($con,$all));
	$update = "update users set tasks='yes' where user_id='$user_id'";
	$run_update = mysqli_query($con, $update);
	if($run_update)
	{
		echo "Updated Properly<br>";
	}
	else
	{
		echo "Problems inserting to DB<br>";
	}
	$get_user_task="select * from tasker where user_id='$user_id'";
	$run_user=mysqli_query($con,$get_user);
	if(!$run_user)
	{
	$insert = "insert into tasker (user_id, task,date,updated) values('$user_id', '$all',NOW(),'yes')";
	$run = mysqli_query($con, $insert);
	if($run)
	{
		echo "Inserted Properly<br>";
	}
	else
	{
		echo "Problems inserting to DB<br>";
	}
}
else
{
	$update2 = "update tasker set task='$all' where user_id='$user_id'";
	$run_update2 = mysqli_query($con, $update);
	if($run_update2)
	{
		echo "Updated Properly<br>";
	}
	else
	{
		echo "Problems inserting to DB<br>";
	}
}
}
else
{
	echo "<script>alert('Not logged in, using guest session')</script>";
}

?>