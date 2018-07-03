<?php
require_once "database/database.php";
session_start();
$products = mysqli_query($mysqli, "SELECT p.*, c.name category FROM products p JOIN categories c ON p.category_id = c.id;");
$categories = mysqli_query($mysqli, "SELECT * FROM categories;");
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
	<title>Pets for everyone</title>
<!--    <link rel="stylesheet" href="/style.css">-->
</head>

<body>
	<?php 
		require_once "header.php";
	?>
	<main class="products">
		<?php 
    	foreach ($products as $product) {
        $formPrice = number_format($product['price'], 2);
            if (isset($_GET['category_id']) == false)
            {
        echo <<<PRODUCT
			<div class="product">
				<img src='{$product['img']}' alt="{$product['name']}">
				<h1>{$product['name']}</h1>
				<p>$ {$formPrice}</p>
				<p>{$product['age']}</p>
				<p> {$product['gender']}</p>
				<button><a href="/add-to-cart.php?product_id={$product['id']}">Add to Cart</a>
                </button>
			</div>
PRODUCT;
            }
            else
            {
                if ($product['category_id'] == $_GET['category_id'])
                {
                 echo <<<PRODUCT
                    <div class="product">
                        <img src='{$product['img']}' alt="{$product['name']}">
                        <h1>{$product['name']}</h1>
                        <p>$ {$formPrice}</p>
                        <p>{$product['age']}</p>
                        <p> {$product['gender']}</p>
                        <button><a href="/add-to-cart.php?product_id={$product['id']}&category_id={$product['category_id']}">Add to Cart</a>
                        </button>
                    </div>
PRODUCT;
                }
                else
                {
                   foreach($categories as $category)
                   {
                       if ($category['id'] == $_GET['category_id'] && $category['name'] === $product['gender'])
                       {
                 echo <<<PRODUCT
                    <div class="product">
                        <img src='{$product['img']}' alt="{$product['name']}">
                        <h1>{$product['name']}</h1>
                        <p>$ {$formPrice}</p>
                        <p>{$product['age']}</p>
                        <p> {$product['gender']}</p>
                        <button><a href="/add-to-cart.php?product_id={$product['id']}&category_id={$_GET['category_id']}">Add to Cart</a>
                        </button>
                    </div>
PRODUCT;
                       }
                   }
                }
            }
    	}
		 ?>
	</main>
</body>
</html>
