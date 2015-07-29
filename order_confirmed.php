<?php
$page_title = "Order confirmed";

require "includes/header.php";
require "includes/nav.php";
?>

	<div class="main-content">
		<div class="container">
			<div class="row">

				<div class="order-confirmed">
					<h1>Thank you! Your order has been Confirmed</h1>
				</div>
				<script>
					setTimeout(function(){
						window.location = "index.php";
					}, 1000);
				</script>
			</div>
		</div>
	</div>

<?php
require "includes/footer.php";
?>