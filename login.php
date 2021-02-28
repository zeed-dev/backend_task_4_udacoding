<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = array();
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $cek = "SELECT * FROM tb_user WHERE email='$email' and password='$password'";
    $result = mysqli_fetch_array(mysqli_query($connect, $cek));

    if (isset($result)) {
        $response['value'] = 1;
        $response['message'] = "Login Berhasil";
        $response['id'] = $result['id'];
        $response['email'] = $result['email'];
        $response['name'] = $result['name'];

        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Login Gagal";

        echo json_encode($response);
    }
}
