<?php

session_start();
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<meta name="HandheldFriendly" content="true">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<link href="logstyle.css" type="text/css" rel="stylesheet">
			<link href="commonstyle.css" type="text/css" rel="stylesheet">
		<script ="text/javascript">
function loginValidate(){
	var mail=document.loginform.email.value;
	var password=document.loginform.pass.value;
	if(mail=="a@gmail.com" && password=="123"){
		alert('Login Sucessful!\nWelcome a@gmail');
		document.action="catalogcss.html";
		return true;
	}
	document.action="Userlogin.php";
	alert('Invalid username/password combination\n');
	return false;
}

</script>

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
			<center>
				
				<br><a href="#" id="show"><font size="6" color="green"><cite>Login Into Your Account</font></a></cite>
				<hr>
				
				<div id="signin" style="display:none;">
				<form method="post" name="loginform" action="Userlogin.php">
					<img src="emailicon.png" class="icons">
					<input type="email" name="email" placeholder="Username(Email)" autocomplete="off">
					<br>
					<img src="key.png" class="icons">
					<input type="password" name="pass" placeholder="Password" autocomplete="off" id="myInput">&nbsp;&nbsp;<input type="checkbox" onclick="myFunction()"/> <font size="4" color="grey">Show Password</font>
					<br>
					<p class="pclass"><input type="checkbox" name="check"><font color="#2E4053">Keep me signed in |</font><font color="blue"><a class="aclass" href="profilecss.php">Forgot Password</a></font></p>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="submit" value="Sign In">	
				</form> 
						
					
				<p class="pclass"><font color="#41C84C">Dont have an account?</font>&nbsp; <a class="aclass" href="regcss.php">Sign Up</a></p>	
				<p class="pclass"><font color="#2E4053">Or login with ...</font>&nbsp;&nbsp; <a class="aclass" href="ok.html"><img class="icons" src="fb.PNG"></a>&nbsp;
				<a href="ok.html"><img class="icons" src="tw.JPG"></a>&nbsp;
				<a href="ok.html"><img class="icons" src="gp.PNG"></a>&nbsp;
				<a href="ok.html"><img class="icons" src="in.JPG"></a>&nbsp;
				</p></div>	
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
	<script>
		function myFunction() {
			var x = document.getElementById("myInput");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
		$(document).ready(function(){
			$("#show").click(function(){
			$("#signin").slideToggle("slow");
			
			});
		});

	</script>
		</body>
	</html>