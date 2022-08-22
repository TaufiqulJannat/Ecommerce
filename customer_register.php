
<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
include("includes/db.php");



?>
<html>
	<head>
		<title>My Online Shop</title>
		<link rel="stylesheet" href="styles/style.css" media="all" />
		<script>
function nam()
{
  var nam=/^[a-zA-Z]{4,15}$/;
   if(document.f1.c_name.value.search(nam)==-1)
    {
	 alert("enter correct  first name");
	 document.f1.c_name.focus();
	 return false;
	 }
	} 
	 

function email()
{
 var email=/^[a-zA-Z0-9-_\.]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
   if(document.f1.c_email.value.search(email)==-1)
    {
	 alert("enter correct email");
	 document.f1.c_email.focus();
	 return false;
	 }
	} 
	
	function pass()
	{
	var pass=/^[a-zA-Z0-9-_]{6,16}$/;
   if(document.f1.c_pass.value.search(pass)==-1)
    {
	 alert("enter correct pass");
	 document.f1.c_pass.focus();
	 return false;
	 }
	 }
	  function city()
	 {
	 var city=/^[a-zA-Z]{5,30}$/;
	 if(document.f1.c_city.value.search(city)==-1)
    {
	 alert("enter correct city");
	 document.f1.c_city.focus();
	 return false;
	 }
	
	 }
	function phone()
	{
	var phn=/^[0-9]{9,14}$/;
  if(document.f1.c_contact.value.search(phn)==-1)
    {
	 alert("enter correct phone no");
	 document.f1.c_contact.focus();
	 return false;
	 }
	 }
	

	 
	 function address()
	 {
	 var add=/^[a-zA-Z]{5,30}$/;
	 if(document.f1.c_address.value.search(city)==-1)
    {
	 alert("enter correct city");
	 document.f1.c_address.focus();
	 return false;
	 }
	
	 }
	
function vali()
{     var nam=/^[a-zA-Z]{4,15}$/;
  
      var email=/^[a-zA-Z0-9-_\.]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
       var pass=/^[a-zA-Z0-9-_]{6,16}$/;
	     var city=/^[a-zA-Z]{5,30}$/;
	 	var phn=/^[0-9]{9,14}$/;
	  var add=/^[a-zA-Z0-9 ]{10,150}$/;
	
	  
   if(document.f1.c_name.value.search(nam)==-1)
    {
	 alert("enter correct  name");
	 document.f1.c_name.focus();
	 return false;
	 }
	 	 
 
  else if(document.f1.c_email.value.search(email)==-1)
    {
	 alert("enter correct login name");
	 document.f1.c_email.focus();
	 return false;
	 }
	 
	
	
   else if(document.f1.c_pass.value.search(pass)==-1)
    {
	 alert("enter correct pass");
	 document.f1.c_pass.focus();
	 return false;
	 }
	 
	
	  else if(document.f1.c_contact.value.search(phn)==-1)
    {
	 alert("enter correct phone no");
	 document.f1.c_contact.focus();
	 return false;
	 }
	 
	
  else if(document.f1.c_address.value.search(add)==-1)
    {
	 alert("enter correct address");
	 document.f1.c_address.focus();
	 return false;
	 }
	
	 
	 
	 
	else if(document.f1.c_city.value.search(city)==-1)
    {
	 alert("enter correct city");
	 document.f1.c_city.focus();
	 return false;
	 }

	
	 
</script> 
	</head>
	<body>
	
	<!--Main CONTAINER STARTS HERE-->
	<div class="main_wrapper">
		<!--HEADER STARTS HERE-->
		<div class="header_wrapper">
		
		<a href="index.php"><img src="images/front.jpg" /> </a>
			
			
		
		</div>
			<!--HEADER ENDS HERE-->  
			
				<!--NAVAGATION STARTS HERE-->
		<div class="menubar">   
		
			<ul id="menu">
			    <li><a href="index.php">Home</a></li>
			    <li><a href="all_products.php">All Products</a></li>
			    <li><a href="my_account.php">My Account</a></li>
				<li><a href="customer_register.php">Sign up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
			    <li><a href="contact.php">Contact Us</a></li>
			
			
			</ul>
			
			<div id="form">
				<form method="get" action="result.php"enctype="multipart/form-data">
			       <input type="text" name="user_query" placeholder="Search a Product" /> 
				   <input type="submit" name="search" value="Search" />

                    <a href="index.php"style="color:blue">Go Back</a>



			     </form>
			</div>
		</div>
		
				<!--NAVAGATION ENDS HERE-->
				
				
				<!--CONTENT WRAPPER  STARTS HERE-->

		<div class="content_wrapper">
		
			<div id="sidebar">
			
				<div id="sidebar_title">Categories</div>
			
			  <ul id="cats">
				<?php getCats(); ?>
				
			  </ul>
			  
			  <div id="sidebar_title">Brands</div>
			
			  <ul id="cats">
				<?php getBrands();  ?>
			  </ul>
			
			</div>
			<div id="content_area">
			<?php cart(); ?>
				<div id="shopping_cart">
					<span style= "float:right; font-size:18px;padding:5px;line-height:40px;">  
					
					Welcome Guest! <b style="color:yellow">Shopping Cart - </b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a href="cart.php"style="color:yellow">Go TO Cart</a>
					
					
					
					</span>
				
				</div>
								
				<?php
// define variables and set to empty values
$nameErr = $emailErr = $passErr = $cityErr = $contactErr = $addressErr="";
$c_name = $c_email = $c_pass = $c_city = $c_contact = $c_address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["c_name"])) {
    $nameErr = "Name is required";
  } else {
    $c_name = test_input($_POST["c_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$c_name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["c_email"])) {
    $emailErr = "Email is required";
  } else {
    $c_email = test_input($_POST["c_email"]);
    // check if e-mail address is well-formed
    if (!filter_var($c_email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
   if (empty($_POST["c_pass"])) {
    $passErr = "Password is required";
  } else {
    $c_pass = test_input($_POST["c_pass"]);
  }
}

    
   if (empty($_POST["c_city"])) {
    $cityErr = "City is required";
  } else {
    $c_city = test_input($_POST["c_city"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$c_city)) {
      $cityErr = "Only letters and white space allowed";
    }
  }
 if (empty($_POST["c_address"])) {
    $addressErr = "Address is required";
  } else {
    $c_address = test_input($_POST["c_address"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$c_address)) {
      $addressErr = "Only letters and white space allowed";
    }
  }
   if (empty($_POST["c_contact"])) {
    $contactErr = "Number is required";
  } else {
    $c_contact = test_input($_POST["c_contact"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9 ]/",$c_contact)) {
      $contactErr = "Only numbers are allowed";
    }
  }
  
 

?>
					
				<form  name="f1" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" onSubmit="return vali()">
			<!--	<form action="customer_register.php" method="post" enctype="multipart/form-data">-->
					<table align="center" width="750">
					
					<tr align="center">
					<td colspan="6"><h2>Create an Account</h2></td>
					</tr>
					
					<tr>
						<td align="right">Customer Name:</td>
						<td><input type="text" name="c_name" value="<?php echo $c_name;?>"  required/></td>
					
					</tr>
				
					<tr>
						<td align="right">Customer Email:</td>
						<td><input type="text" name="c_email" value="<?php echo $c_email;?>" required/></td>
					
					</tr>
				
					<tr>
						<td align="right">Customer Password:</td>
						<td><input type="password" name="c_pass" value="<?php echo $c_pass;?>" required /></td>
					
					</tr>
					
					<tr>
						<td align="right">Customer Image:</td>
						<td><input type="file" name="c_image"  /></td>
					
					</tr>
				<tr>
						<td align="right">Customer Country:</td>
						<td>
						<select name="c_country">
						<option>Select a Country</option>
						<option>Bangladesh</option>
						<option>Malaysia</option>
						<option>India</option>
						<option>Nepal</option>
						<option>Pakistan</option>
						
						</select>
						</td>
					
					</tr>
				
				<tr>
						<td align="right">Customer City:</td>
						<td><input type="text" name="c_city" value="<?php echo $c_city;?>" /></td>
					
					</tr>
					
						<tr>
						<td align="right">Customer Contact:</td>
						<td><input type="text" name="c_contact" value="<?php echo $c_contact;?>" required/></td>
					
					</tr>
					
						<tr>
						<td align="right">Customer Address:</td>
						<td><input type="text" name="c_address" value="<?php echo $c_address;?>" required /></td>
					
					</tr>
					
					<tr align="center">
						<td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
					</tr>
					
					
					</table>
				
				</form>
	
				
			
			</div>
		</div>
		
				<!--CONTENT WRAPPER ENDS HERE-->
		<div id="footer">
		
		<h2 style="text-align:center;padding-top:30px;">&copy; 2018.by Developer Taufiul Jannat, Sigmaa Ferdous & Sumaya Islam</h2>
		
		
		
		</div>

	
	</div>
	
	
	
		<!--Main CONTAINER ENDS HERE-->
	
	
	
	</body>
	
</html>


<?php 
$nameErr = $emailErr = $passErr = $cityErr = $contactErr = $addressErr="";
$c_name = $c_email = $c_pass = $c_city = $c_contact = $c_address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["c_name"])) {
    $nameErr = "Name is required";
  } else {
    $c_name = test_input($_POST["c_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$c_name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["c_email"])) {
    $emailErr = "Email is required";
  } else {
    $c_email = test_input($_POST["c_email"]);
    // check if e-mail address is well-formed
    if (!filter_var($c_email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
   if (empty($_POST["c_pass"])) {
    $passErr = "Password is required";
  } else {
    $c_pass = test_input($_POST["c_pass"]);
  }
}

    
   if (empty($_POST["c_city"])) {
    $cityErr = "City is required";
  } else {
    $c_city = test_input($_POST["c_city"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$c_city)) {
      $cityErr = "Only letters and white space allowed";
    }
  }
 if (empty($_POST["c_address"])) {
    $addressErr = "Address is required";
  } else {
    $c_address = test_input($_POST["c_address"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$c_address)) {
      $addressErr = "Only letters and white space allowed";
    }
  }
   if (empty($_POST["c_contact"])) {
    $contactErr = "Number is required";
  } else {
    $c_contact = test_input($_POST["c_contact"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9 ]/",$c_contact)) {
      $contactErr = "Only numbers are allowed";
    }
  }
  
 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if(isset($_POST['register'])){
	
	$ip = getIp();
	$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_pass = $_POST['c_pass'];
$c_image = $_FILES['c_image']['name'];
$c_image_tmp = $_FILES['c_image']['tmp_name'];
	$c_country = $_POST['c_country'];
	$c_city = $_POST['c_city'];
	$c_contact= $_POST['c_contact'];
		$c_address= $_POST['c_address'];
		
		move_uploaded_file($c_image_tmp,"customer_images/$c_image");
		$insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name ','$c_email ','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
		
		$run_c = mysqli_query($con, $insert_c);
		// if($run_c){
		//	 echo "<script>alert('registration succressful!')</script>";
		 //}
		 $sel_cart = "select * from cart where ip_add='$ip'";
		 $run_cart = mysqli_query($con, $sel_cart);
		 $check_cart = mysqli_num_rows($run_cart);
		 
		 if($check_cart==0){
			 $_SESSION['customer_email']=$c_email;
			 echo "<script>alert('Account successfully created thanks!')</script>";
			 echo "<script>window.open('my_account.php','_self')</script>";
		 }
		 else{
			  $_SESSION['customer_email']=$c_email;
			 echo "<script>alert('Account successfully created!')</script>";
			 echo "<script>window.open('checkout.php','_self')</script>";
			 
		 }
	    
}



?>