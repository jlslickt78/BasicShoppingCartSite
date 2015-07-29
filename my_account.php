<?php
session_start();
ob_start();
$page_title = "My Account";

require "includes/header.php";
require "includes/nav.php";
require "includes/dbConnect.php";
require "includes/utilities.php";

if(isset($_SESSION['first_name'])){
	$user_email = $_SESSION['user_email'];

	$customer_query = "SELECT * FROM customers WHERE email = '$user_email'";
	$customer_result = mysqli_query($dbc, $customer_query);
	list($customer_num, $first_name, $last_name, $address, $phone, $email, $customer_date) = $customer_result->fetch_row();

	if($customer_num == null){
		echo "<div class='main-content'>
		<div class='container'>
			<div class='row'>
				<div class='logged-in'>
					<h1>Nothing to show you haven't purchased any products.</h1>
				</div>
			</div>
		</div>
	</div>";
	}else{

		?>

		<div class="main-content">
			<div class="container">
				<div class="row">
					<!-- begin breadcrumbs -->
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li>Location</li>
					</ul>
					<!--End bread crumbs-->

					<div class="account-info panel panel-default">
						<div class="panel-heading">
							Account Info
						</div>
						<div class="panel-body">
							<ul>
								<li>Customer ID: <?php echo $customer_num ?></li>
								<li>Name: <?php echo $first_name ." ". $last_name ?></li>
								<li>Address: <?php echo $address ?></li>
								<li>Phone: <?php echo $phone ?></li>
								<li>Email: <?php echo $email ?></li>
								<li></li>
								<li></li>
								<li></li>
							</ul>
						</div>
					</div>


					<div class="table-responsive">
						<table class="shopping-cart table table-bordered clearfix">
							<thead>
							<tr class="shopping-cart-item-heading">
								<th>Order #</th>
								<th>Product #</th>
								<th>Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Date</th>
							</tr>
							</thead>

							<tbody>
							<?php
							$order_query = "SELECT * FROM orders WHERE customer_id = '$customer_num'";
							$order_result = mysqli_query($dbc, $order_query);
							list($order_num, $order_date, $customer_id) = $order_result->fetch_row();

							$order_details_query = "SELECT * FROM order_detail WHERE order_id = '$order_num'";
							$order_details_result = mysqli_query($dbc, $order_details_query);
							list($order_id, $product_id, $quantity, $price) = $order_details_result->fetch_row();

							$products_query = "SELECT * FROM products WHERE serial = '$product_id'";
							$products_result = mysqli_query($dbc, $products_query);
							list($product_num, $product_name, $product_description, $product_price, $product_image) = $products_result->fetch_row();
							?>


							<tr>
								<td><?php echo $order_num?></td>
								<td><?php echo $product_num ?></td>
								<td><?php echo $product_name ?></td>
								<td><?php echo $product_price?></td>
								<td><?php echo $quantity ?></td>

								<td>Date: <?php echo $order_date?></td>
							</tr>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>

<?php

	}

}else{
	Header("Location:index.php");
}

?>



<?php
require "includes/footer.php";
ob_flush();
$dbc->close();
?>