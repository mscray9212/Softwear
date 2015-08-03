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
			 		<h2 class="regResult">You must be logged in to add to cart!!</h2>	
				</div>
			</div>	
				
		<?php		
			@mysql_close($conn);
		?>