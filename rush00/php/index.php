<?php
include ('install.php');
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
	<?php if (isset($_SESSION['success'])): ?>
		<div class="error success">
			<h3>
				<?php
				echo $_SESSION['success'];
				unset($_SESSION['success']);
				?>
			</h3>
		</div>
	<?php endif ?>
	<div class="catalouge">
		<?php
			if (isset($_GET['category']))
			{
				$category = $_GET['category'];
				$sql = "SELECT * FROM product WHERE category = '$category'";
				$result = mysqli_query($con, $sql);
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)){
						echo "<li style='list-style-type: none; font-family:verdana; font-size:22px; padding-top:10px;padding-bottom:10px;'>".$row['prod_name']." - ".$row['price']." <a href='basket.php?basket=".$row['id']."''>+</a></li>";
						echo '<img width="200" src="'.$row['img'].'"/>'; 
						
					}
				} else
					echo "<p>There is nothing to show!</p>";
			} else {
				$sql = "SELECT * FROM product";
				$result = mysqli_query($con, $sql);
				if (mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result)){
						echo "<li style='list-style-type: none; font-family:verdana; font-size:22px; padding-top:10px;padding-bottom:10px;'>".$row['prod_name']." - ".$row['price']." <a href='basket.php?basket=".$row['id']."''>+</a></li>";
						echo '<img width="200" src="'.$row['img'].'"/>'; 
					}
				}
			}
		?>
	</div>
</body>
</html>
