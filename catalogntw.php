<?php 

session_start();
if(isset($_GET["id"]))
	addToCart($_GET["id"]);
ini_set('max_execution_time', 3000); 

function addToCart($id){
	require 'connection.php';

	$session_value=(isset($_SESSION["username"]))? $_SESSION["username"]:"notset";

	if($session_value=="notset"){
		//echo '<script language="javascript">','alert("Please login to add to cart!")','</script>';
	
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
			<?php
				//echo '<script language="javascript">','alert("hello1")','</script>';

				require 'connection.php';
				/*$query="SELECT Book_id FROM `Category` WHERE Cat = ?";
				$cat="action";
				if(($stmt=$conn->prepare($query))){
					//echo '<script language="javascript">','alert("hello2")','</script>';

					if($stmt->bind_param("s",$cat)){
						//echo '<script language="javascript">','alert("hello3")','</script>';
						if($stmt->execute()){
						if($stmt->bind_result($id)){
							//echo '<script language="javascript">','alert("hello4")','</script>';

							$idarray=array();
								
							$i=0;	
							
							while($stmt->fetch()){
								//echo '<script language="javascript">','alert("fetching")','</script>';
								$rows=1;
								$idarray[$i]=$id;
								$i++;
							}
							

							$stmt->close();
				*/			$idarray = array(3,4,5,6,7);
							$details = array();
							
							$query="SELECT * from Books WHERE Book_id = ?";
							if(($stmt=$conn->prepare($query))){
								for($i=0;sizeof($idarray);$i++){
									if($stmt->bind_param("i",$idarray[$i])){
										if($stmt->execute()){
										if($stmt->bind_result($Book_id,$Book_img,$Title,$Author,$Price)){
											if($stmt->fetch()){
												$inner=array('Book_id'=>$Book_id,'Book_img'=>$Book_img,'Title'=>$Title,'Author'=>$Author,'Price'=>$Price);							
												$details[$i]=$inner;					
											}
										}
										}
									}
								}		
							}
							
						/*}else{
							//echo '<script language="javascript">','alert("hello4")','</script>';
						}
						}
					}else{
							//echo '<script language="javascript">','alert("hello4")','</script>';
					}

					
				}else{
						//echo '<script language="javascript">','alert("hello4")','</script>';
				}*/

				$conn->close();
			?>
				<tr>
					<td><img class="images" src="<?php echo $details[0]['Book_img']; ?>"></td>
					<td><img class="images" src="<?php echo $details[1]['Book_img']; ?>"></td>
					<td><img class="images" src="<?php echo $details[2]['Book_img']; ?>"></td>
					<td><img class="images" src="<?php echo $details[3]['Book_img']; ?>"></td>
					<td><img class="images" src="<?php echo $details[4]['Book_img']; ?>"></td>
				</tr>
				<tr>
					<td><cite></cite><?php echo $details[0]['Title']; ?></td>
					<td><cite><?php echo $details[1]['Title']; ?></td>
					<td><cite><?php echo $details[2]['Title']; ?></cite></td>
					<td><cite><?php echo $details[3]['Title']; ?></cite></td>
					<td><cite><?php echo $details[4]['Title']; ?></cite></td>
				</tr>
				<tr>
					<td><?php echo $details[0]['Author']; ?></td>
					<td><?php echo $details[1]['Author']; ?></td>
					<td><?php echo $details[2]['Author']; ?></td>
					<td><?php echo $details[3]['Author']; ?></td>
					<td><?php echo $details[1]['Author']; ?></td>
				</tr>
				<tr>
					<td>&#x20b9; <?php echo $details[0]['Price']; ?></td>
					<td>&#x20b9; <?php echo $details[1]['Price']; ?></td>
					<td>&#x20b9; <?php echo $details[2]['Price']; ?></td>
					<td>&#x20b9; <?php echo $details[3]['Price']; ?></td>
					<td>&#x20b9; <?php echo $details[4]['Price']; ?></td>
				</tr>
				<tr>
					<td><center><button onclick="window.location.href='http://localhost/bookwork/catalogcss.php?id=<?php echo $details[0]['Book_id']?>'">Add to Cart</button></center></td>
					<td><center><button onclick="window.location.href='http://localhost/bookwork/catalogcss.php?id=<?php echo $details[1]['Book_id']?>'">Add to Cart</button></center></td>
					<td><center><button onclick="window.location.href='http://localhost/bookwork/catalogcss.php?id=<?php echo $details[2]['Book_id']?>'">Add to Cart</button></center></td>
					<td><center><button onclick="window.location.href='http://localhost/bookwork/catalogcss.php?id=<?php echo $details[3]['Book_id']?>'">Add to Cart</button></center></td>
					<td><center><button onclick="window.location.href='http://localhost/bookwork/catalogcss.php?id=<?php echo $details[4]['Book_id']?>'">Add to Cart</button></center></td>
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
