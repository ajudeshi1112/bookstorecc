<?php
	session_start();
	mysqli_report(MYSQLI_REPORT_ALL);
	require 'connection.php';
	if(!isset($_SESSION["username"]))
		header("Location: http://localhost/bookwork/emptycart.php");
	
	$getid="SELECT Book_id FROM Cart where Username = ?";
	if($stmt=$conn->prepare($getid)){
		if($stmt->bind_param("s",$_SESSION["username"])){
			if($stmt->execute()){
				if($stmt->bind_result($id)){
				
					$rows=0;
					$getdetails="SELECT * FROM Books WHERE Book_id = ? ";
					$stmt->store_result();
					if($stmt2=$conn->prepare($getdetails)){
						
						while($stmt->fetch()){
							$rows=1;
						
							if($stmt2->bind_param("i",$id)){
								if($stmt2->execute()){
									if($stmt2->bind_result($Book_id,$Book_img,$Title,$Author,$Price)){
										if($stmt2->fetch()){
											$entry=array('Book_id'=>$Book_id,'$Book_img'=>$Book_img,'Title'=>$Title,'Author'=>$Author,'Price'=>$Price);
											echo '<script type="text/javascript">',
											'alert("ok")',

											'</script>'
											;	
       									}
										else{
											 echo '<script type="text/javascript">','alert("1")','</script>';
										}
									
									}
									else{
											 echo '<script type="text/javascript">','alert("2")','</script>';
									}
								}
								else{
											 echo '<script type="text/javascript">','alert("3")','</script>';
								}
							}
							else{
											 echo '<script type="text/javascript">','alert("4")','</script>';
							}
						}
						if($rows==0){
							header("Location: http://localhost/bookwork/emptycart.php");
						
						}

					}
					else{
								 echo '<script type="text/javascript">','alert("5")','</script>';
					}
				}
				else{
								 echo '<script type="text/javascript">','alert("6")','</script>';
				}	
			}
			else{
								 echo '<script type="text/javascript">','alert("6")','</script>';
			}	
				
		}
		else{
								 echo '<script type="text/javascript">','alert("7")','</script>';
		}
	}
	else{
								 echo '<script type="text/javascript">','alert("8")','</script>';
	}
	
	
?>

<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="HandheldFriendly" content="true">
<link href="cartstyle.css" type="text/css" rel="stylesheet">
<link href="commonstyle.css" type="text/css" rel="stylesheet">


</head>

<body>
<script type="text/javascript">
	function buildCart(var ok){
		window.stop();
		alert('Im called!');
		
	}
</script>
<table id="navtable">
			<tr>
				<td><cite>BookShelf</cite></td>			
				<td><img id="openbook" src="openbook.png"></td>
				<td><a href="regcss.html">Create an account</a> | <a href="logcss.html">SignIn</a> | <a href="profilecss.html">View Profile</a> | <a href="cart.html">Go to Cart</a>| <a href="headercss.html">Logout</a></td>

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
<tr bgcolor="#F8F9F9">
<td><center><img class="images" src="harry.jpg"></center></td>
<td><cite>Harry Porter and the chamber of Secrets</cite><br>J.K. Rowling</td>
<td><center><select>
<option value="one">1</option>
<option value="two">2</option>
<option value="three">3</option>
<option value="four">4</option>
<option value="five">5</option>
</select></center></td>
<td>&#x20b9; 375</td>
<td>&#x20b9; 375</td>
<td><center><a class="aclass" href="cart.html">Remove</a></center></td>
</tr>
<tr bgcolor="#EBF5FB">
<td><center><img class="images" src="angels.jpg"></center></td>
<td><cite>Angels & Demons</cite><br>Dan Brown</td>
<td><center><select>
<option value="one">1</option>
<option value="two">2</option>
<option value="three">3</option>
<option value="four">4</option>
<option value="five">5</option>
</select></center></td>
<td>&#x20b9; 250</td>
<td>&#x20b9; 500</td>
<td><center><a class="aclass" href="cart.html">Remove</a></center></td>
</tr>
<tr bgcolor="#F8F9F9">
<td><center><img class="images" src="bahubali.jpg"></center></td>
<td><cite>The Rise of Sivagami: Book 1 of Baahubali - Before the Beginning</cite><br>Anand Neelakantan</td>
<td><center><select>
<option value="one">1</option>
<option value="two">2</option>
<option value="three">3</option>
<option value="four">4</option>
<option value="five">5</option>
</select></center></td>
<td>&#x20b9; 150</td>
<td>&#x20b9; 150</td>
<td><center><a class="aclass" href="cart.html">Remove</a></center></td>
</tr>
</table>
<br>

<table>
<tr >
<td width="820"></td>
<th width="200" bgcolor="#D4E6F1">Total &#x20b9; 1,025</th>
</tr>
<tr >
<td width="820"></td>
<th width="200" ><center><form action="payment.html"><input type="submit" value="Proceed to Checkout"></form><center></th>

</tr>


</table>
</center>
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