<?php
session_start();
ob_start();
$page_title = "Hawaiian";

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
					<li>Hawaiian Pizza</li>
				</ul>

				<div class="pizza-products">
					<div class="pizza-products-lcol col-sm-8">
						<img src="images/HawaiianPizza.png" alt="hawaiian pizza" class="img-responsive">
					</div>

					<div class="pizza-products-rcol col-sm-4">
						<h2 class="page-header">Premium Hawaiian Pizza</h2>
						<h3>Price: $56.99</h3>

						<p>Our premium hawaiian pizza is favorite among all. Made with our one of kind sweat pizza dough then based with a rich organic red pizza sauce
						then topped with our premium aged cheese, then we strategically place each one of our hawaiian grown pineapples along with fresh slaughtered ham and finally covered with our famous cheese.
						Your sure to love this.</p>
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