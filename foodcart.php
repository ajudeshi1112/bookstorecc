
Conversation opened. 1 read message.

Skip to content
Using Gmail with screen readers
online food portal codes 
Move to Inbox More 
1 of 1
 
codes-project 
Inbox
x 

ami kotia <amikotia@gmail.com>
Attachments10/04/2017
to me 

11 Attachments
	
Click here to Reply or Forward
6.16 GB (41%) of 15 GB used
Manage
Terms - Privacy
Last account activity: 0 minutes ago
Open in 1 other location  Details
CALENDAR


<?php
include "db.php";
session_start();
$q=1;
if(!isset($_SESSION["username"])){
	header("location:index.php");
}


                               if(isset($_GET['id']) && isset($_GET['remove']) ){
	$pid = $_GET['id'];
	$username = $_SESSION["username"];
	$sql = "DELETE FROM cart WHERE user_name='$username' AND f_id='$pid'";
	$run_query = mysqli_query($con,$sql);

	if($run_query > 0)
	{
		echo '<script type="text/javascript">alert("Product is removed")</script>';
	}
}

if( isset($_GET['id']) && isset($_GET['update'])) {
	$username = $_SESSION["username"];
	$pid = $_GET['id'];
	$q = $_GET["qty"];
	$sql = "SELECT price FROM cart WHERE user_name = '$username' and f_id='$pid'";

	$run_query=mysqli_query($con,$sql);
	$row = mysqli_fetch_array($run_query);
	$price = $row['price'];
	$total = $q * $price;
	//$price = $_POST["price"];
	//$total = $_POST["total"];
	$sql = "UPDATE cart SET qty = '$q', total_amount=$total WHERE user_name = '$username' AND f_id = '$pid'";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
		echo '<script type="text/javascript">alert("Product is updated Continue Shopping....!")</script>';
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>food fiesta</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
		<script src="main.js"></script>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="customer_order.php" class="navbar-brand">food fiesta</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="slide.html"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-cutlery"></span>Menu</a></li>
			</ul>
		</div>
	</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Cart Message--> 
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Cart Checkout</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2 col-xs-2"><b>Action</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Image</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Name</b></div>
							<div class="col-md-2 col-xs-2"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Price</b></div>
							<div class="col-md-2 col-xs-2"><b>Price in Rs</b></div>
						</div>
						
						<div id="cart_checkout"></div>
							<?php	{
	$username = $_SESSION["username"];
	$sql= "SELECT * FROM cart WHERE user_name = '$username'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0){
		$no = 1;
		$total_amt=0;
		
		while($row=mysqli_fetch_array($run_query)){
			$total = $row["total_amount"];
			$price_array = array($total);
			$total_sum = array_sum($price_array);
			$total_amt = $total_amt + $total_sum;
			?>
			
			
			
			
	            
					      <div class="row">
							<div class="col-md-2">

								<form method="GET" action="cart.php">

								<div class="btn-group">
								
									<input type="submit" value="Remove" name="remove"  class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span>
								<input type="submit" value="Update" name="update"  class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span>
								<input type="hidden" name="id" value="<?php echo $row["f_id"]; ?>">
									
								</div>
							</div>
							<div class="col-md-2"><img src="product_imgs/<?php echo $row["food_image"];?>" width="60px"; height="60px";></div>
							<div class="col-md-2"><?php echo $row["food_title"];?></div>
							<div class="col-md-2"><input type="text"  name="qty" class="form-control qty" pid="<?php echo $row["f_id"];?>" id="qty-<?php echo $row["f_id"];?>" value="<?php echo $row["qty"]; ?>" ></div>
							<div class="col-md-2"><input type="text" name="price" class="form-control price" pid="<?php echo $row["f_id"];?>" id="price-<?php echo $row["f_id"];?>" value="<?php echo $row["price"];?>" disabled></div>
							<div class="col-md-2"><input type="text" name="total" class="form-control total" pid="<?php echo $row["f_id"];?>" id="total-<?php echo $row["f_id"];?>" value="<?php echo $row["total_amount"];?>" disabled></div>
						</div>
                              
					</form>

<?php
echo "<div class='row'>
							<div class='col-md-8'></div>
							<div class='col-md-4'>
							
								<b>Total $total_amt</b>
                             
							</div> 
						</div> ";
}


}
}
	
									
?>
	<form method="GET" action="payment_success">
								<b><input type="submit" value="ORDER" name="order"  class="btn btn-primary "></b></form>
						<!--<div class="row">
							<form method="GET" action="payment_success">
								<b><input type="submit" value="ORDER" name="order"  class="btn btn-primary update"></b></form>
						</div>-->
					<!--<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<form method="GET" action="cart.php">
								<b>Total $500000</b>
								<b><input type="submit" value="ORDER" name="order"  class="btn btn-primary update"></b></form>

							</div> 
						</div> -->
					</div>
					<div class="panel-footer"></div>

					
				</div>
			</div>
			<div class="col-md-2"></div>
			
		</div>
</body>	
</html>
<script>
$(document).ready(function(){
$("body").delegate(".qty","keyup",function(){
	var pid = $(this).attr("pid");
	
	var qty = $("#qty-"+pid).val();
	var price = $("#price-"+pid).val();
	var total = qty * price;
	$("#total-"+pid).val(total);
});
$("body").delegate(".remove","click",function(event){
	event.preventDefault();
	var pid = $(this).attr("remove_id");
	alert(pid);
})
/*$("body").delegate(".update","click",function(event){
	event.preventDefault();
	var pid = $(this).attr("update_id");
	var qty = $("#qty-"+pid).val();
	var price = $("#price-"+pid).val();
	var total = $("#total-"+pid).val();
		alert(pid);
});
});*/
</script>
cart.php
Displaying cart.php.