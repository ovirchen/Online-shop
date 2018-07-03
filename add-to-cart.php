<?php
require_once "globals.php";
session_start();

$_SESSION['cart'][] = $_GET["product_id"];

if (isset($_GET['category_id']))
    {
    header("Location: http://localhost:8888/?category_id=". $_GET['category_id']);
    exit();
}
else
    header("Location: $BASE_URL");
