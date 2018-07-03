<?php
require_once "database/database.php";
require_once "utils.php";
$products = mysqli_query($mysqli, "SELECT p.*, c.name category FROM products p JOIN categories c ON p.category_id = c.id;");

session_start();
if (!$_SESSION['username']) {
    redirectTo();
}
mysqli_query($mysqli,"INSERT INTO orders (user_id) VALUES ('{$_SESSION['username']}');");
$orderId = mysqli_insert_id($mysqli);
foreach ($products as $product) {
    $quantity = 0;
    foreach ($_SESSION['cart'] as $session) {
        if ($session === $product['id']) {
            $quantity++;
        }
    }
    if ($quantity) {
        mysqli_query($mysqli, "INSERT INTO ordered_products (order_id, product_id, quantity) VALUES ($orderId, {$product['id']}, $quantity)");
        unset($_SESSION['cart']);
        header("Location: /");
}
}
