<?php

ob_start();
$page_title = "Login";
require "includes/header.php";
require "includes/nav.php";
require "includes/utilities.php";

$admin_user = "jeff";
$admin_email = "jlslickt78@yahoo.com";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	require "includes/dbConnect.php";

	//initialize some variables
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	//check for data in input boxes
	if (empty($email)) {
		$email_error = CreateErrorMsg("Please enter your email.");
	} else {
		$email = mysqli_real_escape_string($dbc, $email);
	}

	if (empty($pass)) {
		$pass_error = CreateErrorMsg("Please enter your password.");
	} else {
		$pass = mysqli_real_escape_string($dbc, $pass);
	}

	$sqlCommand = "SELECT first_name, email, password, status FROM users WHERE email='$email' AND password=sha1('$pass')";
	$result = mysqli_query($dbc, $sqlCommand);

	list($first_name, $db_email, $db_pass, $status) = $result->fetch_row();


	if($db_pass != $pass || $db_email != $email){
		$login_error = CreateErrorMsg("Email and pass doesn't match!");
	}

	include "login_form.php";

	if (mysqli_num_rows($result) == 1) {
			session_start();

			if($status == 0) {
			$_SESSION['first_name'] = $first_name;
			$_SESSION['user_email'] = $db_email;


			Header("Location:logged_in.php");
			exit;
		}
	}

	mysqli_close($dbc);
}
ob_flush();
$dbc->close();
?>
