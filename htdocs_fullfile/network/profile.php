<?php
session_start();
include ('headerp.php');
include ('header.php');
if(!isset($_SESSION['user_name']))
{
	header("location: index.php");
}
?>

<html>
<head>
	<?php 

	$user=$_SESSION['user_name'];
	$get_user= "select * from users where user_name='$user'";
	$run_user=mysqli_query($con,$get_user);
	$row= mysqli_fetch_array($run_user);
	$user_id=$row['user_id'];
	$user_name=$row['user_name'];
	// include("header.php");
	?>
	<title><?php echo"$user_name";?></title>
			<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style type="text/css">
body{
	overflow-x: hidden;
}
#upload_image_button{
	position: absolute;
	top: 50.5%;
	right: 14%;
	min-width: 100px;
	max-width: 100px;
	border-radius: 4px;
	transform: translate(-50%, -50%);
}
label{
	padding: 7px;
	display: table;
	color: #fff;
}
input[type="file"]{
	display: none;
}
#content{
	width: 70%;
}
#btn-post{
	min-width: 25%;
	max-width: 25%;
}
#insert_post{
	background-color: #fff;
	border: 2px solid #e6e6e6;
	padding: 40px 50px;
}
#posts{
	border: 5px solid #e6e6e6;
	padding: 40px 50px;
}
#posts-img{
	padding-top: 5px;
	padding-right: 10px;
	min-width: 102%;
	max-width: 50%;
}
#single_posts{
	border: 5px solid #e6e6e6;
	padding: 40px 50px;
}
#cover-img{
	height:400px;
   	width:100%;
}
#profile_img{
	position: absolute;
	top: 160px;
	left: 40px;
}
#update_profile{
  	position: absolute;
  	top: 150px;
  	cursor: pointer;
  	left: 93px;
  	border-radius: 4px;
  	background-color: rgba(0,0,0,0.1);
  	transform: translate(-50%, -50%);
}
#button_profile{
  	position: absolute;
  	top: 115%;
  	left: 50%;
  	cursor: pointer;
  	transform: translate(-50%, -50%);
}
#own_posts{
    border: 5px solid #e6e6e6;
    padding: 40px 50px;
}
#posts_img {
    height:300px;
   	width:100%;
}

</style>

<body>
	<div id="one">
	<input type="checkbox" id="nav-toggle" class="nav-toggle">
	<h2 class="logo">OUR FORUM</h2>
	<nav>
	<ul><!-- <li><a href="#">Profile</a></li> -->	
	<li><a href="tasker.php">Task Scheduler</a></li>	
	<li> <a href="Interests.html">Interests</a></li>	
	<li> <a href="FirstL&H.html">Learning and Hobbies</a></li>	
	<li> <a href="#">About Us</a></li>
	<li> <a href="login.php">Login</a></li>
	<li> <a href="register.php">Register</a></li>
	<li> <a href="profile.php">Profile</a></li>
	<li> <a href="forum.php">Forum</a></li>	
	</ul>	
	</nav>	
	<label for="nav-toggle" class="nav-toggle-label"><span> </span></label>
	</div>
	<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8">
          <?php
          echo "
         	<div>
				<div><img id='cover-img' class='img-rounded' src='Imagess/alley.jpg' alt='cover'/></div>
			</div>
         	<div id='profile_img'>
	            <img src='$user_image' alt='Profile' class='img-circle' width='180px' height='185px' />
	            <form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>
	            <label id='update_profile'> Select Profile
	            <input type='file' name='u_image' size='60' />
	            </label>
	            <button id='button_profile' name='update' class='btn btn-info'>Update Profile</button>
	            </form>
          	</div><br>
          "; ?>
            <?php 

            if(isset($_POST['update'])){

              $u_image = $_FILES['u_image']['name'];
              $image_tmp = $_FILES['u_image']['tmp_name'];
              $random_number = rand(1,100);

              if($u_image==''){
                echo "<script>alert('Please Select Profile Image on clicking on the profile image area!')</script>";
                echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";
                exit();
              }else{
              
              move_uploaded_file($image_tmp,"Imagess/$u_image.$random_number");
              
              $update = "update users set user_image='Imagess/$u_image.$random_number' where user_id='$user_id'";
              
              $run = mysqli_query($con,$update); 
              
              if($run){
              
              echo "<script>alert('Your Profile Updated!')</script>";
              echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";
              }
            }
            }
          ?> 
          </div>
    <div class="col-sm-2">
	</div>
</div>
<div class="row">
	<center><button><a href="logout.php">Logout</a></button></center>
</div> 
<br><br>
<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8" style="background-color: #e6e6e6; text-align: center; left:0.8%; border-radius: 5px;">
		<?php
		echo"
		<center><h2><strong>About</strong></h2></center><br>
		<center><h4><strong>$name</strong></h4></center>
        <p><strong><i style='color:grey;'> $describe</i></strong></p><br>
        <p><strong>Position: </strong>$relation</p><br>
        <p><strong>Member Since: </strong> $registered</p><br>
        ";
        ?>
	</div>
</div>
<div class="row">
	<h2><center>TASKS</center></h2>
</div>
<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
		<?php
			global $con;
			if(isset($_GET['u_id'])){
			$u_id = $_GET['u_id'];
			}
			$get_posts = "select * from tasker";
			
			$run_posts = mysqli_query($con,$get_posts);
			
			while($row_posts=mysqli_fetch_array($run_posts)){
			$user_id = $row_posts['user_id'];
			$content = $row_posts['task'];
			$post_date = $row_posts['date'];
			
			//getting the user who has posted the thread
			
			$user = "select * from users where user_id='$user_id' AND tasks='yes'";
			$run_user = mysqli_query($con,$user); 
			$row_user= mysqli_fetch_array($run_user);
			
			$user_name = $row_user['user_name'];
			$user_image = $row_user['user_image'];
			echo "
			
			<div id='own_posts'>
				<div class='row'>
					<div class='col-sm-2'>
						<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
					</div>
					<div class='col-sm-6'>
						<h3><a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='profile.php?u_id=$user_id'>$user_name</a></h3>
						<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
					</div>
					<div class='col-sm-4'>
						
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-2'>
					</div>
					<div class='col-sm-6'>
						<h2><p>TASK ALERT<p></h2>
						<h3><p>$content</p></h3>
					</div>
					<div class='col-sm-4'>
						
					</div>
				</div>
			</div>
			";
		}
		// include("functions/delete_post.php");}
		?>
	</div>
	<div class="col-sm-2"></div>
</div>

<div class="row">
	<h2><center>POSTS<center></h2>
</div>
<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
		<?php
			global $con;
			if(isset($_GET['u_id'])){
			$u_id = $_GET['u_id'];
			}
			$get_posts = "select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";
			
			$run_posts = mysqli_query($con,$get_posts);
			
			while($row_posts=mysqli_fetch_array($run_posts)){
		
			$post_id = $row_posts['post_id'];
			$user_id = $row_posts['user_id'];
			$content = $row_posts['post_content'];
			$upload_image = $row_posts['upload_image'];
			$post_date = $row_posts['post_date'];
			
			//getting the user who has posted the thread
			
			$user = "select * from users where user_id='$user_id' AND post='yes'"; 
			
			$run_user = mysqli_query($con,$user); 
			$row_user= mysqli_fetch_array($run_user);
			
			$user_name = $row_user['user_name'];
			$user_image = $row_user['user_image'];
			
			//now displaying all at once 

			if($content=="No" && strlen($upload_image) >= 1){
			echo "
			<div id='own_posts'>
				<div class='row'>
					<div class='col-sm-2'>
						<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
					</div>
					<div class='col-sm-6'>
						<h3><a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='profile.php?u_id=$user_id'>$user_name</a></h3>
						<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
					</div>
					<div class='col-sm-4'>
						
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-12'>
						<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
					</div>
				</div><br>
				<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
			</div><br/><br/>
			";


			}
			else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo "
			<div id='own_posts'>
				<div class='row'>
					<div class='col-sm-2'>
						<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
					</div>
					<div class='col-sm-6'>
						<h3><a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='profile.php?u_id=$user_id'>$user_name</a></h3>
						<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
					</div>
					<div class='col-sm-4'>
						
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-12'>
						<p>$content</p>
						<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
					</div>
				</div><br>
				<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
			</div><br/><br/>
			";


			}
			else{

			echo "
			
			<div id='own_posts'>
				<div class='row'>
					<div class='col-sm-2'>
						<p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
					</div>
					<div class='col-sm-6'>
						<h3><a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='profile.php?u_id=$user_id'>$user_name</a></h3>
						<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
					</div>
					<div class='col-sm-4'>
						
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-2'>
					</div>
					<div class='col-sm-6'>
						<h3><p>$content</p></h3>
					</div>
					<div class='col-sm-4'>
						<a href='profile.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
					</div>
				</div>
			</div>
			";
		}
		// include("functions/delete_post.php");	
		}
		?>
	</div>
	<div class="col-sm-2"></div>
</div>
</body>
</html>