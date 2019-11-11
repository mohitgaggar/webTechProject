
<?php

session_start();
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
// include("header.php");
if(!isset($_SESSION['user_name'])){
	header("location: index.php");
}

function insertPost(){
	global $user_id;
	global $user_name;
	global $con;
	if(isset($_POST['sub'])){
		echo "<script>alert('$user_id')</script>";
		$content = htmlentities($_POST['content']);
		$upload_image = $_FILES['upload_image']['name'];
		$image_tmp = $_FILES['upload_image']['tmp_name'];
		$random_number = rand(1, 100);

		if(strlen($content) > 250){
			echo "<script>alert('Please Use 250 or less than 250 words!')</script>";
			echo "<script>window.open('forum.php', '_self')</script>";
		}else{
			if(strlen($upload_image) >= 1 && strlen($content) >= 1){
				move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
				$insert = "insert into posts (user_id, post_content, upload_image, post_date) values('$user_id', '$content', '$upload_image.$random_number', NOW())";

				$run = mysqli_query($con, $insert);

				if($run){
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('forum.php', '_self')</script>";

					$update = "update users set post='yes' where user_id='$user_id'";
					$run_update = mysqli_query($con, $update);
				}

				exit();
			}else{
				if($upload_image=='' && $content == ''){
					echo "<script>alert('Error Occured while uploading!')</script>";
					echo "<script>window.open('forum.php', '_self')</script>";
				}else{
					if($content==''){
						move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
						$insert = "insert into posts (user_id,post_content,upload_image,post_date) values ('$user_id','No','$upload_image.$random_number',NOW())";
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('forum.php', '_self')</script>";

							$update = "update users set post='yes' where user_id='$user_id'";
							$run_update = mysqli_query($con, $update);
						}

						exit();
					}else{
						$insert = "insert into posts (user_id, post_content, post_date) values('$user_id', '$content', NOW())";
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('forum.php', '_self')</script>";

							$update = "update users set post='yes' where user_id='$user_id'";
							$run_update = mysqli_query($con, $update);
						}
					}
				}
			}
		}
	}
}

 ?>

<html>
<head>
	<?php
		$user = $_SESSION['user_name'];
		$get_user = "select * from users where user_name='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['user_name'];
	?>
	<title><?php echo "$user_name"; ?></title>
</head>
<body>
<div class="row">
	<div id="insert_post" class="col-sm-12">
		<center>
		<form action="forum.php?id=<?php echo $user_id; ?>" method="post" id="f" enctype="multipart/form-data">
		<textarea class="form-control" id="content" rows="4" name="content" placeholder="What's in your mind?"></textarea><br>
		<label class="btn btn-warning" id="upload_image_button">Select Image
		<input type="file" name="upload_image" size="30">
		</label>
		<button id="btn-post" class="btn btn-success" name="sub">Post</button>
		</form>
		<?php insertPost(); ?>
		</center>
	</div>
</div>
</body>
</html>