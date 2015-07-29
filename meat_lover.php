<?php
session_start();
ob_start();
$page_title = "Meat Lover";

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
					<li>Meat Lover Pizza</li>
				</ul>

				<div class="pizza-products">
					<div class="pizza-products-lcol col-sm-8">
						<img src="images/meatLover.png" alt="meat lovers pizza" class="img-responsive">
					</div>

					<div class="pizza-products-rcol col-sm-4">
						<h2 class="page-header">Premium Meat Lover</h2>
						<h3>Price: $52.99</h3>

						<p>Don't be a chicken. Try our delicious meat lovers pizza. This pizza is the king of pizzas when it comes to meat.
						Each piece of meat on this pizza is carefully placed and butchered right here in the alley behind the store.
						We aren't playing games when it comes to meat.</p>
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