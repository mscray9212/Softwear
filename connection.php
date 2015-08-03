<?php
	$username="b32_15989883";  
    $password="verify12";  
    $db_name="b32_15989883_Softwear"; 
    $host = "sql207.byethost32.com";  
     
    $conn = mysql_connect($host, $username, $password)or die("cannot connect"); 
    mysql_select_db($db_name)or die("cannot select DB");
?>
	