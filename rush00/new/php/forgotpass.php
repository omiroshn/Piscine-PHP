<?php
session_start();
require_once('navbar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Online Shop</title>
	<link rel="stylesheet" href="../css/login.css">
	<link rel="stylesheet" href="../css/homepage.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
	<form>
		<div class="row">
			<h2 style="text-align: center;">Enter your email</h2>
			<?php if (isset($_GET['button'])): ?>
				<div class="error">
				  <p><?php echo "Instructions were sent to your email";?></p>
				</div>
			<?php endif ?>
			<div class="login">
				<input type="text" name="username" placeholder="Email" required>
				<input type="submit" name="button" value="Submit">
			</div>

		</div>
	</form>
</div>
</body>
</html>