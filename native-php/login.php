<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';

if (isset($_POST['login'])) {
    $login = login($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h3>Login</h3>

    <?php if (isset($login['error'])) : ?>
        <p><?= $login['message']; ?></p>
    <?php endif; ?>
    <form action="" method="post">
        <ul>
            <li>
                Username:
                <input type="text" name="username" autofocus autocomplete="off" required>
            </li>
            <li>
                Password
                <input type="password" name="password" required>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
                <a href="register.php">Add New User</a>
            </li>
        </ul>
    </form>
</body>

</html>