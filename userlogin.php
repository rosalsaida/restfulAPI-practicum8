<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_restful";
$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (isset($_GET['username']) && isset($_GET['password'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];

    $query = mysqli_query($connect, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
    $show = mysqli_fetch_assoc($query);

    if ($query->num_rows > 0) {
        $respon['status'] = $show['status'];
        $respon['id'] = $show['id'];
        $respon['username'] = ['$username'];
        $respon['message'] = "Get Data Successfully";
    } else {
        $respon['status'] = "0";
        $respon['message'] = "Data Not Found";
    }
} else {
    $respon['status'] = "0";
        $respon['message'] = "Username or password is inconsistent";
}

header('content-type: application/json');

$response['response'] = $respon;

echo json_encode($response);

mysqli_close($connect);

?>