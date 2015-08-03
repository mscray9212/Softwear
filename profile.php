<?php
	session_start();
	include('connection.php');
	include('utilities.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="Main.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js" type="text/javascript"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
        <script src="register.js" type="text/javascript"></script>
        <script src="script/profile.js" type="text/javascript"></script>
        <script src="script/common.js" type="text/javascript"></script>
    </head>
    <body>
    	<div class="container-fluid">
			<div class="jumbotron">
		    	<h1>Softwear</h1>
		    	<p><center>Clothing for computer scientists by computer scientists!</center></p> 
		  	</div>
		  	
		  	<?php
			  	 include 'menu_authenticated.php'; 
			?> 	
			
			<div class="row sideMenu">
			 	<div class="col-lg-12">
			 		<?php
			 			profile($_SESSION['eid']);
					?>
				</div>
			</div>
		</div>


<?php					    
    @mysql_close($conn);
?>


  <div class="clearfix"></div>

      <script type="text/javascript">
      function show_form_elements(formName){
        var elements = document.forms[formName].getElementsByTagName("input");
        for (i=0; i < elements.length; i++){
          alert("shit");
        }
      }
    </script>
  
  
</body></html>