<?php
$connect_to = "shop";
if (!check_connect_db($connect_to))
	init_db($connect_to);

function init_db($db) {
	create_bd($db);
	create_table_users($db);
	create_table_products($db);
	create_table_basket($db);
	fill_table_products($db);
	add_admin($db);
}

function check_connect_db($db_name) {
	$servername = 'localhost';
	$username = 'root';
	$password = 'qwerty12345';
	$con = mysqli_connect($servername, $username, $password, $db_name);
	return ($con);
}

function create_bd($db) {
	$servername = 'localhost';
	$username = 'root';
	$password = 'qwerty12345';

	$con = mysqli_connect($servername, $username, $password);
	if (!$con) { die("Connection failed: " . mysqli_connect_error()); }
	$sql = "CREATE DATABASE ". $db;
	if (mysqli_query($con, $sql)) {
		echo "Database created successfully";
	} else {
		echo "Error creating database: " . mysqli_error($con); }

	mysqli_close($con);
}

function create_table_users($db)
{
	$servername = 'localhost';
	$username = 'root';
	$password = 'qwerty12345';
	$db_database = $db;

	$conn = mysqli_connect($servername, $username, $password, $db_database);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "CREATE TABLE user (
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		login VARCHAR(255) NOT NULL,
		password LONGTEXT NOT NULL,
		email VARCHAR(50),
		basket_id VARCHAR(255),
		root TINYINT(1) NOT NULL,
		check_out INT(11)
	)";

	if (mysqli_query($conn, $sql)) {
		echo "Table users created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}
	mysqli_close($conn);
}

function create_table_products($db)
{
	$servername = 'localhost';
	$username = 'root';
	$password = 'qwerty12345';
	$db_database = $db;

	$conn = mysqli_connect($servername, $username, $password, $db_database);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "CREATE TABLE product (
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		prod_name VARCHAR(255) NOT NULL,
		price float NOT NULL,
		category VARCHAR(255) NOT NULL,
		img LONGTEXT
	)";

	if (mysqli_query($conn, $sql)) {
		echo "Table products created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}
	mysqli_close($conn);
}

function create_table_basket($db)
{
	$servername = 'localhost';
	$username = 'root';
	$password = 'qwerty12345';

	$conn = mysqli_connect($servername, $username, $password, $db);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "CREATE TABLE basket (
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		product_id INT(11) NOT NULL,
		amount INT(11) NOT NULL,
		user_id VARCHAR(255) NOT NULL
	)";

	if (mysqli_query($conn, $sql)) {
		echo "Table basket created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}
	mysqli_close($conn);
}

function add_pic($db, $name, $price, $category, $img) {

	$servername = 'localhost';
	$username = 'root';
	$password = 'qwerty12345';

	$conn = mysqli_connect($servername, $username, $password, $db);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO product (prod_name, price, category, img)
	VALUES ('$name', '$price', '$category', '$img')";

	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	mysqli_close($conn);
}

function fill_table_products($db)
{
	add_pic($db, "iPhone 5S gold", 600, "iPhone", "https://ss7.vzw.com/is/image/VerizonWireless/apple_iPhoneSE_Gld?$device-lg$");
	add_pic($db, "iPhone 5S black", 600, "iPhone", "https://www.bite.lv/sites/default/files/products/2017-09/Apple%20iPhone%206_1.png");
	add_pic($db, "iPhone X", 1300, "iPhone", "https://www.att.com/catalog/en/skus/Apple/Apple%20iPhone%20X/overview/326743-pdp-iphoneX-s2-1@2x.jpg");
	add_pic($db, "iPhone 8", 900, "iPhone", "https://store.storeimages.cdn-apple.com/4981/as-images.apple.com/is/image/AppleInc/aos/published/images/i/ph/iphone8/plus/iphone8-plus-select-2017?wid=468&hei=660&fmt=png-alpha&.v=1503618522714");
	add_pic($db, "MacBook", 2100, "Mac", "https://media.wired.com/photos/59e952e4f572231fe56c3937/master/w_2500,c_limit/rosegold-macbook-1.jpg");
	add_pic($db, "MacBook Pro", 1700, "Mac", "https://img1.moyo.ua/img/products/3612/76_1500x_1500559053.jpg");
	add_pic($db, "iPad", 1300, "iPad", "https://store.storeimages.cdn-apple.com/4981/as-images.apple.com/is/image/AppleInc/aos/published/images/i/pa/ipad/pro/ipad-pro-10in-cell-select-spacegray-201706?wid=470&hei=556&fmt=png-alpha&.v=1505500506501");
	add_pic($db, "Apple Watch series 3", 400, "Watch", "https://store.storeimages.cdn-apple.com/4667/as-images.apple.com/is/image/AppleInc/aos/published/images/4/2/42/alu/42-alu-silver-sport-white-s1-grid?wid=270&hei=275&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1512435128675");
	add_pic($db, "Apple Watch Nike+", 500, "Watch", "https://img.mvideo.ru/Pdb/30030246b.jpg");
	add_pic($db, "Apple TV", 350, "TV", "https://store.storeimages.cdn-apple.com/8755/as-images.apple.com/is/image/AppleInc/aos/published/images/a/pp/apple/tv/apple-tv-hero-select-201709?wid=1200&hei=630&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1504814112595");
	add_pic($db, "iPhone 5S gold", 600, "iphone5s", "https://ss7.vzw.com/is/image/VerizonWireless/apple_iPhoneSE_Gld?$device-lg$");
	add_pic($db, "iPhone 5S black", 600, "iphone5s", "https://www.bite.lv/sites/default/files/products/2017-09/Apple%20iPhone%206_1.png");
	add_pic($db, "iPhone X", 1300, "iphonex", "https://www.att.com/catalog/en/skus/Apple/Apple%20iPhone%20X/overview/326743-pdp-iphoneX-s2-1@2x.jpg");
	add_pic($db, "iPhone 8", 900, "iphone8", "https://i1.rozetka.ua/goods/1757077/apple_iphone_7_plus_32gb_silver_images_1757077778.jpg");
	add_pic($db, "MacBook", 2100, "macbook", "https://media.wired.com/photos/59e952e4f572231fe56c3937/master/w_2500,c_limit/rosegold-macbook-1.jpg");
	add_pic($db, "MacBook Pro", 1700, "MacBookpro", "https://img1.moyo.ua/img/products/3612/76_1500x_1500559053.jpg");
	add_pic($db, "iPad", 1300, "iPad", "https://store.storeimages.cdn-apple.com/4981/as-images.apple.com/is/image/AppleInc/aos/published/images/i/pa/ipad/pro/ipad-pro-10in-cell-select-spacegray-201706?wid=470&hei=556&fmt=png-alpha&.v=1505500506501");
	add_pic($db, "Apple Watch series 3", 400, "Watch", "https://store.storeimages.cdn-apple.com/4667/as-images.apple.com/is/image/AppleInc/aos/published/images/4/2/42/alu/42-alu-silver-sport-white-s1-grid?wid=270&hei=275&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1512435128675");
	add_pic($db, "Apple Watch Nike+", 500, "Watch", "https://img.mvideo.ru/Pdb/30030246b.jpg");
	add_pic($db, "Apple TV", 350, "TV", "https://store.storeimages.cdn-apple.com/8755/as-images.apple.com/is/image/AppleInc/aos/published/images/a/pp/apple/tv/apple-tv-hero-select-201709?wid=1200&hei=630&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1504814112595");
}

function add_admin($db) {
	$servername = 'localhost';
	$username = 'root';
	$password = 'qwerty12345';

	$conn = mysqli_connect($servername, $username, $password, $db);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$passwd = hash("whirlpool", 'admin');
	$sql = "INSERT INTO user(login, password, email, root) VALUES ('admin', '$passwd', 'admin@admin.com', '1')";

	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	mysqli_close($conn);
}

?>