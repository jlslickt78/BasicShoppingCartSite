<?php
session_start();
require "includes/dbConnect.php";
if(isset($_SESSION['first_name'])){
	echo "something works";
}
?>