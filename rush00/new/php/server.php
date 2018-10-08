<?php
require_once('db_connect.php');
$login = "";
$email = "";
$errors = array();

if (isset($_POST['register_button'])) {
	$login = mysqli_real_escape_string($con, $_POST['login']);
	$passwd = mysqli_real_escape_string($con, $_POST['passwd']);
	$passwd_again = mysqli_real_escape_string($con, $_POST['passwd_again']);
	$email = mysqli_real_escape_string($con, $_POST['email']);

	if (empty($login)) {
		array_push($errors, "Username is required");
	}
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($passwd)) {
		array_push($errors, "Password is required");
	}
	if ($passwd != $passwd_again) {
		array_push($errors, "Two passwords don't match");
	}
	if (!preg_match("/^[a-zA-Z]*$/", $login)) {
		array_push($errors, "Invalid characters");
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		array_push($errors, "Invalid email");
	}
	if (count($errors) == 0) {
		$user_check_query = "SELECT * FROM user WHERE login='$login'";
		$email_check_query = "SELECT * FROM user WHERE  email='$email'";
		$result = mysqli_query($con, $user_check_query);
		$resultCheck = mysqli_fetch_assoc($result);
		$result2 = mysqli_query($con, $email_check_query);
		$resultCheck2 = mysqli_fetch_assoc($result2);

		if ($resultCheck > 0) {
			array_push($errors, "User already taken");
		}
		if ($resultCheck2 > 0) {
			array_push($errors, "Email already taken");
		}
	}
	if (count($errors) == 0) {
		$passwd = hash("whirlpool", $passwd);
		$root = 0;
		$ses_id = hash('whirlpool', $login);
		setcookie(hash('whirlpool', 'shop'.$login),serialize(array($login=>1)));
		$sql = "INSERT INTO user(login, password, email, root, basket_id) VALUES ('$login', '$passwd', '$email', '$root', '$ses_id')";
		mysqli_query($con, $sql);
		$_SESSION['username'] = $login;
		$_SESSION['root'] = $root;
		$_SESSION['success'] = "You are now logged in";
		header("Location: index.php");
	}
}

if (isset($_POST['submit_but'])) {
	$login = mysqli_real_escape_string($con, $_POST['login']);
	$passwd = mysqli_real_escape_string($con, $_POST['passwd']);
	if (empty($login)) {
		array_push($errors, "Username is required");
	}
	if (empty($passwd)) {
		array_push($errors, "Password is required");
	}
	if (count($errors) == 0) {
		$sql = "SELECT * from user WHERE login = '$login'";
		$result = mysqli_query($con, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			array_push($errors, "This user doesnt exist");
		}
		else {
		    if ($row = mysqli_fetch_assoc($result)) {
				if ($passwd = hash("whirlpool", $passwd) != $row['password']) {
					array_push($errors, "Wrong password");
				}
				else {
                    $ses_id = hash('whirlpool', $login);
                    if (!isset($_COOKIE[hash('whirlpool', 'shop'.$login)])) {
                        setcookie(hash('whirlpool', 'shop' . $login), serialize(array($login=>1)));
                    }
                    mysqli_query($con,"INSERT INTO user(basket_id) VALUES ('$ses_id')");
					$_SESSION['username'] = $row['login'];
					$_SESSION['root'] = $row['root'];
					$_SESSION['success'] = "You are now logged in";
					header("Location: index.php?login=success");
				}
			}
			else {
				array_push($errors, "The username/password is wrong");
			}
		}
	}
}
?>