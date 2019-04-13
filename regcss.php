<?php
session_start();
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="HandheldFriendly" content="true">
			<link href="regstyle.css" type="text/css" rel="stylesheet">
			<link href="commonstyle.css" type="text/css" rel="stylesheet">
			<script ="text/javascript">
function validateName(name,str,no){
	var pattern=/[A-Za-z]+$/;
	if(name.match(pattern))
		return "";
	else{
		//document.action="bookreg.html";
		if(no==1)
			return "Invalid firstname\t";
		else
			return "Invalid lastname\t";	
		}

}
function validatePhone(phone,str){
	var pattern=/[0-9]{10}$/;
	if(phone.match(pattern))
		return "";
	else{
		//document.action="bookreg.html";
		return "Invalid phonenumber\t";		
	}	
}
function validateEmail(email,str){
	var pattern=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
	if(email.match(pattern))
		return "";
	else{
		//document.action="bookreg.html";
		return "Invalid email-id\t";
    }
} 
function validatePass(pass,cpass,str){
	
	if(pass===cpass)
		return "";
	else{
		//document.action="bookreg.html";
		return "Password and Confirmation password fields do not match\t";
		
	}	
}
function validation(){
	
	var fname=document.registration.firstname.value;
	var lname=document.registration.lastname.value;
	var phone=document.registration.phone.value;
	var email=document.registration.email.value;
	var pass=document.registration.pass.value;
	var cpass=document.registration.cpass.value;
	if(fname == "" || lname == "" || phone == "" || email =="" || pass.length =="" || cpass ==""){
		alert('Please fill in all fields!\n');
		return false;
	}
	var str="";
	str=str.concat(validateName(fname,str,1));
	str=str.concat(validateName(lname,str,2));
	str=str.concat(validatePhone(phone,str));
	str=str.concat(validateEmail(email,str));
	str=str.concat(validatePass(pass,cpass,str));
	if(str == ""){
		//alert('Registered sucessfully!');
		document.registration.action="Userstore.php";
		return true;		
		}
	
		alert(str);
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
			<br>
			<center>
			<div id="signup">
				
				<cite>Sign Up </cite>
				<hr>
				<form method="post" name="registration" onsubmit="return (validation());" action="Userstore.php">
					<img class="imgicon" src="name.png" >

					<input type="text" name="firstname" placeholder="First Name" autocomplete="off">
					<br><br>
					<img class="imgicon" src="name.png">
					<input type="text" name="lastname" placeholder="Last Name" autocomplete="off">
					<br><br>
					<img class="imgicon" src="phoneicon.png">
					<input type="tel" name="phone" placeholder="Phone Number" autocomplete="off">
					<br><br>
					<img class="imgicon" src="emailicon.png">
					<input type="email" name="email" placeholder="Username(Email)" autocomplete="off">
					<br><br>
					<img class="imgicon" src="password.png">
					<input type="password" name="pass" placeholder="Password" autocomplete="off">
					<br><br>
					<img class="imgicon" src="password.png">
					<input type="password" name="cpass" placeholder="Confirm Password" autocomplete="off">
					<br>
					<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="submit" value="Sign Up & Get Started">
				</form>
			</div>			
			</center>
			<br>
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