<?php
	session_start();
	include_once('utilities.php');
	include('connection.php');
	$keyword = fetch_get_var('search');
	$page_title = "Results for $keyword";

    function add_product($sku, $name, $dep, $cost, $desc, $img, $amount) {
        $sql = "INSERT INTO Inventory (SKU, Name, Department, Price, Description, Image, Quantity) VALUES ('$sku', '$name', '$dep', '$cost', '$desc', '$img', '$amount')";
        if(@mysql_query($sql)) {
            return;
        }
        else {
            echo $sql."<br>";
            echo "Product has not been added, please try again!<br>";
        }
    }

    function add_image($skus, $names, $depart, $costs, $descr, $imag, $amounts) {
        $target_dir = "graphics/";
        $target_file = $target_dir . basename($_FILES["file_img"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["file_img"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["file_img"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file_img"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["file_img"]["name"]). " has been uploaded.";
                add_product($skus, $names, $depart, $costs, $descr, $imag, $amounts);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    function add_images($imgName) {

        $filetmp = $_FILES["file_img"]["tmp_name"];
        $filename = $_FILES["file_img"]["name"];
        $filetype = $_FILES["file_img"]["type"];
        $filepath = "graphics/".$imgName;

        move_uploaded_file($filetmp, $filepath);


        $dir = "graphics/";
        $lfile = fopen($dir . basename($imgName), "w");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $imgName);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)');
        curl_setopt($ch, CURLOPT_FILE, $lfile);

        fclose($lfile);
        curl_close($ch);
    }

    if(!empty($_POST['addProduct'])) {
        $skus = $_POST['sku'];
        $names = $_POST['pro_name'];
        $depart = $_POST['department'];
        $costs = $_POST['price'].".".$_POST['price_cents'];
        $descr = fetch_post_var('pro_descr');
        $amounts = $_POST['quantity'];
        $imag = "";
        if(!empty($_FILES['file_img'])) {
            $imag = $_FILES["file_img"]["name"];
        }
        add_image($skus, $names, $depart, $costs, $descr, $imag, $amounts);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Main.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js" type="text/javascript"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="script/common.js"></script>
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
?>

 </section><!--left side start here-->

    <section>
        <div class="container">
            <div class="row">
                <div class="left_div_container">
                    <div class="left_div_product_container">
                        <div class=" left_div_product_inner_top">
                            <div class=" left_div_small_inner border">
                                <div class="contact_form_container">
                                
                                    <form   class="add_product" id="add_product_form"
                                            onsubmit="return validate_add_product_form();"
                                            method="post" action="admin.php"  enctype="multipart/form-data" name="AddProduct">
                                           
                                        <p class="bg-danger feedback hidden" id="feedback"><i class="fa fa-exclamation-triangle fa-3x float_left"></i> Whoops! Something went wrong...<br>Make sure that all required fields are not blank.</p>

                                        <div class="des_title">
                                            <p class="heading_wibr1">Product Details</p>
                                        </div>
                                        <div class="form_row">
                                        
                                            <div class="category form_column float_left required">
                                                <p class="form_label">Category:<span>*</span></p>
                                                <select class="category" name="department" id="product_category">
                                                    <option value="" >
                                                        -- Select Department --
                                                    </option>
                                                    <option value="Men">
                                                        Men's Apparel
                                                    </option>
                                                    <option value="Women">
                                                        Women's Apparel 
                                                    </option>
                                                    <option value="Children">
                                                        Children's Apparel 
                                                    </option>
                                                    <option value="Accessories">
                                                        Accessories
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="product_price  form_column float_left required" id="product_price_column">
                                                <p class="form_label">
                                                Quantity:<span>*</span></p>
                                                <input class="sml_size" type="number" maxlength="6" name="quantity" id="product_quantity">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form_row" id="product_main">
                                            <div class=
                                            "product_name form_column float_left required">
                                                <p class="form_label">
                                                Product Name:<span>*</span></p>
                                                <input id="product_name" class="mid_size" name="pro_name" type="text">
                                            </div>

                                            <div class="product_price  form_column float_left required" id="product_price_column">
                                                <p class="form_label">
                                                Price ($):<span>*</span></p>
                                                <input class="sml_size" type="text" maxlength="6" name="price" id="product_price"> .
                                                <input class="xsmall_size" type="text" maxlength="2" name="price_cents" id="product_price_cent">
                                            </div>
                                            <div class=
                                            "product_name form_column float_left required">
                                                <p class="form_label">
                                                SKU:<span>*</span></p>
                                                <input id="sku" class="mid_size" name="sku" type="text">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <!--This should remain hidden within the page unless category equal book-->
                                        <div class="des_title book_details hidden">
                                            <p id="product_additional_information" class="heading_wibr">Additional Information</p>
                                        </div>
                                        <div class="form_row">
                                            <div class="form_column book_details float_left hidden">
                                                <p class="form_label">Publisher:</p><input class="mid_size" name="publisher"
                                                type="text">
                                            </div>
                                            <div class="form_column book_details float_left hidden">
                                                <p class="form_label">Language:</p><input class="mid_size" name="language"
                                                type="text">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form_row">
                                            <div class="form_column book_details float_left hidden">
                                                <p class="form_label">ISBN-10:</p><input class="mid_size" name="ISBN_10"
                                                type="text">
                                            </div>
                                            <div class="form_column book_details float_left hidden">
                                                <p class="form_label">ISBN-13:</p><input class="mid_size" name="ISBN_13"
                                                type="text">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form_row">
                                            <div class="form_column hidden">
                                                <p class="form_label">Page Number:</p><input class="sml_size" name="page_numbers"
                                                type="text" maxlength="5">
                                            </div>
                                        </div>
                                        <!--Hidden Seaction Ends Here-->


                                        <div class="des_title">
                                            <p class="heading_wibr">Product Description <span id="product_description_hint">(Required)</span></p>
                                        </div>

                                        <div class="form_row">
                                            <div class="message">
                                                <textarea id="product_description" class="message_area full_width" cols="50"rows="4" name="pro_descr" maxlength="500"></textarea>
                                            </div>
                                            <div class="counter">
                                                <p id="charNum" class="float_right">500 characters left</p>
                                            </div>
                                        </div>
               
                                        <div class="clearfix"></div>

                                        <div class="des_title">
                                            <p class="heading_wibr">Product Images</p>
                                        </div>
                                        <div class="form_row">
                                            <div class="form_column">
                                                <p class="form_label">Primary Image:</p>
                                                <div class="image_upload">
                                                    <input class="input_image_upload" type="file" name="file_img" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form_row button_row float_right">
                                            <div class="form_column_btn">
                                              <a class="cancel_btn" href="#">Cancel</a>
                                              <input class="primary_btn" type="submit" name="addProduct" value="Add Product">
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>                                   
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="disclaimer">
                        <p class="disclaimer">By clicking on "Add Product" you are affirming that you are an admin user for this site.</p> 
                    </div> 
                </div><!--left side end here-->
		
		
    <!--right side start here-->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 right_div">
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