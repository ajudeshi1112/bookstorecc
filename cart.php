<?php
	session_start();
	mysqli_report(MYSQLI_REPORT_ALL);
?>	
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="HandheldFriendly" content="true">
<link href="cartstyle.css" type="text/css" rel="stylesheet">
<link href="commonstyle.css" type="text/css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
		<table id="navtable">
			<tr>
				<td><cite>BookShelf</cite></td>			
				<td><img id="openbook" src="openbook.png"></td>
				<td><a href="regcss.php">Create an account</a> | <a href="logcss.php">SignIn</a> | <a href="profilecss.php">View Profile</a> | <a href="cart.php">Go to Cart</a>| <a href="logout.php">Logout</a></td>

			</tr>
		</table>
			

<input type="button" onclick="location.href='catalogcss.php'" value="back">
<center>
<table class="table1">
<tr bgcolor="#E9F7EF">
<th style="width:10%;">Product</th>
<th style="width:50%;"><cite>Product Description</cite></th>
<th style="width:3%;">Quantity</th>
<th style="width:15%;">Price</th>
<th style="width:15%;">Total</th>
<th style="width:7%; ">Remove</th>

</tr>

<?php	
	require 'connection.php';
	if(!isset($_SESSION["username"]))
		header("Location: http://localhost/bookwork/emptycart.php");
	
	$getid="SELECT Book_id, Quantity FROM Cart where Username = ?";
	if($stmt=$conn->prepare($getid)){
		if($stmt->bind_param("s",$_SESSION["username"])){
			if($stmt->execute()){
				if($stmt->bind_result($id,$qty)){
					$rows=0;
					$idarray=array();
					$qtyarray=array();
					$i=0;	
						while($stmt->fetch()){
							$rows=1;
							$idarray[$i]=$id;
							$qtyarray[$i++]=$qty;
						}
						if($rows==0){
							header("Location: http://localhost/bookwork/emptycart.php");
						
						}
				}		
			}
		}
		$stmt->close();
	}	
		
	$getdetails="SELECT * FROM Books WHERE Book_id = ? ";
	$details=array();
	
	if($stmt2=$conn->prepare($getdetails)){
		for($i=0;$i<sizeof($idarray);$i++){
			if($stmt2->bind_param("i",$idarray[$i])){
				if($stmt2->execute()){
					if($stmt2->bind_result($Book_id,$Book_img,$Title,$Author,$Price)){
						if($stmt2->fetch()){
							$inner=array('Book_id'=>$Book_id,'Book_img'=>$Book_img,'Title'=>$Title,'Author'=>$Author,'Price'=>$Price);
							
							$details[$i]=$inner;
							$totalid='tp';
							$totalid.=(string)$i;
							
?>							
									<tr id="<?php echo $i; ?>">
									<td><center><img class="images" src="<?php echo $Book_img; ?>"></center></td>
									<td><cite><?php echo $Title; ?></cite><br><?php echo $Author; ?></td>
									<td><center><input type="text" name="<?php echo $i; ?>" value="<?php echo $qtyarray[$i]; ?>" id="<?php echo $i; ?>" class="qtytext" readonly="readonly"/>
									<button class="btnqty" id="<?php echo $i; ?>" type="button" data-func="plus" data-field="<?php echo $i; ?>">+</button>
									<button class="btnqty" id="<?php echo $i; ?>" type="button" data-func="minus" data-field="<?php echo $i; ?>">-</button>
									</center></td>
									<td>&#x20b9; <?php echo $Price; ?></td>
									<td>&#x20b9; <input type="text" class="total_p" value="<?php echo floatval($Price*$qtyarray[$i]); ?>" readonly="readonly" id="<?php echo $totalid; ?>"></td>
									<td><center><input  type="button" value="Remove" id="<?php echo $i; ?>" class="btn"/></center></td>
								</tr>
<?php								
						}
					}
				}
			}
		}
	}
	
	/*if(isset($_POST["remove"])){
		echo '<script>alert("ok ill try to remove!")</script>';
	}*/
	
?>

</table>

<br/>
<?php
	$grand_total=0;
	
	for($i=0;$i<sizeof($details);$i++){
		$inner=$details[$i];
		$grand_total+=(floatval($inner['Price'])*intval($qtyarray[$i]));
	}

?>
<table>
<tr>
<td width="820"></td>
<th width="200" bgcolor="#D4E6F1">Total: &nbsp; &#x20b9; <input type="text" class="total_p" id="gdtotal" value="<?php echo $grand_total; ?>" readonly="readonly"/></th>
</tr>
<tr>
<td width="820"></td>
<th width="200" ><center><form action="payment.html"><input type="submit" value="Proceed to Checkout"></form><center></th>

</tr>
</table>

</center>
<script>
	$(document).ready(function(){
    $(".btn").click(function(){
        
		var id=$(this).attr('id');
		var details=<?php echo json_encode($details); ?>;
		var inner=details[id];
		var tpid='#tp'+id.toString();
		var $tp=$(tpid);
		var total_p=parseFloat($tp.val());
		var $gd=$('#gdtotal');
		var gd_total=parseFloat($gd.val());
		//window.location.href="http://localhost/bookwork/removeitem.php?bookid="+inner['Book_id']+"";
		//alert(""+inner['Title']);
		$("table.table1 tr#"+id).remove();
		$('#gdtotal').val(gd_total - total_p);
		$.ajax({
			url: 'justwork.php',
			type: 'POST',
			data: { bookid : inner['Book_id']},
			success: function(data) {
				alert("Item removed");
			}
		});
		
		//$().redirect('http://localhost/bookwork/removeitem.php', {"callremove": "1", "bookid": inner['Book_id']});

    });
	

	$('.btnqty').click(function() {
		var id=$(this).attr('id');	
		var details=<?php echo json_encode($details); ?>;
		var inner=details[id];
		
		var tpid='#tp'+id.toString();
		var $tp=$(tpid);
		var total_p=parseFloat($tp.val());
		var price=parseFloat(inner['Price']);
		var $gd=$('#gdtotal');
		var gd_total=parseFloat($gd.val());
		var $t = $(this),
		$in = $('input[name="'+$t.data('field')+'"]'),
        val = parseInt($in.val()),
        valMax = 100,
        valMin = 1;
		
		// Check if a number is in the field first
		if(isNaN(val) || val < valMin) {
			// If field value is NOT a number, or
			// if field value is less than minimum,
			// ...set value to 0 and exit function
			$in.val(valMin);
        return false;
		} else if (val > valMax) {
        // If field value exceeds maximum,
        // ...set value to max
			$in.val(valMax);
			return false;
		}
		var incdec=0;
		// Perform increment or decrement logic
		if($t.data('func') == 'plus') {
			if(val < valMax){ $in.val(val + 1);
			$tp.val(total_p + price);
			$gd.val(gd_total + price);
			incdec=val + 1;
			}
		} else {
				if(val > valMin){ $in.val(val - 1);
				$tp.val(total_p - price);
				$gd.val(gd_total - price);
				incdec=val - 1;
				}
		}
		$.ajax({
			url: 'justwork2.php',
			type: 'POST',
			data: { bookid : inner['Book_id'], incdec : incdec},
			success: function(data) {
				
			}
		});
		
	});
	
	
});

</script>

<footer>
		<table id="foot">
			<tr>
			<td>Company</td>
			<td>Policies</td>
			<td>Help</td>
			<td>Follow us</td>
		</tr>
		<tr>
			<td>About Us</td>
			<td>Privacy Policies</td>
			<td>Payment</td>
			<td></td>
		</tr>
		<tr>
			<td>Career</td>
			<td>Terms of use</td>
			<td>Shipping</td>
			<td></td>
		</tr>
		<tr>
			<td>Blog</td>
			<td>Secure Shopping</td>
			<td>Return</td>
			<td></td>
		</tr>
		<tr>
			<td>Contact Us</td>
			<td>Copyright Policies</td>
			<td>FAQ</td>
			<td></td>
		</tr>
	</table>
	</footer>
</body>
</html>