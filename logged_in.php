<?php
$page_title = "Logged in";

require "includes/header.php";
require "includes/nav.php";
?>

	<div class="main-content">
		<div class="container">
			<div class="row">

				<div class="logged-in">
					<h1>Your are now logged in!</h1>
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