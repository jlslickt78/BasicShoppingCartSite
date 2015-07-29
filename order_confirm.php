<?php
session_start();
ob_start();
$page_title = "Order confirm";

require "includes/header.php";
require "includes/nav.php";
require "includes/dbConnect.php";
require "includes/cartFunctions.php";
require "includes/utilities.php";

if ($_REQUEST['command'] == 'update') {
	$first_name = $_REQUEST['first_name'];
	$last_name = $_REQUEST['last_name'];
	$address = $_REQUEST['address'];
	$phone = $_REQUEST['phone'];
	$email = $_REQUEST['email'];

	$customer = "INSERT INTO customers values(null,'$first_name', '$last_name', '$address', '$phone', '$email', null)";

	$customer_insert = mysqli_query($dbc, $customer);
	$customer_id = $dbc->insert_id;

	$order = "INSERT INTO orders values(null ,null,'$customer_id')";
	$order_insert = mysqli_query($dbc, $order);
	$order_id = $dbc->insert_id;

	$max = count($_SESSION['cart']);
	for ($i = 0; $i < $max; $i++) {
		$product_id = $_SESSION['cart'][$i]['product_id'];
		$quantity = $_SESSION['cart'][$i]['quantity'];
		$price = get_price($product_id);
		$order_details = "INSERT INTO order_detail values ($order_id, $product_id, $quantity, $price)";
		mysqli_query($dbc, $order_details);
	}
	Header("Location:order_confirmed.php");
	?>

<?php
}
?>
<script>
	function validate() {
		var form = document.form1;
		if (form.first_name.value == '') {
			alert('Your first name is required');
			form.first_name.focus();
			return false;
		}else if(form.last_name.value == ''){
			alert('Your last name is required')
			form.last_name.focus();
			return false;
		}else if(form.address.value == ''){
			alert('Your address is required')
			form.address.focus();
			return false;
		}else if(form.phone.value == ''){
			alert('Your phone number is required')
			form.phone.focus();
			return false;
		}else if(form.email.value == ''){
			alert('Your email is required')
			form.email.focus();
			return false;
		}
		form.command.value = 'update';
		form.submit();
	}
</script>

<div class="main-content">
	<div class="container">
		<div class="row">
			<!-- begin breadcrumbs -->
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="menu.php">Menu</a></li>
				<li><a href="order.php">Order</a></li>
				<li>Confirm Order</li>
			</ul>
			<!-- end breadcrumbs -->
			<div class="confirm-order-heading page-header">
				<h3>Billing Info
				<span class="pull-right">Order Total: <b><?= get_order_total() ?></b></span>
				</h3>

			</div>

			<div class="confirm-order-container col-sm-12">
				<form name="form1" onsubmit="return validate()" class="form-horizontal">
					<input type="hidden" name="command"/>

					<div class="form-group">
						<label for="first_name" class="col-sm-2 control-label">First Name:</label>

						<div class="col-sm-10">
							<input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $_POST['first_name']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="last_name" class="col-sm-2 control-label">Last name:</label>

						<div class="col-sm-10">
							<input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $_POST['last_name']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="address" class="col-sm-2 control-label">Address:</label>

						<div class="col-sm-10">
							<input type="text" name="address" id="address" class="form-control" value="<?php echo $_POST['address']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="phone" class="col-sm-2 control-label">Phone:</label>

						<div class="col-sm-10">
							<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $_POST['phone']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email:</label>

						<div class="col-sm-10">
							<input type="text" name="email" id="email" class="form-control" value="<?php echo $_POST['email']; ?>">
						</div>
					</div>

					<div class="form-group">
						<input type="submit" value="Place Order" class="form-btn btn pull-right">
					</div>

				</form>
			</div>
		</div>
	</div>
</div>