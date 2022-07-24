<?php
require 'functions.php';

// get id from URL
$id_room = $_GET['id_room'];

// room's query based on id
$room = query("SELECT * FROM rooms WHERE id_room = $id_room");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room's Detail</title>
</head>

<body>
    <h3>Room Detail</h3>

    <ul>
        <li><img src="assets/img/<?= $room['picture']; ?>" alt=""></li>
        <li><?= $room['class']; ?></li>
        <li><?= $room['price']; ?></li>
        <li><?= $room['status']; ?></li>
        <li><a href="">Edit</a></li>
        <li><a href="index.php">Back to home</a></li>
    </ul>
</body>

</html>