<?php
	session_start();
	require_once("conf.php");
	$error = '';

	if (isset($_POST['submit'])) {
		if (empty($_POST['email']) || empty($_POST['password'])) {
			var_dump('failed');
			$error = "Username or Password is invalid";
		}
		else{
			// var_dump("truing");
			$email = $_POST['email'];
			$password = $_POST['password'];
			$query = "SELECT * FROM facebook_securelogin WHERE email = '$email' and password = UNHEX(SHA2('$password',256))";
			$stmt = mysqli_query($con, $query);
			$row = $stmt->fetch_assoc();
			// var_dump($row);
			// exit();
			if($row) {
				$_SESSION['data'] = $row["name"];
				$_SESSION['user'] = $row["user"];
				$_SESSION['login_user'] = $email; // Initializing Session
				header("location: ../index.php"); // Redirecting To Profile Page
			}
			else{
				header("location: ../login-page.php");
			}
		}
	}
?>