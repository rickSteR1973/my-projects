<?php

/*
* Write your logic to manage the data
* like storing data in database
*/

// POST Data
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


$sql = "INSERT INTO `crud-data` (`id`, `project_name`, `url`, `user_name`, `password`, `server_name`) VALUES (NULL, '$projectName', '$url', '$userName', '$upassword', '$userverName');";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "data inserted";
} else {
    echo "failed";
    echo mysqli_error($conn);
}


//
exit;
