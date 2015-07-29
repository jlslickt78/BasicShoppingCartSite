<?php
session_start();
ob_start();
$page_title = "Chef Salad";

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
					<li>Chef Salad</li>
				</ul>

				<div class="pizza-products">
					<div class="pizza-products-lcol col-sm-8">
						<img src="images/chef_salad.png" alt="chef salad" class="img-responsive">
					</div>

					<div class="pizza-products-rcol col-sm-4">
						<h2 class="page-header">Premium Chef Salad</h2>
						<h3>Price: $24.99</h3>

						<p>Our chef salads our simply divine. Our salads our shipped from another country and it takes weeks to get here.
						Then we thaw them out in the refrigerator for another week or so. Then when you order one we unwrap the packaging and place it in ours.
						And finally we tell you we made it right here when you order it.</p>
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