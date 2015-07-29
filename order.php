<?php
session_start();
ob_start();
$page_title = "Order";

require "includes/header.php";
require "includes/nav.php";
require "includes/dbConnect.php";
require "includes/cartFunctions.php";
require "includes/utilities.php";

if ($_REQUEST['command'] == 'delete' && $_REQUEST['product_id'] > 0) {
	remove_product($_REQUEST['product_id']);
} else if ($_REQUEST['command'] == 'clear') {
	unset($_SESSION['cart']);
} else if ($_REQUEST['command'] == 'update') {
	$max = count($_SESSION['cart']);
	for ($i = 0; $i < $max; $i++) {
		$product_id = $_SESSION['cart'][$i]['product_id'];
		$quantity = intval($_REQUEST['product' . $product_id]);
		if ($quantity > 0 && $quantity <= 999) {
			$_SESSION['cart'][$i]['quantity'] = $quantity;
		} else {
			$msg = 'Some products not updated!, quantity must be a number between 1 and 999';
		}
	}
}
?>
	<script>
		function del(product_id) {
			if (confirm('Do you really mean to delete this item')) {
				document.form1.product_id.value = product_id;
				document.form1.command.value = 'delete';
				document.form1.submit();
			}
		}

		function clear_cart() {
			if (confirm('This will empty your shopping cart, continue?')) {
				document.form1.command.value = 'clear';
				document.form1.submit();
			}
		}
		function update_cart() {
			document.form1.command.value = 'update';
			document.form1.submit();
		}
	</script>

	<div class="main-content">
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
					<li><a href="menu.php">Menu</a></li>
					<li>Cart</li>
				</ul>
				<!-- end breadcrumbs -->
				<div class="shopping-cart-heading page-header">
					<h3>Your Order
						<input type="button" value="Continue Shopping" onclick="window.location='menu.php'"
						       class="form-btn btn pull-right">
					</h3>
				</div>

				<div class="shopping-cart-container table-responsive">
					<form name="form1" method="post">
						<input type="hidden" name="product_id">
						<input type="hidden" name="command" class="form-control-feedback">

						<table class="shopping-cart table table-bordered clearfix">
							<thead>
							<tr class="shopping-cart-item-heading">
								<th>Items</th>
								<th>Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Amount</th>
								<th>Option</th>
							</tr>
							</thead>

							<tbody>
							<?php
							if (is_array($_SESSION['cart'])) {
								$max = count($_SESSION['cart']);
								for ($i = 0; $i < $max; $i++) {
									$product_id = $_SESSION['cart'][$i]['product_id'];
									$quantity = $_SESSION['cart'][$i]['quantity'];
									$product_name = get_product_name($product_id);

									if ($quantity == 0) continue;
							?>

							<tr>
								<td><?= $i + 1 ?> </td>
								<td><?= $product_name ?></td>
								<td><?= get_price($product_id) ?></td>
								<td><input type="text" name="product<?= $product_id ?>" value="<?= $quantity ?>" maxlength="3"
								           size="2"/>
								</td>
								<td>$ <?= get_price($product_id) * $quantity ?></td>
								<td><a href="javascript:del(<?= $product_id ?>)">Remove</a></td>

								<?php } ?>
							</tr>

							</tbody>
						</table>
					</form>
				</div>
				<div class="order-total">
					<span>Order Total: $<b><?= get_order_total() ?></b></span>
				</div>

				<div class="order-options clearfix">
					<form class="form-inline">
						<div class="form-group">
							<div><?= $msg ?></div>
							<input type="button" value="Clear Cart" onclick="clear_cart()" class="form-btn btn form-control">
							<input type="button" value="Update Cart" onclick="update_cart()" class="form-btn btn form-control">
							<input type="button" value="Place Order" onclick="window.location='order_confirm.php '"
							       class="form-btn btn form-control">
						</div>
					</form>
				</div>

				<?php
				} else {
					echo "<div>
									<span>There are no items in your cart!</span>
									</div>";
				}
				?>


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