<?php
session_start();
ob_start();
$page_title = "Pepperoni";

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
					<li>Pepperoni Pizza</li>
				</ul>

				<div class="pizza-products">
					<div class="pizza-products-lcol col-sm-8">
						<img src="images/PepperoniPizza.png" alt="Pepperoni pizza" class="img-responsive">
					</div>

					<div class="pizza-products-rcol col-sm-4">
						<h2 class="page-header">Premium Pepperoni Pizza</h2>
						<h3>Price: $64.65</h3>

						<p>Our premium pepperoni pizza is made with only the freshest ingredients. We use our made to order
						pizza dough based with a fresh organic red basil sauce. Then we top it with our fresh curdled milk cheese and finally
						we place each pepperoni one and half inch apart and top it again with our yummy cheese. Dig in.</p>
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