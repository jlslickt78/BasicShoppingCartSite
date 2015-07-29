<?php
ob_start();
session_start();
$page_title = "Admin";
require "includes/header.php";
require "includes/nav.php";

if(!isset($_SESSION['admin_user'])){
	Header("Location:index.php");
}
?>

<div class="main-content">
	<div class="container" id="adminPanel">
		<div class="row">
			<!--begin breadcrumbs-->
			<ul class="breadcrumb">
				<li>You are here:</li>
				<li><a href="index.php">Home</a></li>
				<li class="active">&rArr;<?php echo $page_title; ?></li>
			</ul>
			<!--end breadcrumbs-->
			<div class="col-sm-12">
				<h2>Admin <?php echo $_SESSION['first_name'];?></h2>
				welcome to your admin page
			</div>
			</div>
		</div>
	</div>

<?php
require "includes/footer.php";
ob_flush();
?>
