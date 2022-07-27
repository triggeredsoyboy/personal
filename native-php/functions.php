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

function upload()
{
    $file_name = $_FILES['picture']['name'];
    $file_type = $_FILES['picture']['type'];
    $file_size = $_FILES['picture']['size'];
    $error = $_FILES['picture']['error'];
    $tmp_file = $_FILES['picture']['tmp_name'];

    // if no one picture selected
    if ($error == 4) {
        // echo "<script>
        //     alert('Please choose your picture!');
        // </script>";
        return 'default.png';
    }

    // check file extentsion
    $extension_list = ['jpg', 'jpeg', 'png'];
    $file_extension = explode('.', $file_name);
    $file_extension = strtolower(end($file_extension));

    if (!in_array($file_extension, $extension_list)) {
        echo "<script>
            alert('The file is not picture!');
        </script>";
        return false;
    }

    // check file type
    if ($file_type != 'image/jpeg' && $file_type != 'image/png') {
        echo "<script>
            alert('The file is not picture!');
        </script>";
        return false;
    }

    // check file size
    // if maximal size is 5mb
    if ($file_size > 5000000) {
        echo "<script>
            alert('The size is to big!');
        </script>";
        return false;
    }

    // picture is ready to upload
    // generate new file name
    $new_file_name = uniqid();
    $new_file_name .= '.';
    $new_file_name .= $file_extension;
    move_uploaded_file($tmp_file, 'assets/img/' . $new_file_name);

    return $new_file_name;
}

function add($data)
{
    $connect = connection();

    $class = htmlspecialchars($data['class']);
    $price = htmlspecialchars($data['price']);
    $status = htmlspecialchars($data['status']);
    // $picture = htmlspecialchars($data['picture']);

    // upload picture
    $picture = upload();
    if (!$picture) {
        return false;
    }


    $query = "INSERT INTO rooms VALUES (null, '$class', '$price', '$status', '$picture')";

    mysqli_query($connect, $query) or die(mysqli_error($connect));
    return mysqli_affected_rows($connect);
}

function delete($id_room)
{
    $connect = connection();

    // delete picture in img folder
    $room = query("SELECT * FROM rooms WHERE id_room = $id_room");
    if ($room['picture'] != 'default.png') {
        unlink('assets/img/' . $room['picture']);
    }
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
    $old_picture = htmlspecialchars($data['old_picture']);

    $picture = upload();
    if (!$picture) {
        return false;
    }

    if ($picture == 'default.png') {
        $picture = $old_picture;
    }

    $query = "UPDATE rooms SET
                class = '$class',
                price = '$price',
                status = '$status',
                picture = '$picture'
                WHERE id_room = $id_room";

    mysqli_query($connect, $query) or die(mysqli_error($connect));
    return mysqli_affected_rows($connect);
}

function search($keyword)
{
    $connect = connection();

    $query = "SELECT * FROM rooms
                WHERE class LIKE '%$keyword%' OR
                price LIKE '%$keyword%'";

    $result = mysqli_query($connect, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function login($data)
{
    $connect = connection();

    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    // check username
    if ($staff = query("SELECT * FROM staffs WHERE username = '$username'")) {
        // check password
        if (password_verify($password, $staff['password'])) {
            // set session
            $_SESSION['login'] = true;

            header("Location: index.php");
            exit;
        }
    }
    return [
        'error' => true,
        'message' => 'Username/password is wrong!'
    ];
}

function register($data)
{
    $connect = connection();

    $username = htmlspecialchars(strtolower($data['username']));
    $password1 = mysqli_real_escape_string($connect, $data['password1']);
    $password2 = mysqli_real_escape_string($connect, $data['password2']);

    // if username or password is empty
    if (empty($username) || empty($password1) || empty($password2)) {
        echo "<script>
            alert('Username/password cannot be blank!');
            document.location.href = 'register.php';
        </script>";

        return false;
    }

    // if username already used
    if (query("SELECT * FROM staffs WHERE username = '$username'")) {
        echo "<script>
            alert('Username not available!');
            document.location.href = 'register.php';
        </script>";

        return false;
    }

    // if password and confirm password is not match
    if ($password1 !== $password2) {
        echo "<script>
            alert('Password is not match!');
            document.location.href = 'register.php';
        </script>";

        return false;
    }

    // if password less than 5 digit
    if (strlen($password1) < 5) {
        echo "<script>
            alert('Password is to weak!');
            document.location.href = 'register.php';
        </script>";

        return false;
    }

    // if username and password is true
    // encrypt password;
    $new_password = password_hash($password1, PASSWORD_DEFAULT);

    // insert to staffs table
    $query = "INSERT INTO staffs VALUES (null, null, null, null, '$username', '$new_password', null)";

    mysqli_query($connect, $query) or die(mysqli_error($connect));
    return mysqli_affected_rows($connect);
}
