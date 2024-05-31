<?php
$serverName = "localhost";
$user = "root";
$password = "";
$dataBase = "crud";

$conn = mysqli_connect($serverName, $user, $password, $dataBase);
if (!$conn) {
    die("Sorry we failed to connect : " . mysqli_connect_errno());
} else {
    // echo "Connect successfully";
}
$sql ="SELECT * FROM `details_of_employee`";
$result = mysqli_query($conn, $sql);

if ($result) {
    // echo "data inserted";
} else {
    // echo "failed";
    // echo mysqli_error($conn);
}

//create an array
$techarray = array();
while($row =mysqli_fetch_assoc($result)){
    $techarray[] = $row;
}
echo json_encode($techarray);