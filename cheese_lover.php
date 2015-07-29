<?php
session_start();
ob_start();
$page_title = "Cheese Lover";

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
					<li>Cheese Lover Pizza</li>
				</ul>

				<div class="pizza-products">
					<div class="pizza-products-lcol col-sm-8">
						<img src="images/cheese_lover.png" alt="cheese lover pizza" class="img-responsive">
					</div>

					<div class="pizza-products-rcol col-sm-4">
						<h2 class="page-header">Premium Cheese Lover</h2>
						<h3>Price: $54.99</h3>

						<p>You like cheese huh! Well we got what you want right here. Our famous cheese lover pizza is gonna make you cry.
						First we use our special made to order dough and base it with delicious red sauce. Then we use a bulldozer and plow the cheese
						on top. Our cheese is curdled right here in our slaughter house in the stomachs of the animals we get our meat from.</p>
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