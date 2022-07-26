<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}


require 'functions.php';

// if id not set in url
if (!isset($_GET['id_room'])) {
  header("Location: index.php");
  exit;
}

// get id from url
$id_room = $_GET['id_room'];

// room's query based on id
$room = query("SELECT * FROM rooms WHERE id_room = $id_room");

if (isset($_POST['submit'])) {
  if (edit($_POST) > 0) {
    echo "<script>
      alert('Data edit succesfuly!');
      document.location.href = 'index.php';
    </script>";
  } else {
    echo "Failed to edit data";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Room Data</title>
</head>

<body>
  <h3>Edit Room Data</h3>
  <form action="" method="post">
    <input type="hidden" name="id_room" value="<?= $room['id_room']; ?>">
    <ul>
      <li>
        <label>
          Class :
          <input type="text" name="class" autofocus required value="<?= $room['class']; ?>">
        </label>
      </li>
      <li>
        <label>
          Price :
          <input type="text" name="price" required value="<?= $room['price']; ?>">
        </label>
      </li>
      <li>
        <label>
          Status :
          <input type="text" name="status" required value="<?= $room['status']; ?>">
        </label>
      </li>
      <li>
        <label>
          Picture :
          <input type="text" name="picture" required value="<?= $room['picture']; ?>">
        </label>
      </li>
      <li>
        <button type="submit" name="submit">Edit Data</button>
      </li>
    </ul>
  </form>
</body>

</html>