<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
        
    <?php require_once "header.php";?>
    <?php 
    
    ?>
    <div class="log">
        <form action="handle-login.php" method="post">
            <div>
                <label for="username">Username: </label>
                <input id="username" type="text" name="username" title="Username">
            </div>
            <br />
            <div>
                <label for="username">Password: </label>
                <input id="password" type="password" name="password" title="Password">
            </div>
            <br />
            <div>
                <button class="btn">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
