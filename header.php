<?php
require_once "database/database.php";
session_start();
?>
<head>
    <title>Pets for everyone</title>
     <link rel="stylesheet" href="/style.css"> 
</head>
<h1 class="top"><a href="/">Pets for everyone</a></h1>
<ul class="menu">
		<?php if ($_SESSION['username']): ?>
        <li><a href="/logout.php">Logout</a></li>
        <?php else: ?>
        <li><a href="/login.php">Login</a></li>
        <li><a href="/sign-up.php">Sign Up</a></li>
        <?php endif; ?>
        <li class="dropdown"><a href="" class="dropbtn"> Category</a>
            <div class="submenu">
                <?php
                $categories = mysqli_query($mysqli, "SELECT * FROM categories ORDER BY `categories`.`id`");
                foreach ($categories as $cat) { ?>
                    <a href="/?category_id=<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></a>
                <?php } ?>
            </div>
        </li>
        <li><a href="/cart.php">Cart</a></li>
        <?php if ($_SESSION['isAdmin']): ?>
            <li><a href="/admin-panel.php">Admin Panel</a></li>
        <?php endif; ?> 
</ul>
<div class="user">
    <?php if ($_SESSION['username']): ?>
        Hello, <?php echo $_SESSION['username']; ?>!
    <?php endif; ?> 
</div>
