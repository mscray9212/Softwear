<?php
	function fetch_post_var($key) {
		if(isset($_POST[$key])){
			$value = trim(@mysql_escape_string($_POST[$key]));
			return $value == '' ? null : $value;
		}
	}

	function fetch_get_var($key) {
		if(isset($_GET[$key])){
			$value = trim(@mysql_escape_string($_GET[$key]));
			return $value == '' ? null : $value;
		}
	}

	function return_products($key) {
		$sql = "SELECT * FROM Inventory WHERE Name LIKE '%$key%' OR Description LIKE '%$key%' OR Department LIKE '$key%'";
		//Testing purposes only.
		//echo $sql;
		$result = @mysql_query($sql);
	    while($row = @mysql_fetch_array($result)) {
	    	echo '
                       		<ul>
								<li>'.
			                     	'<img src="graphics/'.$row['Image'].'" height="170" width="130">
			                         <div class="big_pro_right">
	                                       <h5>'.$row['Name'].'</h5>
	                                       <h4 class="price"><b>Cost: </b>$'.$row['Price'].'</h4>
	                                       <div class="clearfix"></div>
	                                       <h2><b>Description:</b></h2>
	                                       <p class="listing_description">'.$row['Description'].'</p>
	                                       <div class="left_pro_footer">
		                                       <h5>'.$row['Department'].'</h5>
		                                        <form method="get" action="details.php" name="ProductDetails">
		                                        <input type="hidden"  value="'.$row['SKU'].'" name="chosen_product">
		                                       		<h4 class="price">		                                       		
		                                      			<button class="btn_cus" type="submit">View Product</button></h4>
		                                       </form>		                                    
	                                     	</div>
	                                    </div>                                    
		                           </li>
                           </ul>
                           <div class="clearfix"></div>
	    	';
		}
	}

	function return_department($key) {
		if($key === "All"){
			$sql = "SELECT * FROM Inventory";
		} else {
			$sql = "SELECT * FROM Inventory WHERE Department='$key'";
		}
		//Testing purposes only.
		//echo $sql;
		$result = @mysql_query($sql);
	    while($row = @mysql_fetch_array($result)) {
	    	echo '
                       		<ul>
								<li>'.
			                     	'<img src="graphics/'.$row['Image'].'" height="170" width="130">
			                         <div class="big_pro_right">
	                                       <h5>'.$row['Name'].'</h5>
	                                       <h4 class="price"><b>Cost: </b>$'.$row['Price'].'</h4>
	                                       <div class="clearfix"></div>
	                                       <h2><b>Description:</b></h2>
	                                       <p class="listing_description">'.$row['Description'].'</p>
	                                       <div class="left_pro_footer">
		                                       <h5>'.$row['Department'].'</h5>
		                                        <form method="get" action="details.php" name="ProductDetails">
		                                        <input type="hidden"  value="'.$row['SKU'].'" name="chosen_product">
		                                       		<h4 class="price">		                                       		
		                                      			<button class="btn_cus" type="submit">View Product</button></h4>
		                                       </form>		                                    
	                                     	</div>
	                                    </div>                                    
		                           </li>
                           </ul>
                           <div class="clearfix"></div>
	    	';
		}
	}

	function profile($user) {
		$sql = "SELECT * FROM Customers WHERE User_Name='$user'";
		$result = @mysql_query($sql);
		while($row = @mysql_fetch_array($result)) {
			echo '

    <div class="container">
      <section>
        <div class="container">
          <div class="cat_header">
            <h2 class="fw_three">
              <span>Profile Information</span>
            </h2>
          </div>
        </div>
      </section>
      <section>
        <div class="sign_up_form_container container">
        <form class="edit_profile_information" method="post"  action="updateAccount.php" name="UpdateAccount">
          
            <p class="hidden feedback"></p>
            <div class="des_title">
              <p class="heading_form float_left">
                Account Information
              </p>
              <a id="information_edit_link"  href="#" onclick="edit_account_Information();" class="supplemental_link float_left">Edit</a>
            </div>
            <div class="clearfix"></div>
            <div class="form_row">
              <div class="first_name form_column float_left required">
                <p class="form_label">
                  First Name: <span>*</span>
                </p><input id="01" class="profile mid_size" name="first_name" type="text" disabled value="'.$row['First_Name'].'.">
             
              </div>
              <div class="last_name form_column float_left required">
                <p class="form_label">
                  Last Name: <span>*</span>
                </p><input id="02" class="profile mid_size" name="last_name" type="text" disabled value="'.$row['Last_Name'].'" >
              </div>
              <div class="clearfix"></div>
        
              <div class="last_name form_column float_left required">
                <p class="form_label">
                  Username: <span>*</span>
                </p><input id="03" class="profile mid_size" name="user_name" type="text" disabled value="'.$row['User_Name'].'" >
              </div>
              <div class="clearfix"></div>
         
              <div class="last_name form_column float_left required">
                <p class="form_label">
                  Email: <span>*</span>
                </p><input id="04" class="profile mid_size" name="email_address" type="text" disabled value="'.$row['Email'].'" >
             
              <div class="clearfix"></div>
            </div>

            <div id="account_information_submit" class="form_row button_row float_right hidden">
              <div class="form_column">
                  <a class="cancel_btn" href="profile.php">Cancel</a>
                  <input class="primary_btn" type="submit" value="Save">
              </div>
            </div>
            <div class="clearfix"></div>
        </form>
        </div>
      </section>
    </div>
			';
		}
	}
	

	function return_product($pro) {
		$sql = "SELECT * FROM Inventory WHERE SKU = '$pro' ORDER BY Price";
		//Testing purposes only.
		//echo $sql;
		$result = @mysql_query($sql);
	    while($row = @mysql_fetch_array($result)) {
	    	if(isset($_SESSION['eid'])){
		    	echo '
	
	                            <img src="graphics/'.$row['Image'].'" alt="">
	                                  
	                                </div>
	                                <div class="slider_div_right">
	                                <select class="selection">
	                                	<option value="0">Small</option>
	                                	<option value="1">Medium</option>
	                                	<option value="2">Large</option>
	                                	<option value="3">X Large</option>
	                                </select>
	                                <select class="selection">
	                                	<option value="1">1</option>
	                                	<option value="2">2</option>
	                                	<option value="3">3</option>
	                                	<option value="4">4</option>
	                                	<option value="5">5</option>
	                                </select>
	                                    <form method="post" action="updateCart.php" name="AddToCart">
										<input type="hidden" value='.$row['SKU'].' name="chosen_product">
										<input type="hidden" value='.$_SESSION['eid'].' name="chosen_user">
	                                    <input type ="submit" class="btn btn-success_product" 
	                                    value="Add to Cart" name="submit"/>
	                                    </form>
	                                    <h5>Price: <b>$'.$row['Price'].'</b></h5>
	                                    <p>Department: '.$row['Department'].'</p>
	                                <h4>Item: '.$row['Name'].'</h4>
	                                </div>
	                               	<div class="clearfix"></div>
	                                <div class="product_description des_title">
	                                    <p class="heading_wibr">Description</p>
	                                    <p>'.$row['Description'].'</p>
	                                </div>';
			}
			
			else {
				echo '
	
	                            <img src="graphics/'.$row['Image'].'" alt="">
	                                  
	                                </div>
	                                <div class="slider_div_right">
	                                    <h4>Item: '.$row['Name'].'</h4>
	                                    <form method="post" action="unloggedCart.php" name="AddToCart">
										<input type="hidden" value='.$row['SKU'].' name="chosen_product">
	                                    <input type ="submit" class="btn btn-success_product" 
	                                    value="Add to Cart" name="submit"/>
	                                    </form>
	                                    <h5>Price: <b>$'.$row['Price'].'</b></h5>
	                                    <p>Department: '.$row['Department'].' </p>
	                                </div>
	                                <input type="radio" name="sizes" value="0">Small
	                                <input type="radio" name="sizes" value="1">Medium
	                                <input type="radio" name="sizes" value="2">Large
	                                <input type="radio" name="sizes" value="3">X Large
	                               	<div class="clearfix"></div>
	                                <div class="product_description des_title">
	                                    <p class="heading_wibr">Description</p>
	                                    <p>'.$row['Description'].'</p>
	                                </div>';
			}
		}
	}

	function return_cart($userName) {
		$sql = "SELECT * FROM Inventory ORDER BY SKU";
		//Testing purposes only.
		//echo $sql;
		$result = @mysql_query($sql);
		$sql1 = "SELECT * FROM Orders ORDER BY SKU";
		$result1 = @mysql_query($sql1);
		$i = @mysql_num_rows(@mysql_query("SELECT * FROM Orders"));
		//echo $i."<br>";
		$index = 0;
		$tableInfo = array();
	    while($row1 = @mysql_fetch_array($result1)) {
	    	$tableInfo[$index] = $row1;
	    	$index++;
	    }
	    /* TESTING PURPOSES ONLY!
	    for($j = 0; $j < $i; $j++){
	    	echo $tableInfo[$j]['SKU']." ";
	    	echo $tableInfo[$j]['User_Name']."<br>";
	    }
	    */
	    $empty = 0;
	    while($row = @mysql_fetch_array($result)) {
	    	for($j = 0; $j < $i; $j++) {
	    		if(($userName == $tableInfo[$j]['User_Name']) && ($row['SKU'] == $tableInfo[$j]['SKU'])) {
	    			$empty=1;
	    				echo '
                       		<ul>
								<li>'.
			                     	'<img src="graphics/'.$row['Image'].'" height="170" width="130">
			                         <div class="big_pro_right">
	                                       <h5>'.$row['Name'].'</h5>
	                                       <h4 class="price"><b>Cost: </b>$'.$row['Price'].'</h4>
	                                       <div class="clearfix"></div>
	                                       <h5>'.$row['Department'].'</h5>
	                                       <div class="clearfix"></div>
	                                       <div class="left_pro_footer">
		                                        <form method="post" action="updateCart.php" name="ProductDetails">
		                                        <input type="hidden"  value="'.$row['SKU'].'" name="remove_product">
		                                        <input type="hidden" value='.$_SESSION['eid'].' name="chosen_user">
		                                       		<h4 class="price">
		                                      			<button class="btn_cust" type="submit">Remove Product</button></h4>
		                                       </form>
	                                     	<h2><b>Description:</b></h2>
	                                       <p class="listing_description">'.$row['Description'].'</p>
	                                       </div>
	                                    </div>                                    
		                           </li>
                           </ul>
	    			';
	    		}
	    	}
	    	if ($empty == 0){
	    		echo "<h3><center>Your Cart is Empty!</center></h3>";
	    		return;
	    	}
	    }
	}


function remove_cart($item) {
	$sql = "DELETE FROM Orders WHERE SKU = '$item'";
	$result = @mysql_query($sql);
}

function update_listings($user, $item, $price) {
	$sql = "INSERT INTO Orders (User_Name, SKU, Price) 
			VALUES ('$user', '$item', '$price')";
	$result = @mysql_query($sql);
	$sql1 = "DELETE FROM Inventory WHERE SKU = '$item'";
	$result1 = @mysql($sql1);
}

function cart_total($user) {
	$sql = "SELECT * FROM Orders";
	$result = @mysql_query($sql);
	$i = 0;
	while($row = @mysql_fetch_array($result)) {
		if($row['User_Name'] == $user){
				$i += $row['Price'];
			}
		}
		return $i;
}






?>

