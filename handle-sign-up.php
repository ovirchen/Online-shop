<?php
require_once "globals.php";
require_once "database/database.php";

$username = mysqli_real_escape_string($mysqli, $_POST['username']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);

$sec_query = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `username` = '".$username."'");
$num = mysqli_num_rows($sec_query);
if ($num == 0)
{
	$query = mysqli_query($mysqli, "INSERT into users (username, password, isAdmin, email) VALUES ('".$username."', '".$password."', 0, '".$email."');");
	header("Location: $BASE_URL");
}
else
{
	header("Location: $BASE_URL/error.php");
}
