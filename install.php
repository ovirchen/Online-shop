<?php
$DB_HOST = "localhost";
$DB_USER = "username";
$DB_PASS = "password";
$DB_NAME = "minishop";

$db = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);

/* check connection */
if ($db == false) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$sql = "DROP DATABASE $DB_NAME;";
$req = mysqli_query($db, $sql);
var_dump(mysqli_error($db));

$sql = "CREATE DATABASE $DB_NAME;";
$req = mysqli_query($db, $sql);

var_dump(mysqli_error($db));

$db = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

$CREATE_TABLE = "
CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));

$CREATE_TABLE =
    "
INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Cat'),
(2, 'Dog'),
(3, 'Rodent'),
(4, 'girl'),
(5, 'boy');
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));


$CREATE_TABLE =
    "
CREATE TABLE `ordered_products` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));


$CREATE_TABLE =
    "
CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));

$CREATE_TABLE =
    "
CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));

$CREATE_TABLE =
    "
INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `img`, `gender`, `age`) VALUES
(1, 'Bunny', 3, 20, 'https://i.pinimg.com/originals/a4/c9/4c/a4c94c46530f49c97c5faa25bd64627c.jpg', 'girl', '2 months'),
(2, 'Matilda', 1, 35, 'https://pbs.twimg.com/media/Bi3mpLxCYAEeSnv.jpg', 'girl', '2 months'),
(3, 'Tripio', 3, 10, 'https://i.pinimg.com/236x/65/76/82/6576829e1c5c8184a6e4d1eae5d45c32.jpg', 'boy', '1 month'),
(4, 'Grey', 2, 30, 'https://i.pinimg.com/originals/78/fc/a5/78fca55d50c6690a08064a4df2794b57.jpg', 'boy', '2 months'),
(5, 'Leya', 3, 15, 'https://i.pinimg.com/564x/c2/f3/b7/c2f3b7ad9de6f911da9ade598d01f0e9.jpg', 'girl', '1 month'),
(6, 'Mary', 2, 20, 'https://i.pinimg.com/originals/cd/ef/bc/cdefbc66012e59a7a1463ccb1d648dde.jpg', 'girl', '2 months'),
(7, 'Forsy', 1, 40, 'https://i.pinimg.com/originals/49/d9/5e/49d95e16daa8e635c1e11815fccc52bb.jpg', 'girl', '2 months'),
(8, 'Solya', 3, 15, 'https://i.pinimg.com/564x/dd/78/f2/dd78f215680495052569a8d079f5019a.jpg', 'girl', '1 month'),
(9, 'Osho', 2, 45, 'https://i.pinimg.com/originals/56/b2/0a/56b20a7167a5fa07ff0e2aba29437591.jpg', 'girl', '2 months'),
(10, 'Layla', 1, 35, 'https://i.pinimg.com/originals/4a/83/e8/4a83e87f9ace0ef0e1a6beae1e54c6dd.jpg', 'girl', '2 months'),
(11, 'Shura', 1, 40, 'https://i.pinimg.com/originals/07/9b/eb/079bebfa427bc3a643fe5d23c97a8477.jpg', 'boy', '6 months'),
(13, 'Loki', 1, 40, 'https://i.pinimg.com/564x/14/11/b7/1411b754dae0c22f7bcf849711eb259b.jpg', 'boy', '2 months'),
(14, 'Jocker', 2, 45, 'https://i.pinimg.com/originals/6b/a0/ba/6ba0ba45da0e6c593c9291b5d291de44.jpg', 'boy', '2 months'),
(15, 'Molly', 2, 40, 'https://i.pinimg.com/originals/76/78/0d/76780db62eea28061d7eb94e64d961a6.jpg', 'girl', '2 months'),
(16, 'Gor', 1, 30, 'https://i.pinimg.com/originals/0e/5d/50/0e5d5065d4e20700affad7a16bcec49a.jpg', 'boy', '2 months'),
(17, 'Han', 3, 10, 'https://i.pinimg.com/564x/8e/c5/cb/8ec5cb558631e146c028d017ba02675b.jpg', 'boy', '1 month'),
(18, 'Luk', 1, 25, 'https://i.pinimg.com/originals/de/b5/be/deb5be8db33718bfef4ad93debde0f44.jpg', 'boy', '1 month');
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));

$CREATE_TABLE =
    "
CREATE TABLE `users` (
  `username` varchar(45) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT '0',
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));

$CREATE_TABLE =
    "
INSERT INTO `users` (`username`, `password`, `isAdmin`, `email`) VALUES
('admin', 'admin', 1, NULL);
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));

$CREATE_TABLE =
    "
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));

$CREATE_TABLE =
    "
ALTER TABLE `ordered_products`
  ADD KEY `FK` (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));

$CREATE_TABLE =
    "
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`user_id`);
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));

$CREATE_TABLE =
    "
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`category_id`);
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));

$CREATE_TABLE =
    "
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));

$CREATE_TABLE =
    "
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));

$CREATE_TABLE =
    "
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));

$CREATE_TABLE =
    "
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));

$CREATE_TABLE =
    "
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
";
$query = mysqli_query($db, $CREATE_TABLE);
var_dump(mysqli_error($db));
// $CREATE_TABLE =
//     "
// CREATE TABLE `ordered_products` (
//   `order_id` int(10) UNSIGNED NOT NULL,
//   `product_id` int(10) UNSIGNED NOT NULL,
//   `quantity` int(10) UNSIGNED NOT NULL
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
// ";
// $query = mysqli_query($db, $CREATE_TABLE);
// var_dump(mysqli_error($db));

// $CREATE_TABLE =
//     "
// CREATE TABLE `products` (
//   `id` int(10) UNSIGNED NOT NULL,
//   `name` varchar(100) NOT NULL,
//   `description` varchar(255) NOT NULL,
//   `category_id` int(10) UNSIGNED NOT NULL,
//   `price` double UNSIGNED NOT NULL,
//   `img` varchar(255) DEFAULT NULL
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
// ";
// $query = mysqli_query($db, $CREATE_TABLE);
// var_dump(mysqli_error($db));

// $CREATE_TABLE =
//     "
// CREATE TABLE `users` (
//   `username` varchar(45) NOT NULL,
//   `password` varchar(100) DEFAULT NULL,
//   `isAdmin` tinyint(1) DEFAULT '0'
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
// ";
// $query = mysqli_query($db, $CREATE_TABLE);
// var_dump(mysqli_error($db));

// $CREATE_TABLE =
//     "
// ALTER TABLE `categories`
//   ADD PRIMARY KEY (`id`);
// ";
// $query = mysqli_query($db, $CREATE_TABLE);
// var_dump(mysqli_error($db));
// $CREATE_TABLE =
//     "
//   ALTER TABLE `orders`
//    ADD KEY `FK` (`user_id`);
// ";
// $query = mysqli_query($db, $CREATE_TABLE);
// var_dump(mysqli_error($db));

// $CREATE_TABLE =
//     "
// 	ALTER TABLE `ordered_products`
// 	ADD KEY `FK` (`order_id`,`product_id`),
// 	ADD KEY `product_id` (`product_id`);
// 	";
// $query = mysqli_query($db, $CREATE_TABLE);
// var_dump(mysqli_error($db));
// $CREATE_TABLE =
//     "
// 	ALTER TABLE `products`
//   ADD PRIMARY KEY (`id`),
//   ADD KEY `FK` (`category_id`);
// ";
// $query = mysqli_query($db, $CREATE_TABLE);
// var_dump(mysqli_error($db));

// $CREATE_TABLE =
//     "
// ALTER TABLE `users`
//   ADD PRIMARY KEY (`username`);
//   ";
// $query = mysqli_query($db, $CREATE_TABLE);
// var_dump(mysqli_error($db));

// $CREATE_TABLE =
//     "
// ALTER TABLE `categories`
//   MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
//  ";
// $query = mysqli_query($db, $CREATE_TABLE);
// var_dump(mysqli_error($db));
// $CREATE_TABLE =
//     "
// ALTER TABLE `orders`
//   MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
// ";
// $query = mysqli_query($db, $CREATE_TABLE);
// var_dump(mysqli_error($db));

// $CREATE_TABLE =
//     "
// ALTER TABLE `products`
//   MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
// ";
// $query = mysqli_query($db, $CREATE_TABLE);
// var_dump(mysqli_error($db));

// $CREATE_TABLE =
//     "
// ALTER TABLE `orders`
//   ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;
// ";
// $query = mysqli_query($db, $CREATE_TABLE);
// var_dump(mysqli_error($db));

// $CREATE_TABLE =
//     "
// ALTER TABLE `ordered_products`
//   ADD CONSTRAINT `ordered_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
//   ADD CONSTRAINT `ordered_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
// ";
// $query = mysqli_query($db, $CREATE_TABLE);
// var_dump(mysqli_error($db));

// $CREATE_TABLE =
//     "
// ALTER TABLE `products`
//   ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
// ";
// $query = mysqli_query($db, $CREATE_TABLE);
// var_dump(mysqli_error($db));

// // Init data

// //add admin
// $query = mysqli_query($db, "INSERT into users (username, password, isAdmin) VALUES (\"admin\", \"admin\", TRUE);");

// //add categories
// $query = mysqli_query($db, "INSERT INTO `categories` (`id`, `name`) VALUES
// (1, 'Cat'),
// (2, 'Dog'),
// (3, 'Rodent');");

// //add products
// $query = mysqli_query($db, "INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `img`, `gender`, `age`) VALUES
// (1, 'Bunny', 3, 20, 'https://i.pinimg.com/originals/a4/c9/4c/a4c94c46530f49c97c5faa25bd64627c.jpg', 'girl', '2 months'),
// (2, 'Matilda', 1, 35, 'https://pbs.twimg.com/media/Bi3mpLxCYAEeSnv.jpg', 'girl', '2 months'),
// (3, 'Tripio', 3, 10, 'https://i.pinimg.com/236x/65/76/82/6576829e1c5c8184a6e4d1eae5d45c32.jpg', 'boy', '1 month'),
// (4, 'Grey', 2, 30, 'https://i.pinimg.com/originals/78/fc/a5/78fca55d50c6690a08064a4df2794b57.jpg', 'boy', '2 months'),
// (5, 'Leya', 3, 15, 'https://i.pinimg.com/564x/c2/f3/b7/c2f3b7ad9de6f911da9ade598d01f0e9.jpg', 'girl', '1 month'),
// (6, 'Mary', 2, 20, 'https://i.pinimg.com/originals/cd/ef/bc/cdefbc66012e59a7a1463ccb1d648dde.jpg', 'girl', '2 months'),
// (7, 'Forsy', 1, 40, 'https://i.pinimg.com/originals/49/d9/5e/49d95e16daa8e635c1e11815fccc52bb.jpg', 'girl', '2 months'),
// (8, 'Solya', 3, 15, 'https://i.pinimg.com/564x/dd/78/f2/dd78f215680495052569a8d079f5019a.jpg', 'girl', '1 month'),
// (9, 'Osho', 2, 45, 'https://i.pinimg.com/originals/56/b2/0a/56b20a7167a5fa07ff0e2aba29437591.jpg', 'girl', '2 months'),
// (10, 'Layla', 1, 35, 'https://i.pinimg.com/originals/4a/83/e8/4a83e87f9ace0ef0e1a6beae1e54c6dd.jpg', 'girl', '2 months'),
// (11, 'Shura', 1, 40, 'https://i.pinimg.com/originals/07/9b/eb/079bebfa427bc3a643fe5d23c97a8477.jpg', 'boy', '6 months'),
// (13, 'Loki', 1, 40, 'https://i.pinimg.com/564x/14/11/b7/1411b754dae0c22f7bcf849711eb259b.jpg', 'boy', '2 months'),
// (14, 'Jocker', 2, 45, 'https://i.pinimg.com/originals/6b/a0/ba/6ba0ba45da0e6c593c9291b5d291de44.jpg', 'boy', '2 months'),
// (15, 'Molly', 2, 40, 'https://i.pinimg.com/originals/76/78/0d/76780db62eea28061d7eb94e64d961a6.jpg', 'girl', '2 months'),
// (16, 'Gor', 1, 30, 'https://i.pinimg.com/originals/0e/5d/50/0e5d5065d4e20700affad7a16bcec49a.jpg', 'boy', '2 months'),
// (17, 'Han', 3, 10, 'https://i.pinimg.com/564x/8e/c5/cb/8ec5cb558631e146c028d017ba02675b.jpg', 'boy', '1 month'),
// (18, 'Luk', 1, 25, 'https://i.pinimg.com/originals/de/b5/be/deb5be8db33718bfef4ad93debde0f44.jpg', 'boy', '1 month');
// ");


// var_dump(mysqli_error($db));

mysqli_close($db);

