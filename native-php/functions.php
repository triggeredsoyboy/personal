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

function add($data)
{
    $connect = connection();

    $class = htmlspecialchars($data['class']);
    $price = htmlspecialchars($data['price']);
    $status = htmlspecialchars($data['status']);
    $picture = htmlspecialchars($data['picture']);

    $query = "INSERT INTO rooms VALUES (null, '$class', '$price', '$status', '$picture')";

    mysqli_query($connect, $query) or die(mysqli_error($connect));
    return mysqli_affected_rows($connect);
}

function delete($id_room)
{
    $connect = connection();

    mysqli_query($connect, "DELETE FROM rooms WHERE id_room = $id_room") or die(mysqli_error($connect));
    return mysqli_affected_rows($connect);
}

function edit($data)
{
    $connect = connection();

    $id_room = $data['id_room'];
    $class = htmlspecialchars($data['class']);
    $price = htmlspecialchars($data['price']);
    $status = htmlspecialchars($data['status']);
    $picture = htmlspecialchars($data['picture']);

    $query = "UPDATE rooms SET
                class = '$class',
                price = '$price',
                status = '$status',
                picture = '$picture'
                WHERE id_room = $id_room";

    mysqli_query($connect, $query) or die(mysqli_error($connect));
    return mysqli_affected_rows($connect);
}
