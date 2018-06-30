<?php
if (isset($_GET['logout'])) {
	$_SESSION = array();
	session_unset();
	session_destroy();
	unset($_SESSION['username']);
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Online Shop</title>
	<link rel="stylesheet" href="../css/homepage.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="navbar">
	<a style="padding-top: 25px"; href="index.php">Home</a>
		<i class="fa fa-caret-down"></i>
		<div class="dropdown">
			<button class="dropbtn">
				<a href="index.php?category=mac">Maс</a>
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
				<a href="index.php?category=macbook">Mac Book</a>
				<a href="index.php?category=macbookair">Mac Book Air</a>
				<a href="index.php?category=macbookpro">Mac Book Pro</a>
				<a href="index.php?category=imac">iMac</a>
				<a href="index.php?category=imacpro">iMac Pro</a>
				<a href="index.php?category=macpro">Mac Pro</a>
				<a href="index.php?category=macmini">Mac Mini</a>
			</div>
		</div>
	<div class="dropdown">
		<button class="dropbtn">
			<a href="index.php?category=ipad">iPad</a>
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-content">
			<a href="index.php?category=ipadpro">iPad Pro</a>
			<a href="index.php?category=ipad">iPad</a>
			<a href="index.php?category=ipadmini">iPad mini 4</a>
		</div>
	</div>
	<div class="dropdown">
		<button class="dropbtn">
			<a href="index.php?category=iphone">iPhone</a>
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-content">
			<a href="index.php?category=iphonex">iPhone X</a>
			<a href="index.php?category=iphone8">iPhone 8</a>
			<a href="index.php?category=iphone7">iPhone 7</a>
			<a href="index.php?category=iphone6s">iPhone 6S</a>
			<a href="index.php?category=iphonese">iPhone SE</a>
		</div>
	</div>
	<div class="dropdown">
		<button class="dropbtn">
			<a href="index.php?category=watch">Watch</a>
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-content">
			<a href="#">Apple Watch Series 3</a>
			<a href="#">Apple Watch Nike+</a>
			<a href="#">Apple Watch Hermès</a>
			<a href="#">Apple Watch Edition</a>
			<a href="#">Apple Watch Series 1</a>
		</div>
	</div>
	<div class="dropdown">
		<button class="dropbtn">
			<a href="index.php?category=tv">TV</a>
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-content">
			<a href="#">Apple TV 4K</a>
			<a href="#">Apple TV</a>
			<a href="#">TV App</a>
		</div>
	</div>
	<div class="dropdown">
		<button class="dropbtn">
			<a href="index.php?category=music">Music</a>
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-content">
			<a href="#">Apple Music</a>
			<a href="#">iTunes</a>
			<a href="#">HomePod</a>
			<a href="#">iPod touch</a>
		</div>
	</div>
	<?php if(!isset($_SESSION['username'])): ?>
		<a style="padding-top: 25px; float: right;" href="login.php">Log in</a>
	<?php else: ?>
		<div style="float: right;" class="dropdown">
			<button style="padding-top: 25px" class="dropbtn">Settings
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
				<a href="cabinet.php">Cabinet</a>
				<a href="basket.php">Basket</a>
				<a href="login.php?logout='1'">Log out</a>
			</div>
		</div>
	<?php endif; ?>
</div>
</body>
</html>