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
			  	  include 'menu_authenticated.php';
			  } else {
			  	  include 'menu_unauthenticated.php';
			  }
			?>
		  	
			 <div class="row sideMenu">
			 	<div class="col-lg-12">
			 		<?php
						require 'connection.php';
						
						$user = $_POST['new_user'];
					    $passwd = $_POST['new_passwd'];
					    $first = $_POST['new_first'];
						$email = $_POST['new_email'];
						$last = $_POST['new_last'];
						$salt = '834qu@J*';
						$token = md5($salt . $passwd);
					    
					    function Register($user, $token, $first, $last, $email) {
					        if(!empty($_POST['new_user'])){
					            $query = @mysql_query("SELECT * FROM Customers WHERE User_Name='$user'") or die(@mysql_error());
					            $row = @mysql_fetch_array($query);
					            if(!empty($row['User_Name'])){
					                echo "<h2 class='regResult'>Sorry, this username is already in use! Please retry.</h2>";
					            } else {
					                $query1 = "INSERT INTO Customers (First_Name, Last_Name, Email, User_Name, Password) VALUES ('$first', '$last', '$email', '$user', '$token')";
					                if(@mysql_query($query1)){
										$_SESSION['eid'] = $user;
										$_SESSION['loggedin'] = true;
										$_SESSION['name'] = $first;
					                    echo "<h2 class='regResult'>Sign up successful! Now go check out our loot!</h2>";
                					} else {
                   						echo "<h2 class='regResult'>Sorry, we weren't able to create your account! Please retry.</h2>";    
                					}
					             }
					        }
					    }
					    
					    if(isset($_POST['signupform'])){
					        Register($user, $token, $first, $last, $email);
					    }
					    
					    @mysql_close($conn);
					?>
			 	</div>
			 </div>
		</div>
	</body>
</html>

