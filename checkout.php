<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");



?>
<html>
	<head>
		<title>My Online Shop</title>
		<link rel="stylesheet" href="styles/style.css" media="all" />
		
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
					
			<?php
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>"."<b style='color:yellow;'>Your</b>" ;
						
					}
					else{
						echo "<b>Welcome Guest:</b>";
					}
					
					?>
					




			<b style="color:yellow">Shoping Cart - </b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a href="cart.php"style="color:yellow">Go TO Cart</a>
					
					
					
					</span>
				
				</div>
				

			
				<div id = "products_box">
				<?php
				
				if(!isset($_SESSION['customer_email'])){
					include("customer_login.php");
				}
				else{
					include("payment.php");
				}
				
				
				?>
				
				</div>
			
			</div>
		</div>
		
				<!--CONTENT WRAPPER ENDS HERE-->
		<div id="footer">
		
		<h2 style="text-align:center;padding-top:30px;">&copy; 2016 by www.MyOnlineShop.com</h2>
		
		
		
		</div>

	
	</div>
	
	
	
		<!--Main CONTAINER ENDS HERE-->
	
	
	
	</body>
	
</html>