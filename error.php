<?php
require_once "globals.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Minishop</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body style="background-image: url('https://i.pinimg.com/originals/64/09/5d/64095d7fad1bb70a1513bc840d8e4a14.jpg'); background-size: cover; background-repeat: no-repeat;">
<?php
require_once "header.php";
?>
<h1>Error</h1>
<p class="error">User with such name already exists, please try another one.</p>
<script>
    setTimeout(function () {
        window.location.href = "<?= $BASE_URL ?>/sign-up.php"
    }, 4000);
</script>
</body>
</html>
