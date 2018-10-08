<?php
session_start();
include ('install.php');
include('server.php');
include ('basket_cookie.php');
require_once('navbar.php');
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
    <table border="1" width="100%"><tr><td></td><td style='padding: 10px;text-align: center;'>Name</td><td  style='padding: 10px; padding-right: 20px;padding-left: 20px;text-align: center;'>Detali</td><td width="400px" style='padding: 10px;text-align: center;'>Price</td><td style='padding: 10px; padding-right: 20px;padding-left: 20px;text-align: center;'></td></tr>
        <?php
        if (isset($_GET['category']))
        {
            $category = $_GET['category'];
            $sql = "SELECT * FROM product WHERE category = '$category'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td width='400px'><img style='min-width: 10px;max-width: 100px; padding: 10px' src=".$row['img']."></td><td width='300px' style='padding: 10px;text-align: center;'>".$row['prod_name']."</td><td></td><td style='padding: 10px; padding-right: 20px;padding-left: 20px;text-align: center;'>".$row['price']."</td><td><a  style='padding: 10px; padding-right: 20px;padding-left: 20px;text-align: center; align-items: center; width: 30%' href='index.php?basket=".$row['id']."'><input style='width: 40%;' type='submit' value='Add'></a></td></tr>";
                }
            } else
                echo "<p>There is nothing to show!</p>";
        }
        else {
            $sql = "SELECT * FROM product";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td width='400px'><img style='min-width: 10px;max-width: 100px; padding: 10px' src=".$row['img']."></td><td width='300px' style='padding: 10px;text-align: center;'>".$row['prod_name']."</td><td></td><td style='padding: 10px; padding-right: 20px;padding-left: 20px;text-align: center;'>".$row['price']."</td><td><a  style='padding: 10px; padding-right: 20px;padding-left: 20px;text-align: center; align-items: center; width: 30%' href='index.php?basket=".$row['id']."'><input style='width: 40%;' type='submit' value='Add'></a></td></tr>";
                }
            }
        }
        ?>
    </table>
</body>
</html>
