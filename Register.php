<?php
	session_start();
	ini_set('session.cache_limiter','public');
	session_cache_limiter(false);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="Main.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js" type="text/javascript"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="register.js" type="text/javascript"></script>
    </head>
    <body>
    	<div class="container-fluid">
			<div class="jumbotron">
		    	<h1>Softwear</h1>
		    	<p><small><em>Clothing for computer scientists by computer scientists!</em></small></p> 
		  	</div>
		  	
		  	<?php
			  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			  	  include 'menu_authenticated.php';
			  } else {
			  	  include 'menu_unauthenticated.php';
			  }
			  ?>
			 
			 <div class="row sideMain">
			 	<div class="col-lg-12">
			 		<h2>Create a new account!</h2><br>
			 		<p style="font-size: 12px;">(All fields are required)</p>
				 	<form action="registerUser.php" method="post" accept-charset="UTF-8" id="newRegister">
				 		<input type="text" id="new_email" name="new_email" placeholder="Email"><br><br>
				 		<input type="text" id="new_first" name="new_first" placeholder="First Name"><br><br>
				 		<input type="text" id="new_last" name="new_last" placeholder="Last Name"><br><br>
				 		<input type="text" id="new_user" name="new_user" placeholder="Username"><br><br>
				 		<input type="password" id="new_passwd" name="new_passwd" placeholder="Password"><br><br>
				 		<input type="password" id="check_passwd" name="check_passwd" placeholder="Retype Password"><br><br>
				 		<input class="btn btn-primary" style="clear: left; width: 125px; height: 32px; font-size: 13px;" type="submit" name="signupform" value="Sign Me Up!" />
				 	</form>
				 	<br>
				 	<p>Just one click away from some sweet loot!</p>
			 	</div>
			</div>
	</div>
    </body>
</html>