<?php
session_start();
require_once('navbar.php');
include('server.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
	<form action="register.php" method="post">
		<div class="row">
			<h2 style="text-align:center">Register</h2>
			<?php include('errors.php'); ?>
			<div class="login">
				<input type="text" name="login" placeholder="Username" value="<?php echo($login) ?>">
				<input type="text" name="email" placeholder="Email" value="<?php echo($email) ?>">
				<input type="password" name="passwd" placeholder="Password">
				<input type="password" name="passwd_again" placeholder="Repeat password">
				<input type="submit" name="register_button" value="Register">
			</div>

		</div>
	</form>
</div>
</body>
</html>