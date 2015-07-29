<?php
require "includes/header.php";
require "includes/nav.php";
?>
	<div class="main-content">
		<div class="container">
			<div class="row">
				<!-- begin breadcrumbs -->
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>Login</li>
				</ul>
				<!-- end breadcrumbs -->

				<div class='col-sm-8'>
					<h2 class="page-header">Login</h2>

					<!--begin login form-->
					<form action="login.php" method="post" class="form-horizontal" role="=form">

						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">Email:</label>

							<div class="col-sm-10">
								<input type="text" name="email" id="email" class="form-control"
								       value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"
								       placeholder="email"/><?php echo "<div class='error'>$email_error</div>" ?>
							</div>
						</div>

						<div class="form-group">
							<label for="pass" class="col-sm-2 control-label">Password:</label>

							<div class="col-sm-10">
								<input type="password" name="pass" id="pass" class="form-control"
								       value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>"
								       placeholder="password"/><?php echo "<div class='error'>$pass_error</div>" ?>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-4 col-sm-push-2">
								<a href="#" title="Forgot your password?">Forgot your password?</a>
								<?php echo "<div class='error'>$login_error</div>" ?>
							</div>
							<div class="col-sm-6 pull-right">
								<input type="submit" name="login" class="form-btn btn pull-right"
								       value="Login"/>
							</div>
						</div>
					</form>
					<!--end login form-->
				</div>
				<!--end form container-->

				<div class="not-a-member col-sm-4">
					<h3>Not a Member?</h3>
					<p>Create an account. <a href="register.php" title="Create an account">Register here.</a></p>
				</div>
			</div>
		</div>
	</div>
	<!--end mainContent -->

<?php
require "includes/footer.php";
?>