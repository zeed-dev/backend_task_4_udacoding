<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = array();
    $email = $_POST['email'];

    $cek = "SELECT * FROM tb_user WHERE email='$email'";

    $result = mysqli_fetch_array(mysqli_query($connect, $cek));

    if (isset($result)) {
        $response['value'] = 0;
        $response['message'] = "Logout Berhasil";

        echo json_encode($response);
    }
}
