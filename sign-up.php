<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<?php require_once "header.php"; ?>
    <div class="log">
        <form action="/handle-sign-up.php" method="post">
            <div>
                <label for="username">Username: </label>
                <input id="username" type="text" name="username" title="Username" required>
            </div>
            <br />
            <div>
                <label for="username">Password: </label>
                <input id="password" type="password" name="password" title="Password" required>
            </div>
            <br />
            <div>
                <label for="username">Enter e-mail: </label>
                <input id="email" type="email" name="email" title="Email" required>
            </div>
            <br />
            <div>
                <button class="btn">Sing Up</button>
            </div>
        </form>
    </div>
</body>
</html>
