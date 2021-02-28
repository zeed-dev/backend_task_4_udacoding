<?php

require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response   = array();
    $name  = $_POST['name'];
    $email   = $_POST['email'];
    $password   = md5($_POST['password']);

    // NOTE: Langkah 2
    $cek = "SELECT * FROM tb_user WHERE email='$email'";
    $result = mysqli_fetch_array(mysqli_query($connect, $cek));

    if (isset($result)) {
        $response['value'] = 2;
        $response['message'] = "Email Telah Digunakan";

        echo json_encode($response);
    } else {
        $insert = "INSERT INTO tb_user Value(NULL,'$name','$email','$password')";

        if (mysqli_query($connect, $insert)) {
            $response['value'] = 1;
            $response['message'] = "Berhasil Didaftarkan";

            echo json_encode($response);
        } else {
            $response['value'] = 0;
            $response['message'] = "Gagal Didaftarkan";

            echo json_encode($response);
        }
    }
}
