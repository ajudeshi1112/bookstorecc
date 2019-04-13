<!DOCTYPE html>
	<html>	
		<head>
			<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<meta name="HandheldFriendly" content="true">
			<link href="commonstyle.css" text="text/css" rel="stylesheet">
			<link href="profilestyle.css" text="text/css" rel="stylesheet">		
		</head>
		<body>
			<center>
			<table id="navtable">
				<tr>
					<td><cite>BookShelf</cite></td>			
					<td><img id="openbook" src="openbook.png"></td>
					<td><a href="regcss.php">Create an account</a> | <a href="logcss.php">SignIn</a> | <a href="profilecss.php">View Profile</a> | <a href="cart.php">Go to Cart</a>| <a href="logout.php">Logout</a></td>

				</tr>
			</table>
			<br>
				<div id="profile1">
					<img src="pro2.PNG" alt="User Profile" width="120" height="120">
					<br><a class="aclass" href="#basic">Basic Profile</a>|<a class="aclass" href="#password">Password & Security</a>
				</div>
				<div id="basic">
					
				<table class="details">
<tr>
<td></td>
<td><select name="title">
    <option value="Mr">Ms.</option>
    <option value="Mrs">Mrs.</option>
    <option value="Ms">Mr.</option>
  </select></td>
<td><input type="text" name="fname" value="Aneri" placeholder="Firstname" size="7"><input type="text" name="lnamw" value="Udeshi" placeholder="Lastname" size="8">
</td>
</tr>
<tr>
<td></td>
<td><img class="icons" src="email.PNG" alt="email"></td>
<td><input type="text" name="emailid" value="a@gmail.com">
</td>
</tr>
<tr>
<td></td>
<td><img class="icons" src="phone2.PNG" alt="email"></td>
<td><input type="text" name="uname" value="9988776615">
</td>
</tr>
</table>
<br>
<input type="button" value="Update" />
				</div>
				
				<hr>
				<div id="password">
					Reset your password
					<form>
					<img class="imgicon" src="password.png">
					<input type="password" name="pass" placeholder="Password" autocomplete="off">
					<br><br>
					<img class="imgicon" src="password.png">
					<input type="password" name="cpass" placeholder="Confirm Password" autocomplete="off">
					<br><br>
					<input type="submit" value="Change Password">
					</form>
				</div>
				
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