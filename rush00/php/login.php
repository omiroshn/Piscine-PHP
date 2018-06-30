<?php
session_start();
require_once('navbar.php');
include('server.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/homepage.css">
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div class="container">
	<form method="post" action="login.php">
		<?php include('errors.php'); ?>
		<div class="row">
			<h2 style="text-align:center">Login</h2>

			<div class="login">
				<input type="text" name="login" placeholder="Username" value="<?php echo($login) ?>" required>
				<input type="password" name="passwd" placeholder="Password" required>
				<input type="submit" name="submit_but" value="Login">
			</div>

		</div>
	</form>
</div>

<div class="bottom-container">
	<div class="row">
		<div class="col">
			<a href="register.php" style="color:white" class="btn">Sign up</a>
		</div>
		<div class="col">
			<a href="forgotpass.php" style="color:white" class="btn">Forgot password?</a>
		</div>
	</div>
</div>
</body>
</html>