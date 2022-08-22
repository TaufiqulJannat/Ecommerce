

<!DOCTYPE>

<html>
	<head>
	<title>Login Form</title>
<link rel="stylesheet" href="styles/login_style.css" media="all" />
	</head>
	<body>

<div class="login">
<h2 style="color:black; text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>
<h2 style="color:black; text-align:center;"><?php echo @$_GET['logged_out']; ?></h2>
<br>
	<h1 style="text-align:center;">Admin Login </h1>
	
	<br>
    <form method="post" >
 <h2 style=" text-align:center;"><input type="text" name="email" placeholder="Email" required="required" />
		
    <input type="password" name="password" placeholder="Password" required="required" /></h2>
		
       <br>
	   <h2 style="color:black; text-align:center;">   <button type="submit"  name="login">Login</button></h2>
    </form>
</div>
</body>
</html>


<?php

session_start();
include("includes/db.php");

if(isset($_POST['login'])){
	
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$pass = mysqli_real_escape_string($con, $_POST['password']);
	$sel_user = "select * from admins where user_email='$email' AND  user_pass='$pass'";
	$run_user = mysqli_query($con , $sel_user);
	$check_user = mysqli_num_rows($run_user);
	if($check_user==0){
		
		echo "<script>alert('Password or Email is wrong, try again!')</script>";
	}
	else{
		
		$_SESSION['user_email']=$email ;
		echo "<script>window.open('index.php?logged_in= You have Logged In successfully','_self')</script>";
		
	}
	
}
?>