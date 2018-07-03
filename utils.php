<?php
require_once "globals.php";

function redirectTo($path = "")
{
    header("Location: $BASE_URL/$path");
}

function emptyCart() {
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']);
    }
}