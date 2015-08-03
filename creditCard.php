<?php
	session_start();
	ini_set('session.cache_limiter','public');
	session_cache_limiter(false);
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
  			<title>Bootstrap Example</title>
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
  			<br>
  			<div class="row">
  				<div class="col-lg-12">
  					<div class="creditCardTemp" style="display: block;">
  						<div class="logo"></div>
  						<div class="chip"></div>
  						<div class="ccNumber" name="ccNumber">&#x25cf;&#x25cf;&#x25cf;&#x25cf; &#x25cf;&#x25cf;&#x25cf;&#x25cf; &#x25cf;&#x25cf;&#x25cf;&#x25cf; &#x25cf;&#x25cf;&#x25cf;&#x25cf;</div>
  						<div class="fullName">Full Name</div>
  						<div class="exp">mm/yy</div>
  					</div>
  					<div class="creditCardBack" style="display: none;">
  						<div class="strip"></div>
  						<div class="box1"></div>
  						<div class="ccv">CCV</div>
  					</div>
  					<br>
  					<form action="payment.php" method="post" class="ccInput" accept-charset="UTF-8">
  						<input id="ccNumberIn" name="ccNumberIn" type="text" placeholder="Card Number"><br>
  						<input id="fullNameIn" name="fullNameIn" type="text" placeholder="Full Name"><br>
  						<input id="expIn" name="expIn" type="text" placeholder="Exp"><br>
  						<input id="ccvIn" name="ccvIn" type="text" placeholder="CCV"><br><br>
  						<h4>Shipping Address:</h4>
  						<input id="firstShip" name="firstShip" type="text" placeholder="First Name"><br>
  						<input id="lastShip" name="lastShip" type="text" placeholder="Last Name"><br>
  						<input id="addressShip" name="addressShip" type="text" placeholder="Address"><br>
  						<input id="cityShip" name="cityShip" type="text" placeholder="City"><br>
  						<input id="stateShip" name="stateShip" type="text" placeholder="State"><br>
  						<input id="zipShip" name="zipShip" type="text" placeholder="Zip Code"><br><br>
  						<h5>Is your billing address the same as your shipping address?</h5>
  						<input type="radio" name="location" value="0" id="same"/> Yes
  						<input type="radio" name="location" value="1"/> No<br><br>
  						<h4>Billing Address:</h4>
  						<input id="firstBill" name="firstBill" type="text" placeholder="First Name"><br>
  						<input id="lastBill" name="lastBill" type="text" placeholder="Last Name"><br>
  						<input id="addressBill" name="addressBill" type="text" placeholder="Address"><br>
  						<input id="cityBill" name="cityBill" type="text" placeholder="City"><br>
  						<input id="stateBill" name="stateBill" type="text" placeholder="State"><br>
  						<input id="zipBill" name="zipBill" type="text" placeholder="Zip Code"><br><br>
  						
  						
  						<br><input class="btn btn-primary" style="clear: left; width: 125px; height: 32px; font-size: 13px;" type="submit" name="submitIt.php" value="Buy It!" />
  					</form>
  				</div>
  			</div>
			
		</body>
	</html>


  
