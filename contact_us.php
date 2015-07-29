<?php
session_start();
ob_start();
$page_title = "Home";

require "includes/header.php";
require "includes/nav.php";
require "includes/utilities.php";

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

/*phone number*/
	if (empty($_POST["phone"])) {
		$errors[] = "You forgot to enter your phone number";
	} else {
		$phone = mysqli_real_escape_string($dbc, trim($_POST["phone"]));
	}

	$contactMe = mysqli_real_escape_string($dbc, trim($_POST['contactMe']));
		$contactEmail = ($contactMe == "contactEmail") ? 'checked="checked' : '';
		$contactPhone = ($contactMe == "contactPhone") ? 'checked="checked' : '';

	/*contact reason*/


	$question = mysqli_real_escape_string($dbc, trim($_POST['question']));

	/*if everything is ok*/
	if(empty($errors)){
		require "includes/dbConnect.php";

		$sqlCommand = "INSERT INTO contact (first_name, last_name, email, phone, contactMe, reason, question) VALUES ('$first_name', '$last_name', '$email', '$phone', '$contactMe', '$reason', '$question')";
		$result = mysqli_query($dbc, $sqlCommand);

		if($result){
			echo "<h1>Thank you!</h1>
			<div class='main-content'>
				<div class='container'>
					<div class='row'>
						<div class='order-confirmed'>
							<h1>We have received your information</h1>
							<h3>A representative will be in contact with you shortly.</h3>
							<p>Redirecting to the Home page.</p>
						</div>
					</div>
				</div>
			</div>";
			?>
			<script>
				setTimeout(function(){
					window.location = "index.php";
				}, 2000);
			</script>
		<?php
		}else{
			//public message
			echo "<h1>System Error</h1>
			<p class='error'>We apologize for any inconvenience.</p>";

			//debugging message
			echo "<p>" . mysqli_error($dbc) . "<br><br>Query:" . $sqlCommand . "</p>";
		}//end if result

		mysqli_close($dbc);
		//include footer and quit script
		require "includes/footer.php";
		exit();

		//report errors
	}else{
		echo "<div class='main-content'><div class='container'><div class='row'><h1>Error!</h1>
		<p class='error'>The following error(s) occured:<br>";
		foreach ($errors as $msg) { //print each error
			echo " - $msg<br>\n";
		}
		echo "</p><p>Please try again.</p><p><br></p></div></div></div>";
	}//end of if(empty($errors))

	mysqli_close($dbc);
}
?>

<div class="main-content">
	<!--begin back to top-->
	<div class="on" id="toTop">
		<a href="#"><span class="glyphicon glyphicon-arrow-up">Top</span></a>
	</div>
	<!--end back to top-->
	<div class="container">
			<!-- begin breadcrumbs -->
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li>Contact us</li>
			</ul>
			<!-- end breadcrumbs -->


			<form action="contact_us.php" method="post" class="form-horizontal" role="form" id="contact-form">
				<!--first name-->
				<div class="form-group">
					<label for="first_name" class="col-sm-2 control-label">First Name:</label>
					<div class="col-sm-10">
						<input type="text" name="first_name" id="first_name" class="form-control"
						       value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"/>
					</div>
				</div>
				<!--End first name-->

				<!--last name-->
				<div class="form-group">
					<label for="last_name" class="col-sm-2 control-label">Last Name:</label>
					<div class="col-sm-10">
						<input type="text" name="last_name" id="last_name" class="form-control"
						       value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"/>
					</div>
				</div>
				<!--End last name-->

				<!--email-->
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email:</label>
					<div class="col-sm-10">
						<input type="text" name="email" id="email" class="form-control"
						       value="<?php if (isset($_POST['email'])) echo $email; ?>"/>
					</div>
				</div>
				<!--End email-->

				<!--phone number-->
				<div class="form-group">
					<label for="phone" class="col-sm-2 control-label">Phone:</label>
					<div class="col-sm-10">
						<input type="tel" name="phone" id="phone" class="form-control"
						       value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"/>
					</div>
				</div>
				<!--End phone number-->

				<!--contact method-->
				<div class="preferred-contact">
					<span><b>Preferred Contact Method</b></span>
					<div class="rdo-contact-me">
							<input type="radio" name="contactMe" id="contactEmail" value="contactEmail" <?php echo $contactEmail ?> checked>
							<label for="contactEmail" class="radio-inline">Email</label>

							<input type="radio" name="contactMe" id="contactPhone" value="contactPhone" <?php echo $contactPhone ?>>
							<label for="contactPhone" class="radio-inline">Phone</label>
					</div>
				</div>

				<!--End contact method-->

				<!--reason for contact-->
				<div class="contact-reason">
<!--					<?php
/*					$selectedReason = $_POST["contactReason"];
					$contactReason = ["Pizza", "Salad", "Drinks", "Tech issue"];
					$selectedString = selectedOptions("contactReason", $contactReason, $selectedReason);
					$reason = selectedOptions("contactReason", $contactReason, $selectedReason);
					*/?>
					<span class="page-header"><b>Reason for Contact</b></span>
					<div><?php /*echo $selectedString; echo $selectedReason*/?></div>-->

					<label for="contactReason">Contact Reason</label>
					<br>
					<select name="contactReason" id="contact-reason-select">
						<option>Pizza</option>
						<option>Salad</option>
						<option>Drinks</option>
						<option>Tech Issue</option>
					</select>
				</div>

				<!--End reason for contact-->

				<!--customer question-->
				<div class="customer-question">
					<label for="question">Enter your Question</label>
					<textarea name="question" id="question" class="form-control" rows="3"><?php echo $question?></textarea>
				</div>

				<!--End customer question-->

				<!--submit-->
				<div class="btn-group pull-right">
					<input type="button" id="contact-submit" class="contact-submit" value="Submit">
					<input type="button" id="contact-cancel" class="contact-cancel" value="Cancel">
				</div>

				<!--End submit-->
			</form>

	</div>
<!--End container-->
</div>
<!--End main-content-->

<?php
require "includes/footer.php";
ob_flush();
?>