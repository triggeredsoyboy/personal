<?php

// connect to database
function connection()
{
    return mysqli_connect('localhost', 'root', '', 'hotel');
}

function query($query)
{
    $connect = connection();

    // query to access tables
    $result = mysqli_query($connect, $query);

    // if the data just 1
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }

    // convert data into array associative
    // where the data more than 1
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data)
{
    $connect = connection();

    $class = htmlspecialchars($data['class']);
    $price = htmlspecialchars($data['price']);
    $status = htmlspecialchars($data['status']);
    $picture = htmlspecialchars($data['picture']);

    $query = "INSERT INTO rooms VALUES (null, '$class', '$price', '$status', '$picture')";
    mysqli_query($connect, $query);

    echo mysqli_error($connect);
    return mysqli_affected_rows($connect);
}
