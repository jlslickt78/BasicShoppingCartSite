<?php

function get_product_name($product_id){
	global $dbc;
	$query = "SELECT product_name FROM products WHERE serial=$product_id";
	$result = $dbc->query($query);
	//$result = mysqli_query($query);
	$row = mysqli_fetch_assoc($result);
	return $row['product_name'];
}

function get_price($product_id){
	global $dbc;
	$query = "SELECT product_price FROM products WHERE serial=$product_id";
	$result = $dbc->query($query);
	//$result = mysqli_query($query);
	$row = mysqli_fetch_assoc($result);
	return $row['product_price'];
}

function remove_product($product_id){
	$product_id = intval($product_id);
	$max = count($_SESSION['cart']);
	for ($i = 0; $i < $max; $i++) {
		if ($product_id == $_SESSION['cart'][$i]['product_id']) {
			unset($_SESSION['cart'][$i]);
			break;
		}
	}
	$_SESSION['cart'] = array_values($_SESSION['cart']);
}

function get_order_total(){
	$max = count($_SESSION['cart']);
	$sum = 0;
	for ($i = 0; $i < $max; $i++) {
		$product_id = $_SESSION['cart'][$i]['product_id'];
		$quantity = $_SESSION['cart'][$i]['quantity'];
		$price = get_price($product_id);
		$sum += $price * $quantity;
	}
	return $sum;
}

function addtocart($product_id, $quantity){
	if ($product_id < 1 or $quantity < 1) return;

	if (is_array($_SESSION['cart'])) {
		if (product_exists($product_id)) return;
		$max = count($_SESSION['cart']);
		$_SESSION['cart'][$max]['product_id'] = $product_id;
		$_SESSION['cart'][$max]['quantity'] = $quantity;
	} else {
		$_SESSION['cart'] = array();
		$_SESSION['cart'][0]['product_id'] = $product_id;
		$_SESSION['cart'][0]['quantity'] = $quantity;
	}
}

function product_exists($product_id){
	$product_id = intval($product_id);
	$max = count($_SESSION['cart']);
	$flag = 0;
	for ($i = 0; $i < $max; $i++) {
		if ($product_id == $_SESSION['cart'][$i]['product_id']) {
			$flag = 1;
			break;
		}
	}
	return $flag;
}

?>