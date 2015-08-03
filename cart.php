<?php
	session_start();
	include_once('utilities.php');
	include('connection.php');
	$keyword = fetch_get_var('search');
	$page_title = "Results for $keyword";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php $page_title ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Main.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js" type="text/javascript"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="jumbotron">
    <h1>Softwear</h1>
    <p><center>Clothing for computer scientists by computer scientists!</center></p> 
  </div>
  
<?php
	  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
	  	  include 'menu_authenticated.php';
          $user = $_SESSION['eid'];
	  } else {
	  	  include 'menu_unauthenticated.php';
	  }
		    echo "Cart Items for:&nbsp;".$user."<br>";
		    echo 	'<!--left side start here-->
        
        			<section>
            		<div class="container">
                	<div class="row">
                	<div class="left_div">
                	<div class="clearfix"></div>
                	<div class="left_product_area">';
		    		return_cart($user);
		    echo '</div></div>
		    		<!--left side end here-->';
?>
		
		
    <!--right side start here-->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 right_div">
            <div class="right_product_area" id="cart_sponsor">
                <div class="right_sponsor_area" max-height="86">
                    <img src="cart.png" alt="Klematis" width="110" height="150">
                    <ul>
                        <li><h3>Cart total:&nbsp; <b>$<?php echo cart_total($user); ?></b></h3>
                            <form method="post" action="creditCard.php" name="checkout">
                                <h4 class="cart_price">
                                    <button class="btn_cus" type="submit">Checkout</button>
                                </h4>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right_product_area">
                <div class="right_product_area_product_cart_faq">
                    <div class="right_product_area_product_cart_inner_faq">
                    	<center><img alt="" src="faq.jpg"></center>
                        <div class="right_product_area_product_cart_inner_faq_text">
                            <h1><center>Need Assistance?</center></h1>

                            <h2><center>Contact Us.</center></h2>

                            <h3>1-800-NUM-FAKE</h3>

                        </div>

                        <div class="clearfix"></div>
                        <hr>
                        <span><center>OR</center></span>
                        <hr>

                        <div class="clearfix"></div>

                        <p class="text-center">Send us an email <a href="mailto:softwear.helpdesk@gmail.com">here</a></p>
                    </div>
                </div>
            </div>

                <h4 class="sponsor">Just getting started? Here are some helpful resources.</h4>

                <div class="right_product_area">
                    <div class="right_sponsor_area">
                        <ul>
                            <li>
                                <a href="http://www.codecademy.com/" target="_blank"><img alt="" src="codecademy.png"></a>

                                <p>Learn to code interactively.</p>
                            </li>

                            <li>
                                <a href="https://www.khanacademy.org/computer/computer-programming" target="_blank"><img alt="" src="khan.png"></a>

                                <p>A free, world-class education for anyone, anywhere.</p>
                            </li>

                            <li>
                                <a href="https://www.udacity.com" target="_blank"><img alt="" src="udacity.png"></a>

                                <p>Learn. Think. Do.</p>
                            </li>

                            <li>
                                <a href="https://www.codeschool.com"><img src="codeschool.png"></a>

                                <p>Learn by doing. No setup. No hassle. Just learning.</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix"></div>
                <!--                        <div class="ad_area">
                                            </div>-->
          	</div>
        </div>
    </div>
	</section>
		<!--right side end here-->

</body>
</html>