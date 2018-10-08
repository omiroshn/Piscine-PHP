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
    <div class="div-nav-main" style="position: absolute">
        <div class="div-nav-main-left">
            <a id="nav-logo"  style="padding-top: 0px;height: 55px;border-radius: 10px;"; href="index.php"><img class="image-logo" src="../img/apple.png"></a>
                <i class="fa fa-caret-down"></i>
                <div class="dropdown">
                    <button class="dropbtn border-nav-btn">
                        <a href="index.php?category=mac">Maс</a>
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a class="sub_menu" href="index.php?category=macbook">Mac Book</a>
                        <a class="sub_menu" href="index.php?category=macbookair">Mac Book Air</a>
                        <a class="sub_menu" href="index.php?category=macbookpro">Mac Book Pro</a>
                        <a class="sub_menu" href="index.php?category=imac">iMac</a>
                        <a class="sub_menu" href="index.php?category=imacpro">iMac Pro</a>
                        <a class="sub_menu" href="index.php?category=macpro">Mac Pro</a>
                        <a class="sub_menu" href="index.php?category=macmini">Mac Mini</a>
                    </div>
                </div>
            <div class="dropdown">
                <button class="dropbtn  border-nav-btn">
                    <a href="index.php?category=ipad">iPad</a>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a class="sub_menu" href="index.php?category=ipadpro">iPad Pro</a>
                    <a class="sub_menu" href="index.php?category=ipad">iPad</a>
                    <a class="sub_menu" href="index.php?category=ipadmini">iPad mini 4</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn  border-nav-btn">
                    <a href="index.php?category=iphone">iPhone</a>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a class="sub_menu" href="index.php?category=iphonex">iPhone X</a>
                    <a class="sub_menu" href="index.php?category=iphone8">iPhone 8</a>
                    <a class="sub_menu" href="index.php?category=iphone7">iPhone 7</a>
                    <a class="sub_menu" href="index.php?category=iphone6s">iPhone 6S</a>
                    <a class="sub_menu" href="index.php?category=iphonese">iPhone SE</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn  border-nav-btn">
                    <a href="index.php?category=watch">Watch</a>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a class="sub_menu" href="#">Apple Watch Series 3</a>
                    <a class="sub_menu" href="#">Apple Watch Nike+</a>
                    <a class="sub_menu" href="#">Apple Watch Hermès</a>
                    <a class="sub_menu" href="#">Apple Watch Edition</a>
                    <a class="sub_menu" href="#">Apple Watch Series 1</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn  border-nav-btn">
                    <a href="index.php?category=tv">TV</a>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a class="sub_menu" href="#">Apple TV 4K</a>
                    <a class="sub_menu" href="#">Apple TV</a>
                    <a class="sub_menu" href="#">TV App</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn  border-nav-btn">
                    <a href="index.php?category=music">Music</a>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a class="sub_menu" href="#">Apple Music</a>
                    <a class="sub_menu" href="#">iTunes</a>
                    <a class="sub_menu" href="#">HomePod</a>
                    <a class="sub_menu" href="#">iPod touch</a>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="div-nav-main-right">
            <?php if(!isset($_SESSION['username'])): ?>
            <div style="float: right" class="dropdown">
                <a id="nav-logo" href="login.php" style="padding-top: 25px" class="dropbtn  border-nav-btn">Log in</a>
            </div>
            <?php else: ?>
                <div style="float: right; margin-right: 2vw" class="dropdown">
                    <button id="nav-logo" style="padding-top: 25px" class="dropbtn  border-nav-btn">Settings
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a class="sub_menu"  href="cabinet.php">Cabinet</a>
                        <a class="sub_menu"  href="basket.php?basket=true">Basket</a>
                        <a class="sub_menu"  href="login.php?logout='1'">Log out</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>