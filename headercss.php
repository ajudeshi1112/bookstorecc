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
		<link href="commonstyle.css" type="text/css" rel="stylesheet">
		<link href="style.css" type="text/css" rel="stylesheet">
		
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
					<select name="category1" id="cat">
						<option value="action">Action & Adventure</option>
						<option value="bio">Biographies & Memoirs</option>
						<option value="eco">Business & Economics</option>
						<option value="humour">Humour</option>
						<option value="fiction">Literature & Fiction</option>
						<option value="sports">Sports</option>
					</select>
				</td>
				<td><strong>New Arrivals</strong></td>
				<td><strong>Best Sellers</strong></td>
				<td><strong>Pre Order</strong></td>
				<td><strong>Textbooks</strong></td>
				<td><strong>Award Winners</strong></td>
				<td><strong>Featured Authors</strong></td>
				<td><strong>Currency INR</strong></td>
			</tr>
		</table>
		<div class="slider-wrapper">
  <div class="slider">
    <input type="radio" name="slider" class="trigger" id="one" checked="checked" />
    <div class="slide">
      <figure class="slide-figure">
        <img class="slide-img" src="poster5.png" />
        <figcaption class="slide-caption"><p></p></figcaption>
      </figure><!-- .slide-figure -->
    </div><!-- .slide -->
    <input type="radio" name="slider" class="trigger" id="two" />
    <div class="slide">
      <figure class="slide-figure">
        <img class="slide-img" src="poster3.jpg" />
        <figcaption class="slide-caption"><p></p></figcaption>
      </figure><!-- .slide-figure -->
    </div><!-- .slide -->
    <input type="radio" name="slider" class="trigger" id="three" />
    <div class="slide">
      <figure class="slide-figure">
        <img class="slide-img" src="poster2.jpg" />
        <figcaption class="slide-caption"><p></p></figcaption>
      </figure><!-- .slide-figure -->
    </div><!-- .slide -->
  </div><!-- .slider -->
  <ul class="slider-nav">
    <li class="slider-nav__item"><label class="slider-nav__label" for="one"></label></li>
    <li class="slider-nav__item"><label class="slider-nav__label" for="two"></label></li>
    <li class="slider-nav__item"><label class="slider-nav__label" for="three"></label></li>
  </ul><!-- .slider-nav -->
</div><!-- .slider-wrapper -->
	<div id="animation">
		<center><a href="#" id="anid"><img src="ribbons.jpg" id="ribbons"></a></center>
	</div>
	<center>
	<div id="galleryphotos">
		BEST SELLERS<br>
		
		<img src="slide1.jpg" class="displayphoto" name="slide1" id="zone">
		<img src="slide2.jpg" class="displayphoto" name="slide2" id="two">
		<img src="slide6.jpg" class="displayphoto" name="slide6" id="three">
		<img src="slide4.jpg" class="displayphoto" name="slide4" id="four">
		
		<br>
	</div>
	</center>
	<script>
		$("#cat").change(function() {
			// Pure JS
			var selectedVal = this.value;
				window.location="http://localhost/bookwork/catalogcss.php#"+selectedVal;
			//var selectedText = this.options[this.selectedIndex].text;
			
			// jQuery
			//var selectedVal = $(this).find(':selected').val();
			//var selectedText = $(this).find(':selected').text();
		});
		$('.displayphoto').mouseenter(function() {
			$(this).css("cursor","pointer");
			$(this).animate({width: "25%", height: "250px"}, 'slow');
			$(this).animate({width: "25%", height: "250px"}, 'slow');
		});

		$('.displayphoto').mouseleave(function() {   
			$(this).animate({width: "10%", height: "140px"}, 'slow');
		});
		$(document).ready(function(){
			$("#anid").click(function(){
			$("#animation").animate({
				left: '18%',
            
				width: '+65%',
				opacity: '1.0'
				 

			});
			var hello='<div><center><span><image src="tag1.jpg" width="100px" height="100px"></span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span><font style="font-size:3vw; color:#B8860B;"><cite>Bookstore at your door</cite></font></span></center></div>';
			$("#animation").html(hello);
			event.preventDefault();

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
