<?php
	include('connection.php');

	function update_cart($user, $item, $cost) {
		$query = @mysql_query("INSERT INTO Orders (User_Name, SKU, Price) 
		VALUES ('$user', '$item', '$cost')") or die(@mysql_error());
		return_cart();

	}

	function return_cart() {
		header("Location: cart.php");
	}

    if(isset($_POST['submit'])) {
    	$result = @mysql_query("SELECT * FROM Inventory WHERE SKU = ".$_POST['chosen_product']) 
    	or die(@mysql_error());
		//Testing purposes only.
		$user = $_POST['chosen_user'];
	    while($row = @mysql_fetch_array($result)) {
     		update_cart($user, $row['SKU'], $row['Price']);
    	}

    exit();  
	}

	if(isset($_POST['remove_product'])) {
		$user = $_POST['chosen_user'];
		$sql = "DELETE FROM `Orders` WHERE `User_Name`='".$user."' AND `SKU`='".$_POST['remove_product']."'";
    	$result = @mysql_query($sql) or die(@mysql_error());
		//Testing purposes only.
    	return_cart(); 
    }

?>