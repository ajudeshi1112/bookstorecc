<?php
	session_start();
	
	
	
?>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="HandheldFriendly" content="true">

<link href="commonstyle.css" type="text/css" rel="stylesheet">
<style>
footer{
	position:fixed;
	bottom:0px;
	
}
#ecart{
	top:60px;
	position:relative;
	height:200px;
	width:80%;
	background-color:#E0FFFF;
		
}
#ecart td:nth-child(1){
	width:40%;

}
#ecart td:nth-child(2){
	width:70%;
	color:red;
	font-family:Comic Sans MS;
	font-size:3vw;
}
#ecartimg {
	width:100%;
	height:150px;
}
</style>

</head>

<body>
<table id="navtable">
			<tr>
				<td><cite>BookShelf</cite></td>			
				<td><img id="openbook" src="openbook.png"></td>
				<td><a href="regcss.html">Create an account</a> | <a href="logcss.html">SignIn</a> | <a href="profilecss.html">View Profile</a> | <a href="cart.html">Go to Cart</a>| <a href="headercss.html">Logout</a></td>

			</tr>
			</table>
			

<input type="button" onclick="location.href='catalogcss.php'" value="back">
<center>
<table id="ecart">
<tr>
<td><img id="ecartimg" src="cart.png"/></td>
<td>Your cart is empty!</td>
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