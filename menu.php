<?php
session_start();
ob_start();
$page_title = "Menu";

require "includes/header.php";
require "includes/nav.php";
require "includes/dbConnect.php";
require "includes/cartFunctions.php";

if ($_REQUEST['command'] == 'add' && $_REQUEST['product_id'] > 0) {
	$product_id = $_REQUEST['product_id'];
	addtocart($product_id, 1);
	header("location:order.php");
	exit();
}
?>
	<script>
		function addtocart(product_id) {
			document.form1.product_id.value = product_id;
			document.form1.command.value = 'add';
			document.form1.submit();
		}
	</script>


	<div class="main-content">
		<form name="form1">
			<input type="hidden" name="product_id"/>
			<input type="hidden" name="command"/>
		</form>

		<!--begin back to top-->
		<div class="on" id="toTop">
			<a href="#"><span class="glyphicon glyphicon-arrow-up">Top</span></a>
		</div>
		<!--end back to top-->
		<div class="container">
			<div class="row">
				<!-- begin breadcrumbs -->
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>Menu</li>
				</ul>
				<!-- end breadcrumbs -->
				<div class="dialog">
					You can Drag and Drop menu items to sort them.
				</div>

				<ul id="accordion" class="col-sm-12">
					<li class="products">
						<div>Premium Pizzas</div>
						<ul class="sortable">
						<?php
						$sqlCommand = "SELECT * FROM products WHERE type = 'pizza'";
						$result = mysqli_query($dbc, $sqlCommand);
						while ($row = mysqli_fetch_array($result)) {
							$content = $row['product_description'];
							$trunContent = substr($content, 0, 200) . '...';
							?>
							<li class="product col-sm-12">
								<div class="col-sm-4">
									<img src="<?= $row['product_image'] ?>" alt="product_image"
									     class="product-image img-thumbnail img-responsive">
								</div>


								<div class="product-details col-sm-8">
									<h3 class="product-title"><?= $row['product_name'] ?></h3>

									<p><?= $trunContent ?></p>
									<span class="product-price">Price: $<?= $row['product_price'] ?></span>
									<br>
<!--									<input type="button"  class="product-add"
									       onclick="addtocart(<?/*= $row['serial'] */?>)"/>-->
									<button class="product-add" onclick="addtocart(<?=$row['serial']?>)"></button>
								</div>
								<!--End product pizza details-->

							</li>
							<!--End menu item-->
						<? } ?>
						</ul>
					</li>

					<li class="products">
						<div>Salad</div>
						<ul class="sortable">
							<?php
							$sqlCommand = "SELECT * FROM products WHERE type = 'salad'";
							$result = mysqli_query($dbc, $sqlCommand);
							while ($row = mysqli_fetch_array($result)) {
								$content = $row['product_description'];
								$trunContent = substr($content, 0, 200) . '...';
								?>
								<li class="product col-sm-12">
									<div class="col-sm-4">
										<img src="<?= $row['product_image'] ?>" alt="product_image"
										     class="product-image img-thumbnail img-responsive">
									</div>


									<div class="product-details col-sm-8">
										<h3 class="product-title"><?= $row['product_name'] ?></h3>

										<p><?= $trunContent ?></p>
										<span class="product-price">Price: $<?= $row['product_price'] ?></span>
										<br>
<!--										<input type="button" value="Add to Cart" class="product-add btn form-btn"
										       onclick="addtocart(<?/*= $row['serial'] */?>)"/>-->
										<button class="product-add" onclick="addtocart(<?=$row['serial']?>)"></button>
									</div>
									<!--End product salad details-->

								</li>
							<?php } ?>
						</ul>
					</li>

					<li class="products">
						<div>Drinks</div>
						<ul class="sortable">
							<?php
							$sqlCommand = "SELECT * FROM products WHERE type = 'drink'";
							$result = $dbc->query($sqlCommand);
							while ($row = mysqli_fetch_array($result)) {
								?>
								<li class="product col-sm-12">
									<div class="col-sm-4">
										<img src="<?= $row['product_image'] ?>" alt="product_image"
										     class="product-image img-thumbnail img-responsive">
									</div>


									<div class="product-details col-sm-8">
										<h3 class="product-title"><?= $row['product_name'] ?></h3>

										<p><?= $row['product_description'] ?></p>
										<span class="product-price">Price: $<?= $row['product_price'] ?></span>
										<br>
<!--										<input type="button" value="Add to Cart" class="product-add btn form-btn"
										       onclick="addtocart(<?/*= $row['serial'] */?>)"/>-->
										<button class="product-add" onclick="addtocart(<?=$row['serial']?>)"></button>
									</div>
								</li>

							<?php } ?>
						</ul>
					</li>
				</ul>
				<!--End order-menu-->

			</div>
			<!--End row-->
		</div>
		<!--End container-->
	</div>

<?php
require "includes/footer.php";
ob_flush();
mysqli_close($dbc);
?>