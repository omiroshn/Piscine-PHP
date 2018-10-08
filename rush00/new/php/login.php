<?php
session_start();
include('server.php');
require_once('navbar.php');
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
				<input type="text" name="login" placeholder="Username" maxlength="100" value="<?php echo($login) ?>" required>
				<input type="password" name="passwd" placeholder="Password" maxlength="100" required>
				<input type="submit" style="background-color: #229a17;" name="submit_but" value="Login">
			</div>

		</div>
	</form>
</div>

<div class="container">
	<div class="row">
		<div class="col">
			<a href="register.php" style="color:white; background-color: #229a17;" class="btn">Sign up</a>
            <a href="forgotpass.php" style="color:white;background-color: #229a17;" class="btn">Forgot password?</a>
		</div>
	</div>
</div>
</body>
</html>