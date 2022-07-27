<?php
require '../functions.php';

$rooms = search($_GET['keyword']);
?>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>#</th>
        <th>Class</th>
        <th>Price</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php if (empty($rooms)) : ?>
        <tr>
            <td colspan="5">
                <p>Room's data not found!</p>
            </td>
        </tr>
    <?php endif; ?>

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