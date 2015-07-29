<?php
session_start();
ob_start();
$page_title = "Home";

require "includes/header.php";
require "includes/nav.php";
require "includes/dbConnect.php";
?>

<div class="main-content">
	<!--begin back to top-->
	<div class="on" id="toTop">
		<a href="#"><span class="glyphicon glyphicon-arrow-up">Top</span></a>
	</div>
	<!--end back to top-->
	<div class="container">
		<div class="row">

			<div id="showcase" class="col-sm-12">
				<img src="images/banner.png" alt="pizza" class="img-responsive">
			</div>

			<div class="target-ads col-sm-12">
				<!--begin menu item-->
				<div id="menu" class="target-content col-sm-4">
					<img src="images/pizza_nobackground2.png" alt="pizza" class="img-responsive">
					<a href="menu.php">
						<div class="target-content-btn">
							Our Menu
						</div>
					</a>

				</div>
				<!--End menu item-->

				<!--begin order item-->
				<div id="order" class="target-content col-sm-4">
					<img src="images/order_online.png" alt="order online" class="img-responsive">
					<a href="order.php">
						<div class="target-content-btn">
							Order Online
						</div>
					</a>

				</div>
				<!--End order item-->

				<!--begin location item-->
				<div id="location" class="target-content col-sm-4">
					<img src="images/location.png" alt="location" class="img-responsive">
					<a href="location.php">
						<div class="target-content-btn">
							Location
						</div>
					</a>

				</div>
				<!--End location item-->

			</div>
			<!--End target ads-->

		</div>
		<!--end row-->

		<div class="row">
			<h3><b>Coupons</b></h3>
			<div id="tabs" class="coupons">
				<ul>
					<li><a href="#tabs-1">Buy 1 Get 1</a></li>
					<li><a href="#tabs-2">Couples</a></li>
					<li><a href="#tabs-3">Family</a></li>
				</ul>

				<div id="tabs-1">
					<p>Come in to our fine establishment and present the CODE: <b>BUY1GET1</b> and get a free pizza with the purchase of any pizza of equal or lesser value.</p>
				</div>
				<div id="tabs-2">
					<p>This coupon is just for couples. Come down to our establishment and present the CODE: <b>COUPLES</b> and get 1 large 2 topping pizza, 2 drinks, and 2 salads for $19.99</p>
				</div>
				<div id="tabs-3">
					<p>Here at pizza.com we are all about family. That's why we are offering 2 large 2 topping pizzas, 4 drinks, and 4 salads for $26.99. Just use the CODE: <b>FAMILY</b></p>
				</div>
			</div>
		</div>

	</div>
	<!--End container-->
</div>
<!--End main-content-->

<?php
require "includes/footer.php";
ob_flush();
mysqli_close($dbc);
?>
