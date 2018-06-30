<?php
session_start();
require_once('navbar.php');
include('server.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Online Shop</title>
	<link rel="stylesheet" href="../css/homepage.css">
	<link rel="stylesheet" href="../css/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<div class="header">
	<h2>HOME PAGE</h2>
</div>

<?php if (count($errors) > 0): ?>
	<div class="error">
		<?php foreach ($errors as $error): ?>
			<p><?php echo "$error"; ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>

<?php if ($_SESSION['root'] == 1): ?>
<div class="huel">
	<form method="POST">
		<input style="background-color: #55ACEE;" type="submit" name="fb" value="Add user">
		<input style="background-color: #3B5998;" type="submit" name="twitter" value="Add item">
		<input style="background-color: red;"     type="submit" name="dont" value="Virezatsya">
	</form>
</div>
<?php endif ?>

<div class="content">
	<?php if ($_SESSION['root'] == 1): ?><div class="error"><h3>ADMIN</h3></div>
	<?php else: ?><div class="error"><h3>User</h3></div><?php endif ?>
	<?php if (isset($_SESSION['username'])): ?>
		<p style="text-align: center;">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		<p style="text-align: center;"><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
	<?php endif ?>
</div>

<?php if ($_SESSION['root'] == 1): ?>
	<?php
		$sql = "SELECT prod_name, price, amount, login FROM user, basket, product WHERE basket.product_id = product.id AND user.check_out = 1";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$temp = $row['login'];
			while($row = mysqli_fetch_assoc($result)){
				if ($temp != $row['login']) {
					echo '<p>Username: '.$row['login'].'</p>';
				}
				echo "<li>".$row['prod_name']." - amount: ".$row['amount'].", price: ".$row['amount'] * $row['price']."$</li>";
				$temp = $row['login'];
			}
		}
	?>
	<?php
		if (isset($_POST["fb_name"])) {
			$conn = mysqli_connect('localhost:3306', 'root2', '123456', 'rush00');
			$passwd = hash("whirlpool", $_POST['password']);
			$sql = "INSERT INTO user(login, password, email, root) VALUES ('" . $_POST['login'] . "', '" . $passwd . "', '" . $_POST['email'] . "', " . $_POST['root'] . ")";
			if (mysqli_query($conn, $sql)) {
				echo "New record created successfully";
			}
			mysqli_close($conn);
		}
	?>

	<?php if (isset($_POST['fb'])): ?>
	<div class="col">
		<form method="POST">
			<input type="text" name="login" placeholder="Login" required>
			<input type="text" name="password" placeholder="Password" required>
			<input type="text" name="email" placeholder="Email" required>
			<input type="text" name="root" placeholder="root" required>
			<input type="submit" name ="fb_name" value="Login">
		 </form>
	</div>
	<?php endif ?>

	<?php
	if (isset($_POST["twitter_kek"])) {
		$conn = mysqli_connect('localhost:3306', 'root2', '123456', 'rush00');
		$sql = "INSERT INTO product(prod_name, price, category) VALUES ('" . $_POST['productname'] . "', '" . $_POST['price'] . "', '" . $_POST['category'] . ")";
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		}
		mysqli_close($conn);
	}
	?>

	<?php if (isset($_POST['twitter'])): ?>
	<div class="col">
		<form method="POST">
			<input type="text" name="productname" placeholder="Name" required>
			<input type="text" name="price" placeholder="Price" required>
			<input type="text" name="category" placeholder="Category" required>
			<input type="submit" name="twitter_kek" value="twitter_kek">
		</form>
	</div>
	<?php endif ?>

	<?php
	if (isset($_POST["bumbum"])) {
		$conn = mysqli_connect('localhost:3306', 'root2', '123456', 'rush00');
		$sql = "DROP DATABASE rush00";
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		}
		mysqli_close($conn);
	}
	?>

	<?php if (isset($_POST['dont'])): ?>
	<div class="col">
		<form method="POST">
			<input style="background-color: red" type="submit" name="bumbum" value="DO NOT PRESS!!!!!">
		</form>
	</div>
	<?php endif ?>
<?php endif ?>

</body>
</html>