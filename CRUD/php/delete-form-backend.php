<?php

/*
* Write your logic to manage the data
* like storing data in database
*/

// POST Data

$IODA = $_POST['IdNumber'];
// $IODA = 2;


//

//DELETE FROM `details_of_employee` WHERE `details_of_employee`.`sno` = 1

$serverName = "localhost";
$user = "root";
$password = "";
$dataBase = "crud";

$conn = mysqli_connect($serverName, $user, $password, $dataBase);
if (!$conn) {
    die("Sorry we failed to connect : " . mysqli_connect_errno());
} else {
    echo "Connect successfully";
}
$sql = "DELETE FROM `details_of_employee` WHERE `details_of_employee`.`sno` = ".$IODA ;

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "data inserted";
} else {
    echo "failed";
    echo mysqli_error($conn);
}


//
exit;
