<?php
	session_start();
	include('utilities.php');
  	include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Softwear</title>
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
    <p><center>Clothing for computer scientists by computer scientists!</center></p>  
  </div>
  
  <?php
	  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
	  	  include_once('menu_authenticated.php');
		  $user = $_SESSION['name'];
	  } else {
	  	  include 'menu_unauthenticated.php';
	  }
  ?>
  
<div id="clothing-carousel" class="carousel slide" data-ride="carousel" data-interval="6000" pause="hover" wrap="true">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#clothing-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#clothing-carousel" data-slide-to="1"></li>
    <li data-target="#clothing-carousel" data-slide-to="2"></li>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="byte.jpg" alt="Women's Clothing">
      <div class="carousel-caption">
          <h3>Women's Apparel</h3>
      </div>
    </div>
    <div class="item">
      <img src="style.jpg" alt="Men's Clothing">
      <div class="carousel-caption">
          <h3>Men's Apparel</h3>
      </div>
    </div>
    <div class="item">
      <img src="codebro.jpg" alt="Children's Clothing">
      <div class="carousel-caption">
          <h3>Children's Apparel</h3>
      </div>
    </div>
  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#clothing-carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#clothing-carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->  

  <div class="row">
    <div class="col-lg-4 boxes" id="men">
      <h3>Men's</h3>
    </div>
    <div class="col-lg-4 boxes" id="women">
      <h3>Women's</h3>
    </div>
    <div class="col-lg-4 boxes" id="children">
      <h3>Children</h3>        
    </div>
  </div>
</div>

</body>
</html>