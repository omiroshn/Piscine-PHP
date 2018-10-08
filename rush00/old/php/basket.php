<?php
session_start();
require_once('navbar.php');
include('server.php');

	$user_id = session_id();
	if (isset($_GET['basket']))
	{
		$id = $_GET['basket'];
		$sql = "SELECT * FROM basket WHERE product_id = '$id' AND user_id = '$user_id'";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
			mysqli_query($con, "UPDATE basket SET amount = amount + 1 WHERE product_id = '$id' AND user_id = '$user_id'");
		}
		else {
			mysqli_query($con, "INSERT INTO basket (product_id, amount, user_id) VALUES ('$id', 1, '$user_id')");
		}
		header("Location: basket.php");
	}

	$sql = "SELECT prod_name, amount, price FROM basket, product WHERE user_id = '$user_id' AND product.id = basket.product_id";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo "<li>".$row['prod_name']." - amount: ".$row['amount'].", price: ".$row['amount'] * $row['price']."$</li>";
		}
		if (!empty($_SESSION['username'])){
			echo "<form method='post'><input type='submit' name='check' value='Check out'></form>";
			if (isset($_POST['check'])) {
				mysqli_query($con, "UPDATE user SET check_out = 1 WHERE basket_id = '$user_id'");
			}
				
		}
		else {
			echo "<p>Login to check out</p>";
		}
	} else {
		echo "<p>Basket is empty!</p>";
	}

?>

<!DOCTYPE html>
<html>
<body>
<form method="post">
	<input type="submit" name="delete" value="Delete products">
	<?php
		if (isset($_POST['delete'])) {
			mysqli_query($con, "DELETE FROM basket WHERE user_id = '$user_id'");
			header("Location: basket.php");
		}
	?>
</form>
</body>
</html>