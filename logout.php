<?php
ob_start();
session_start();

if(isset($_SESSION['admin_user']) || $_SESSION['cart'] ){
	$_SESSION = array();
	session_destroy();
	Header("Location:index.php");
}

if(!isset($_SESSION['first_name'])){
	Header('Location:index.php');
	ob_clean();
}else{

	$_SESSION = array();
	session_destroy();
	setcookie("PHPSESSID", "", time()-3600, "/", "", 0, 0);

	Header('Location:logged_out.php');
}
ob_flush();
?>