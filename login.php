<?php
	session_start();
	include('connection.php');
	
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
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
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
				  	  include_once('menu_authenticated.php');
				  	  $user = $_SESSION['name'];
				  } else {
				  	  include 'menu_unauthenticated.php';
				  }
			?>
		  	
			 <div class="row sideMenu">
			 	<div class="col-lg-12">
			 		<?php
						require 'connection.php';
						
						$user = $_POST['username'];
					    $passwd = $_POST['password'];
						$salt = '834qu@J*';
						$token = md5($salt . $passwd);
					    
					    function Login($user, $token) {
					        if(!empty($_POST['username'])){
					            $query = @mysql_query("SELECT * FROM Customers WHERE User_Name='$user' AND Password='$token'") or die(@mysql_error());
					            $row = @mysql_fetch_array($query);
					            if(!empty($row['User_Name'])){
					            	$_SESSION['eid'] = $user;
									$_SESSION['loggedin'] = true;
									$_SESSION['name'] = $row['First_Name'];
									$_SESSION['username'] = $row['User_Name'];
					                echo "<h2 class=regResult>Glad to have you back " . $row['First_Name'] . "! Enjoy your stay!</h2>";
					            } else {
					                echo "<h2 class=regResult>Oops! Your username/password was entered incorrectly! Try again</h2><br><br>";
									echo "<h2 class=regResult>Not a member? <a href='Register.php' style='text-decoration: none';>Sign up</a> now!</h2>";
					             }
					        }
					    }
					    
					    if(isset($_POST['signin'])){
					        Login($user, $token);
					    }
					    
					    @mysql_close($conn);
					?>