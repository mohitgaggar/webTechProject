<html>
<head>
	<title>Register</title>
    <!-- <link rel="stylesheet" href="style/style.css"> -->
<?php include('header.php')?>

<style type="text/css">
	
#add-task input{
    display: block;
 }

#add-task button{
    display: inline-block;
}

#add-task:after{
    content: '';
    display: block;
    clear: both;
}

</style>



</head>
<div id="one">
	<input type="checkbox" id="nav-toggle" class="nav-toggle">
	<h2 class="logo">OUR FORUM</h2>
	<nav>
	<ul><!-- <li><a href="#">Profile</a></li> -->	
	<li><a href="#">Task Sheduler</a></li>	
	<li> <a href="#">Intrests</a></li>	
	<li> <a href="#">Learning and Hobbies</a></li>	
	<li> <a href="#">About Us</a></li>
	<li> <a href="#">Login</a></li>
	<li> <a href="#">Register</a></li>
</ul>	
	</nav>	
	<label for="nav-toggle" class="nav-toggle-label"><span> </span></label>
</div>   
 <div id="register">
        <form method="post">
            <br><br><br><br><input type="text" placeholder="Name" name="name"> 
            <br><input type="text" placeholder="Email" name="email">
            <!-- <input type="file" id="myfile" style="display:none"/> -->
            <br><input type="text" placeholder="Username" name="username">
			<br><input type="text" placeholder="Password" name="password">
			<br>
			<!-- <a href="reg_adder.php">Add Subtopics</a><br> -->
			<button type="submit" name="sign_up">Register</button>
			<?php include("insert_user.php");?>
		</form>
</div>
<?php include('footer.php')?>