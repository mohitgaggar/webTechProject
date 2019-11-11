<?php
session_start();
include ('headerp.php');

echo "<h1>Hello $user_name<br><h1>";
if(!isset($_SESSION['user_name']))
{
	header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<? php 

	$user=$_SESSION['user_name'];
	$get_user= "select * from users where user_ename='$user'";
	$run_user=mysqli_query($con,$get_user);
	$row= mysqli_fetch_array($run_user);

	$user_name=$row['user_name'];
	?>
	<title><?php echo"$user_name";?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<style type="text/css">
#cover-img{
	height:400px;
   	width:100%;
}
#profile_img{
	position: absolute;
	top: 190px;
	left: 40px;
}
#update_profile{
  	position: absolute;
  	top: 500px;
  	cursor: pointer;
  	left: 150px;
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
.abcd
{
	position:relative;
	top:100px;
}
</style>

<body>
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
	            <img src='$user_image' alt='Profile' class='img-circle' width='140px' height='120px' />
          	</div><br><br>
          	<form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>
	            <label id='update_profile'> Select Profile
	            <input type='file' name='u_image' size='30' />
	            </label>
	            <button id='button_profile' name='update' class='btn btn-info'>Update Profile</button>
	            </form>
          "; ?>

      </div>
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
<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-4 abcd" style="background-color: #e6e6e6; text-align: center; left:0.8%; border-radius: 5px;">
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
	<div class="col-sm-2">
		<button><a href="logout.php">Logout</a></button>
	</div>
</body>
</html>























<!-- <?php
	$user=$_SESSION['user_email'];
	$get_user= "select * from users where user_email='$user_email";
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

	$user_posts = "select * from posts where user_id='$user_id'";
	$run_posts= mysqli_query($con,$user_posts);
	$posts= mysqli_num_rows($run_posts);

?> -->