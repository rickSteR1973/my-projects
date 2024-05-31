<?php

$IOED = $_POST['empId'];
$projectName = $_POST['projectName'];
$url = $_POST['url'];
$userName = $_POST['userName'];
$upassword = $_POST['password'];
$userverName = $_POST['serverName'];

$serverName = "localhost";
$user = "root";
$password = "";
$dataBase = "1_main_project";

$conn = mysqli_connect($serverName, $user, $password, $dataBase);
if (!$conn) {
    die("Sorry we failed to connect : " . mysqli_connect_errno());
} else {
    echo "Connect successfully";
}
$ciphering_value = "AES-128-CTR";
$encryption_key = "rickSteR";
$options = 0;
$encryption_iv = '1234567891011121';
$projectName  = openssl_encrypt($projectName, $ciphering_value, $encryption_key, $options, $encryption_iv);
$url  = openssl_encrypt($url, $ciphering_value, $encryption_key, $options, $encryption_iv);
$userName  = openssl_encrypt($userName, $ciphering_value, $encryption_key, $options, $encryption_iv);
$upassword  = openssl_encrypt($upassword, $ciphering_value, $encryption_key, $options, $encryption_iv);
$userverName  = openssl_encrypt($userverName, $ciphering_value, $encryption_key, $options, $encryption_iv);

$sql = "UPDATE `crud-data` SET `project_name` = '$projectName', `url` = '$url', `user_name` = '$userName', `password` = '$upassword', `server_name` = '$userverName' WHERE `crud-data`.`id` = $IOED;";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "data inserted";
} else {
    echo "failed";
    echo mysqli_error($conn);
}


exit;
