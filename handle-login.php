<?php
require_once "globals.php";
require_once "database/database.php";

session_start();

    if (isset($_POST['username']) == false || isset($_POST['password']) == false ||     $_POST['username'] === "" || $_POST['password'] === "")
    {
        header("Location: $BASE_URL/error-login.php");
        exit();
    }

$users = mysqli_query($mysqli, "SELECT * FROM `users`");
$username = mysqli_real_escape_string($mysqli, $_POST['username']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);
foreach ($users as $user) {
	if ($user['username'] === $username &&  $user['password'] === $password) {
		$_SESSION['username'] = $username;
		$_SESSION['isAdmin'] = $user['isAdmin'];
		header("Location: $BASE_URL", true, 301);
		exit();
	}
}

header("Location: $BASE_URL/error-login.php");

?>
