<?php
require 'functions.php';

if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        echo "<script>
            alert('Registration success!');
            document.location.href = 'login.php';
        </script>";
    } else {
        echo 'Registration failed!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <h3>Registration Form</h3>

    <form action="" method="post">
        <ul>
            <li>
                <label for="">
                    Username :
                    <input type="text" name="username" autofocus autocomplete="off" required>
                </label>
            </li>
            <li>
                <label for="">
                    Password :
                    <input type="password" name="password1" required>
                </label>
            </li>
            <li>
                <label for="">
                    Confirm Password :
                    <input type="password" name="password2" required>
                </label>
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>
</body>

</html>