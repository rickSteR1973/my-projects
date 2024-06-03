<?php

/*
* Write your logic to manage the data
* like storing data in database
*/

// POST Data
$name = $_POST['name'];
$email = $_POST['email'];
$mobileNumber = $_POST['mobileNumber'];
$Query = $_POST['Query'];


$serverName = "localhost";
$user = "root";
$password = "";
$dataBase = "project1";

$conn = mysqli_connect($serverName, $user, $password, $dataBase);
if (!$conn) {
    die("Sorry we failed to connect : " . mysqli_connect_errno());
} else {
    echo "Connect successfully";
}
$sql = "INSERT INTO `visiter_query` ( `Name`, `Email`, `Mobile_Number`, `Query`) VALUES ('$name', '$email', '$mobileNumber', '$Query');";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "data inserted";
} else {
    // echo "failed";
    echo mysqli_error($conn);
}


//
exit;

?>

