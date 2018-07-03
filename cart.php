<?php
require_once "database/database.php";
$products = mysqli_query($mysqli, "SELECT p.*, c.name category FROM products p JOIN categories c ON p.category_id = c.id;");
$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<?php
require_once "header.php";
?>
<main class="cart">
    <table class="cart__table">
        <thead>
        <th></th>
        <th></th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        </thead>
    <?php
    foreach ($products as $product) {
        $formattedPrice = number_format($product['price'], 2);
        $quantity = 0;
        foreach ($_SESSION['cart'] as $session) {
            if ($session == $product['id']) {
                $quantity++;
            }
        }

        if ($quantity) {
            echo <<<PRODUCT
<tr>
<td><a href="/remove-from-cart.php?product_id={$product['id']}">X</a></td>
<td><img height="50" src='{$product['img']}' alt="{$product['name']}"></td>	
<td>{$product['name']}</td>
<td>$$formattedPrice</td>
<td>{$quantity}</td>
</tr>
PRODUCT;
            $totalPrice += $quantity * $formattedPrice;
        }
    }
    ?>
        <tr>
            <td colspan="3"><b>Total:</b></td>
            <td>$<?= number_format($totalPrice, 2)?></td>
            <td></td>
        </tr>
    </table>
    <?php if ($_SESSION['username']): ?>
        <a href="/submit-order.php">Submit Order</a>
    <?php else: ?>
        <span>To submit an order you need to <a href="/login.php">login</a>.</span>
    <?php endif; ?>
</main>
</body>
</html>