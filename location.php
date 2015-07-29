<?php
session_start();
ob_start();
$page_title = "Location";

require "includes/header.php";
require "includes/nav.php";
?>

<div class="main-content">
	<div class="container">
		<div class="row">
			<!-- begin breadcrumbs -->
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li>Location</li>
			</ul>
			<!-- end breadcrumbs -->
			<div class="page-header">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d85980.7901468753!2d-117.41009001354294!3d47.666945005376355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x549e185c30bbe7e5%3A0xddfcc9d60b84d9b1!2sSpokane%2C+WA!5e0!3m2!1sen!2sus!4v1414190148612" width="1170" height="340" frameborder="0" style="border:0"></iframe>
			</div>


			<div class="col-sm-4">
				<img src="images/pizzaShop.png" alt="pizza shop" class="img-thumbnail img-responsive">
			</div>

			<div class="col-sm-8">
				<p>Pizza.com is located in the heart of Spokane WA.</p>
				<address>0000 A Street Spokane Wa, 99201</address>
				<cite>509-GET-PIZZA</cite>
			</div>
		</div>
	</div>
</div>

<?php
require "includes/footer.php";
ob_flush();
?>