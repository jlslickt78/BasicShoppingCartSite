<?php
ob_start();
$page_title = "Register";
require "includes/header.php";
require "includes/nav.php";

//check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//connect to database
	require "includes/dbConnect.php";

	//initialize an error array
	$errors = array();


//validate form data
//first_name
	if (empty($_POST["first_name"])) {
		$errors[] = "You forgot to enter your first name.";
	} else {
		$first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	}

//last_name
	if (empty($_POST["last_name"])) {
		$errors[] = "You forgot to enter your last name.";
	} else {
		$last_name = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}

//email/username
	if (empty($_POST["email"])) {
		$errors[] = "You forgot to enter your email";
	} else {
		$email = mysqli_real_escape_string($dbc, trim($_POST["email"]));
	}

//check for a password and match against the confirmed password
	if (!empty($_POST["pass1"])) {
		if ($_POST["pass1"] != $_POST["pass2"]) {
			$errors[] = "Your passwords did not match";
		} else {
			$password = mysqli_real_escape_string($dbc, trim($_POST["pass1"]));
		}
	} else {
		$errors[] = "You forgot to enter your password";
	}

	//check if user exists
	$customerCheck = "SELECT email FROM customers WHERE email='$email'";
	$result = mysqli_query($dbc, $customerCheck);
	if (mysqli_num_rows($result) == 1) {
		list($emailCheck) = $result->fetch_row();
		$errors[] = "There is already an account with that email address.";
	}


//if everythings ok.
	if (empty($errors)) {
		//register the user in the database
		require "includes/dbConnect.php";

		//make the query
		$sqlCommand = "INSERT INTO users(first_name, last_name, email, password, registration_date) VALUES ('$first_name', '$last_name', '$email', SHA1('$password'), NOW())";

		//run the query
		//$result = @mysql_query($dbc, $query);
		$result = mysqli_query($dbc, $sqlCommand);

		//if it ran ok
		if ($result) {
			echo "<h1>Thank you!</h1>
			<div class='main-content'>
				<div class='container'>
					<div class='row'>
						<div class='order-confirmed'>
							<h1>You are now registered.</h1>
							<h3>An Email has been sent with your login details.</h3>
							<p>Redirecting to the login page.</p>
						</div>
					</div>
				</div>
			</div>";

			$to = $email;
			$subject = "Your Pizza Signup $firstName";
			$message = "<html><body>";
			$message .= "<h2>Here are your login details</h2>";
			$message .= "<p>$email</p>";
			$message .= "<p>$password</p>";
			$message .= "</body></html>";

			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			// Additional headers
			$headers .= "To: $first_name $last_name <$email>\r\n";
			$headers .= "From: Jeff Tartt CIS217-3 Mobile 1 <CIS217-3 Assignment>\r\n";
			//$adminHeaders .= "Cc: kkaren509@gmail.com, brikeyk@live.com\r\n";
			//$adminHeaders .= "Bcc:jlslickt78@yahoo.com\r\n";
			$adminHeaders .= "X-Mailer: PHP/" . phpversion();
			//end client email

			mail($to, $subject, $message, $headers);
			?>

			<script>
			setTimeout(function(){
				window.location = "login_form.php";
			}, 2000);
			</script>

		<?php
		} else {
			//public message
			echo "<h1>System Error</h1>
			<p class='error'>You counld not be registered due to a system error. We apologize for any inconvenience.</p>";

			//debugging message
			echo "<p>" . mysqli_error($dbc) . "<br><br>Query:" . $sqlCommand . "</p>";
		}
		//end of if ($result)

		//close dtatbase connection
		mysqli_close($dbc);

		//include footer and quit script
		require "includes/footer.php";

	/*	Header("Location:index.php");*/

		exit();

		//report errors
	} else {
		echo "<div class='main-content'><div class='container'><div class='row'><h1>Error!</h1>
	<p class='error'>The following error(s) occured:<br>";
		foreach ($errors as $msg) { //print each error
			echo " - $msg<br>\n";
		}
		echo "</p><p>Please try again.</p><p><br></p></div></div></div>";
	}
	//end of if(empty($errors))

	mysqli_close($dbc); //close database connection
}//end of submit conditional
?>
	<div class="main-content">
		<div class="container">
				<!-- begin breadcrumbs -->
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li><a href="login_form.php">Login</a></li>
					<li>Register</li>
				</ul>
				<!-- end breadcrumbs -->
				<div class="col-sm-12">

					<!--begin registration form-->
					<form action="register.php" method="post" class="form-horizontal" role="form">
						<h2 class="page-header">Register</h2>

						<div class="form-group">
							<label for="first_name" class="col-sm-2 control-label">First Name:</label>
							<div class="col-sm-10">
								<input type="text" name="first_name" id="first_name" class="form-control"
								       value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"/>
							</div>
						</div>

						<div class="form-group">
							<label for="last_name" class="col-sm-2 control-label">Last Name:</label>
							<div class="col-sm-10">
								<input type="text" name="last_name" id="last_name" class="form-control"
								       value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"/>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">Email:</label>
							<div class="col-sm-10">
								<input type="text" name="email" id="email" class="form-control"
								       value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/>
							</div>
						</div>

						<div class="form-group">
							<label for="pass1" class="col-sm-2 control-label">Password:</label>
							<div class="col-sm-10">
								<input type="password" name="pass1" id="pass1" class="form-control"
								       value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"/>
							</div>
						</div>

						<div class="form-group">
							<label for="pass2" class="col-sm-2 control-label">Confirm Password:</label>
							<div class="col-sm-10">
								<input type="password" name="pass2" id="pass2" class="form-control"
								       value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"/>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-12">
								<input type="submit" name="submit" class="btn
							pull-right form-btn" value="Register"/>
							</div>
						</div>
					</form>
					<!--begin registration form-->

				</div>
				<!--end column-->
		</div>
		<!--end container-->
	</div>
	<!-- end mainContent-->
<?php
require "includes/footer.php";
ob_flush();
?>