<?php

include "koneksi.php";

$queryResult = $connect->query("SELECT * FROM tb_dictionary ORDER BY id DESC LIMIT 2");
$result = array();

while ($fetch_data = $queryResult->fetch_assoc()) {
    $result[] = $fetch_data;
}

echo json_encode($result);
