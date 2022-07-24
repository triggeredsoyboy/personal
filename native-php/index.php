<?php

// make a connections with functions file
require 'functions.php';

// assign to rooms variable
$rooms = query("SELECT * FROM rooms");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room List</title>
</head>

<body>
    <h3>Room List</h3>
    <a href="insert.php">Add More Room</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Class</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php $i = 1;
        foreach ($rooms as $r) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $r['class']; ?></td>
                <td><?= $r['price']; ?></td>
                <td><?= $r['status']; ?></td>
                <td>
                    <a href="details.php?id_room=<?= $r['id_room']; ?>">See more ...</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>