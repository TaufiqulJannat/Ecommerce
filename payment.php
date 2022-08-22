

<form action="" method="post">


<p style="text-align:center;"><img src="payment1.jpg" width="600" height="150"/></p>
<h2 align="center">Are you sure you want to buy?</h2>
  <h2 style=" text-align:center;">   <button type="submit"  name="yes" value="yes">Yes</button>
   <button type="submit"  name="no" value="no">No</button></h2>
<a href="index.php"style="color:blue">Go Back</a>

</form>
<?php
 
if(isset($_POST['yes'])){
	echo "Order Successful,";
	exit();
}
 
if(isset($_POST['no'])){
	echo "Hope you will order next time!";
	exit();
}

?>