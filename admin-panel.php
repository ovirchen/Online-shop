<?php
require_once "database/database.php";
$products = mysqli_query($mysqli, "SELECT p.*, c.name category FROM products p JOIN categories c ON p.category_id = c.id;");
$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-image: none; background-color: #ff884d; color:white;">
<?php
require_once "header.php";

$query_pro = mysqli_query($mysqli, "SELECT * FROM `products`");
$query_pro_category = mysqli_query($mysqli, "SELECT * FROM `categories`");

if (isset($_GET['id']))
{
	mysqli_query($mysqli, "DELETE FROM `products` WHERE `id` = '".$_GET['id']."'");
	header("Location: /admin-panel.php");
}
if (isset($_GET['user_del']))
{
    mysqli_query($mysqli, "DELETE FROM `users` WHERE `username` = '".$_GET['user_del']."'");
    header("Location: /admin-panel.php");
}
if (isset($_GET['category_id']))
{
    mysqli_query($mysqli, "DELETE FROM `categories` WHERE `id` = '".$_GET['category_id']."'");
    header("Location: /admin-panel.php");
}

if (isset($_POST['send']))
{
	mysqli_query($mysqli, "INSERT INTO `products` (`name`, `category_id`, `price`, `img`,`gender`, `age`) VALUES ('".$_POST['name']."', '".$_POST['cat_id']."', '".$_POST['price']."', '".$_POST['img']."', '".$_POST['gender']."', '".$_POST['age']."')");
	header("Location: /admin-panel.php");

}
if (isset($_POST['send_category']))
{
    mysqli_query($mysqli, "INSERT INTO `categories` (`id`, `name`) VALUES (NULL, '".$_POST['name_category_cr']."')");
    header("Location: /admin-panel.php");

}
$car_query = mysqli_query($mysqli, "SELECT * FROM `ordered_products`");
$user_query = mysqli_query($mysqli, "SELECT * FROM `users`");

?>
<main class="admin">
    
    <table class="admin__table">
        <h2>Product list:</h2>
        <?php while ($pro = mysqli_fetch_assoc($query_pro)) { ?>
        <tr>
            <td><?php echo $pro['name']; ?></td>
            <td class="del"><a href="/admin-panel.php?id=<?php echo $pro['id']; ?>">Delete</a></td>
        </tr>
            <?php } ?>
    </table>
    <table class="admin__table">
        <h2>Users list:</h2>
        <?php while ($pro = mysqli_fetch_assoc($user_query)) {  ?>
        <tr>
            <td><?php echo $pro['username']; ?></td>
            <?php if ( $pro['username'] != "admin")
            { ?>
                <td class="del"><a href="/admin-panel.php?user_del=<?php echo $pro['username']; ?>">Delete</a></td>
            <?php } ?>
        </tr>
            <?php } ?>
    </table>
    <form method="POST">
        <table class="admin__table">
            <h2>Add category:</h2>
            <tr>
                <td>Add name category</td>
                <td><input type="text" name="name_category_cr"></td>
                <td rowspan="5"><input type="submit" name="send_category"></td>
            </tr>
        </table>
    </form>
    <table class="admin__table">
    	<h2>All categories:</h2>
    	<?php while ($pro = mysqli_fetch_assoc($query_pro_category)) { ?>
            <tr>
                <td><?php echo $pro['name']; ?></td>
                <td class="del"><a href="/admin-panel.php?category_id=<?php echo $pro['id']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>

<?php  $query_pro_category = mysqli_query($mysqli, "SELECT * FROM `categories`");?>
<form method="POST">
    <table class="admin__table">
    	<h2>Add product:</h2>
    <tr>
        <td>Add name product</td>
        <td><input type="text" name="name"></td>
        <td rowspan="5"><input type="submit" name="send"></td>
    </tr>
    <tr>
        <td>Add category_id</td>
        <td>
            <select name="cat_id">
                <?php while ($pro = mysqli_fetch_assoc($query_pro_category)) { ?>
                    <option value="<?php echo $pro['id'];?>"> <?php echo $pro['name'];?></option>
                <?php 
        } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Add price</td>
        <td><input type="text" name="price"></td>
    </tr>
    <tr>  
        <td>Add img url</td>
        <td><input type="text" name="img"></td>
    </tr>
    <tr>  
        <td>Add gender</td>
        <td><input type="text" name="gender"></td>
    </tr>
    <tr>  
        <td>Add age</td>
        <td><input type="text" name="age"></td>
    </tr>   
    </table>
</form>
<table class="admin__table">
	<h2>all orders:</h2>
    	<?php foreach ($car_query as $car) {
		$car_prod = mysqli_query($mysqli, "SELECT * FROM `products` WHERE `id` = '".$car['product_id']."'");
		$prod = mysqli_fetch_assoc($car_prod);
		$car_user = mysqli_query($mysqli, "SELECT * FROM `orders` WHERE `id` = '".$car['order_id']."'");
		$user = mysqli_fetch_assoc($car_user);
		?>
<tr>
    <td class="mr-left">ID order: <?php echo $car['order_id']; ?></td>
    <td class="mr-left">Product name: <?php echo $prod['name']; ?></td>
    <td class="mr-left">Quantity: <?php echo $car['quantity']; ?></td>
    <td class="mr-left">User name:  <?php echo $user['user_id']; ?></td>
</tr>
    <?php } ?>
</table>
    </main>
</body>
</html>