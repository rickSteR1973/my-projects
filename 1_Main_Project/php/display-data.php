<?php

use function PHPSTORM_META\type;

$serverName = "localhost";
$user = "root";
$password = "";
$dataBase = "1_main_project";
$err = "";
$techarray = array();

$conn = mysqli_connect($serverName, $user, $password, $dataBase);
if (!$conn) {
    die("Sorry we failed to connect : " . mysqli_connect_errno());
    $err = "connection error";
} else {
    // echo "Connect successfully";
    $sql = "SELECT * FROM `crud-data`";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // echo "data inserted";
    } else {
        // echo "failed";
        $err = "query error, data was not inserted.";
        // echo mysqli_error($conn);
    }
    $ciphering_value = "AES-128-CTR";
    $encryption_key = "rickSteR";
    $options = 0;
    $encryption_iv = '1234567891011121';

    while ($row = mysqli_fetch_assoc($result)) {
        $row['project_name'] = openssl_decrypt($row['project_name'], $ciphering_value, $encryption_key, $options, $encryption_iv);
        $row['url'] = openssl_decrypt($row['url'], $ciphering_value, $encryption_key, $options, $encryption_iv);

        $str = openssl_decrypt($row['user_name'], $ciphering_value, $encryption_key, $options, $encryption_iv);
        $row['user_name'] =  str_repeat("*", strlen($str));
        $str = openssl_decrypt($row['password'], $ciphering_value, $encryption_key, $options, $encryption_iv);
        $row['password'] = str_repeat("*", strlen($str));
        $row['server_name'] = openssl_decrypt($row['server_name'], $ciphering_value, $encryption_key, $options, $encryption_iv);
        $techarray[] = $row;
    }
}
$display = array(
    "data" => $techarray,
    "error" => $err
);
echo json_encode($display);
