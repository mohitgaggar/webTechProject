<head>
	<html>
	<link rel="stylesheet" href="task_add.css">
	  <link rel="stylesheet" type="text/css" href="style/style.css">
    <div id="login">
    	<div id="page_top">
	    <h1 class="title">Login</h1>
		</div>
		<div class="intro">
        <form method="post">
            Username: <br><input type="text" placeholder="Username" name="Username"><br>    
            Password: <br><input type="text" placeholder="Password" name="Password"><br>
            <button type="submit" name="login">Login</button>
        <?php include("login_act.php");?>
        </form>
    	</div>
    </div>
    <html>