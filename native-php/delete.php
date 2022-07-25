<?php
require 'functions.php';

// if id not set in url
if (!isset($_GET['id_room'])) {
    header("Location: index.php");
    exit;
}

// get id from url
$id_room = $_GET['id_room'];

if (delete($id_room) > 0) {
    echo "<script>
      alert('Data has been deleted!');
      document.location.href = 'index.php';
    </script>";
} else {
    echo "Failed to delete data";
}
