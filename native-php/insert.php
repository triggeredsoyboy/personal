<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

if (isset($_POST['insert'])) {
  if (add($_POST) > 0) {
    echo "<script>
      alert('Data added succesfuly!');
      document.location.href = 'index.php';
    </script>";
  } else {
    echo "Failed to insert data";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Room Data</title>
</head>

<body>
  <h3>Add Room Data</h3>
  <form action="" method="post">
    <ul>
      <li>
        <label>
          Class :
          <input type="text" name="class" autofocus required>
        </label>
      </li>
      <li>
        <label>
          Price :
          <input type="text" name="price" required>
        </label>
      </li>
      <li>
        <label>
          Status :
          <input type="text" name="status" required>
        </label>
      </li>
      <li>
        <label>
          Picture :
          <input type="text" name="picture" required>
        </label>
      </li>
      <li>
        <button type="submit" name="insert">Add Data</button>
      </li>
    </ul>
  </form>
</body>

</html>