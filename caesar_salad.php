<?php
session_start();
ob_start();
$page_title = "Caesar Salad";

require "includes/header.php";
require "includes/nav.php";
?>

	<div class="main-content">
		<!--begin back to top-->
		<div class="on" id="toTop">
			<a href="#"><span class="glyphicon glyphicon-arrow-up">Top</span></a>
		</div>
		<!--end back to top-->
		<div class="container">
			<div class="row">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li><a href="menu.php">Menu</a></li>
					<li>Caesar Salad</li>
				</ul>

				<div class="pizza-products">
					<div class="pizza-products-lcol col-sm-8">
						<img src="images/caesar_salad.png" alt="caesar salad" class="img-responsive">
					</div>

					<div class="pizza-products-rcol col-sm-4">
						<h2 class="page-header">Premium Caesar Salad</h2>
						<h3>Price: $24.99</h3>

						<p>Our premium caesar salad is loaded with organic vegetables pick every morning by our children. We only use peticides that are harmful to animals
						and only use the best quality hormones, so that they big and plump. We top our salads with homemade dressing that is made right here in the store.
						you're gonna love this, I promise.</p>
					</div>
				</div>
				<!--End pizza-products-->
			</div>
			<!--End row-->
		</div>
		<!--End container-->
	</div>
	<!--End main-content-->

<?php
require "includes/footer.php";
ob_flush();
?>