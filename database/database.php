<?php
require_once "credentials.php";

$mysqli = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$mysqli) {
    echo "Failed to connect to MySQL";
    exit();
}
