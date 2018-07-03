<?php
require_once "globals.php";
session_start();
// 		unset($_SESSION['cart']);
// dd();
foreach ($_SESSION['cart'] as $i => $item) {
	if ($item == $_GET['product_id'])
	{
		unset($_SESSION['cart'][$i]);
		break;
	}
	
}
header("Location: $BASE_URL/cart.php");
