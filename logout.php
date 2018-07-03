<?php
require_once "globals.php";
session_start();
unset($_SESSION['username']);
unset($_SESSION['isAdmin']);
unset($_SESSION['cart']);
header("Location: $BASE_URL");
