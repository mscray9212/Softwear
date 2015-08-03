<?php
	echo '<nav class="navbar navbar-default">
  			 <div class="container-fluid">
  
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		        <ul class="nav navbar-nav">
		            <li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop by Category <span class="caret"></span></a>
		              <ul class="dropdown-menu">
		              	<li><a href="searchCategory.php?param1=All">All Products</a></li>
		                <li><a href="searchCategory.php?param1=Men">Men\'s Apparel</a></li>
		                <li><a href="searchCategory.php?param1=Women">Women\'s Apparel</a></li>
		                <li><a href="searchCategory.php?param1=Children">Children\'s Apparel</a></li>
		                <li role="separator" class="divider"></li>
		                <li><a href="searchCategory.php?param1=Accessories">Finest Programmer Accessories!</a></li>
		              </ul>
		            </li>
		        </ul>
		        <form class="navbar-form navbar-left" role="search" method="post" action="search.php">
		           <input type="text" class="form-control input-large" placeholder="Search..." name="search" id="searchBar">
		           <button type="submit" class="btn btn-default">Find It!</button>
		        </form>
		      <ul class="nav navbar-nav navbar-right"> 
		      	<li><a href="Main.php">Home  <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
		        <li><a href="#">Cart  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>  <span class="badge" id="loot">0</span></a></li>
		        <li class="dropdown">
		          <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
		          <div class="dropdown-menu" style="padding: 25px; padding-bottom: 25px;">
		              <form method="post" accept-charset="UTF-8" id="userLogin">
		                  <input id="username" style="margin-bottom: 15px;" type="text" name="username" size="30" placeholder="Username"/><br>
		                  <input id="password" style="margin-bottom: 15px;" type="password" name="password" size="30" placeholder="Password"/><br>
		                 
		                  <input class="btn btn-primary" formaction="login.php" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="signin" value="Sign In" />
		                  <li role="separator" class="divider"></li>
		                  Not a member? Sign up!<br>
		                  <input class="btn btn-primary" formaction="Register.php" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="signup" value="Sign Up" />
		              </form>
		          </div>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>';
?>