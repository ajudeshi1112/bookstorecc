<?php 

session_start();
if(isset($_GET["id"]))
	addToCart($_GET["id"]);

function addToCart($id){
	require 'connection.php';

	$session_value=(isset($_SESSION["username"]))? $_SESSION["username"]:"notset";

	if($session_value=="notset"){
		echo '<script language="javascript">','alert("Please login to add to cart!")','</script>';
	
	}else{
		$query="INSERT INTO Cart (Username,Book_id,Quantity) values (?,?,?) ";
		$qty=1;
		if($stmt=$conn->prepare($query)){
			if($stmt->bind_param("sii",$session_value, $_GET["id"],$qty)){
				if(!$stmt->execute()){
					//echo '<script language="javascript">','alert("Book not added!Try again!")','</script>';
				}
			}
			else{
				//echo '<script language="javascript">','alert("Book not added!Try again!")','</script>';	
			}
		}else{
			//echo '<script language="javascript">','alert("Book not added!Try again!")','</script>';
		}
		$stmt->close();
	}	
}

?>


<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="HandheldFriendly" content="true">
		<link href="catalogstyle.css" type="text/css" rel="stylesheet">
		<link href="commonstyle.css" type="text/css" rel="stylesheet">
		

	</head>
	<body>
		
		<table id="navtable">
			<tr>
				<td><cite>BookShelf</cite></td>			
				<td><img id="openbook" src="openbook.png"></td>
				<td><a href="regcss.php">Create an account</a> | <a href="logcss.php">SignIn</a> | <a href="profilecss.php">View Profile</a> | <a href="cart.php">Go to Cart</a>| <a href="logout.php">Logout</a></td>
			</tr>
		</table>
		<table id="category">
			<tr>
				<td><a href="headercss.php"><img id="home" src="home.png"></a></td>
				<td>Category
					<select name="category1">
						<option value="action">Action & Adventure</option>
						<option value="bio">Biographies & Memoirs</option>
						<option value="eco">Business & Economics</option>
						<option value="humour">Humour</option>
						<option value="fiction">Literature & Fiction</option>
						<option value="sports">Sports</option>
					</select>
				</td>
				<td>New Arrivals</td>
				<td>Best Sellers</td>
				<td>Pre Order</td>
				<td>Textbooks</td>
				<td>Award Winners</td>
				<td>Featured Authors</td>
				<td>Currency INR</td>
			</tr>
		</table>
		

	<div id="galleryphotos">
		SHOP BY CATEGORY<hr>
		<div class="displayphoto">
		
			<img src="slide7.jpg" name="slide1">
			<div class="name"><a class="aclass" href="#action">Exam Preparation</a></div>
			
		</div>
		<div class="displayphoto">
			<img src="inferno.jpg" name="slide1">
			<div class="name"><a class="aclass" href="#action">Action&Adventure </a></div>
		</div>
		<div class="displayphoto">
			<img src="bio.jpg" name="slide1">
			<div class="name"><a class="aclass" href="#action">Biographies</a></div>
		</div>
		<div class="displayphoto">
			<img src="business.jpg" name="slide1">
			<div class="name"><a class="aclass" href="#action">Business</a></div>
		</div>
		<br>
	</div>
	<div id="galleryphotos">
		
		<div class="displayphoto">
		
			<img src="humour.jpg" name="slide1">
			<div class="name"><a class="aclass" href="#action">Humour</a></div>
			
		</div>
		<div class="displayphoto">
			<img src="fiction.jpg" name="slide1">
			<div class="name"><a class="aclass" href="#action">Fiction</a></div>
		</div>
		<div class="displayphoto">
			<img src="sports.jpg" name="slide1">
			<div class="name"><a class="aclass" href="#action">Sports</a></div>
		</div>
		<div class="displayphoto">
			<img src="slide8.jpg" name="slide1">
			<div class="name"><a class="aclass" href="#action">Textbooks</a></div>
		</div>
		<br>
	</div>
	<div id="action">
		Action & Adventure
		<hr>
		<center>
			<table class="tdimage">
				<tr>
					<td><img class="images" src="harry.jpg"></td>
					<td><img class="images" src="bahubali.jpg"></td>
					<td><img class="images" src="origin.jpg"></td>
					<td><img class="images" src="inferno.jpg"></td>
					<td><img class="images" src="angels.jpg"></td>
				</tr>
				<tr>
					<td><cite>Harry Porter and the Chamber of Secrets</cite></td>
					<td><cite>The Rise of Sivagami: Book 1 of Baahubali - Before the Beginning</cite></td>
					<td><cite>Origin</cite></td>
					<td><cite>Inferno</cite></td>
					<td><cite>Angels & Demons</cite></td>
				</tr>
				<tr>
					<td>J.K. Rowling</td>
					<td>Anand Neelakantan</td>
					<td>Dan Brown</td>
					<td>Dan Brown</td>
					<td>Dan Brown</td>
				</tr>
				<tr>
					<td>&#x20b9; 375</td>
					<td>&#x20b9; 150</td>
					<td>&#x20b9; 460</td>
					<td>&#x20b9; 375</td>
					<td>&#x20b9; 250</td>
				</tr>
				<tr>
					<td><center><button onclick="window.location.href='http://localhost/bookwork/catalogcss.php?id=3'">Add to Cart</button></center></td>
					<td><center><button onclick="window.location.href='http://localhost/bookwork/catalogcss.php?id=4'">Add to Cart</button></center></td>
					<td><center><button onclick="window.location.href='http://localhost/bookwork/catalogcss.php?id=5'">Add to Cart</button></center></td>
					<td><center><button onclick="window.location.href='http://localhost/bookwork/catalogcss.php?id=6'">Add to Cart</button></center></td>
					<td><center><button onclick="window.location.href='http://localhost/bookwork/catalogcss.php?id=7'">Add to Cart</button></center></td>
				</tr>
	
			</table>
		</center>
	</div>
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
