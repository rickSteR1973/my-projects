<?php

/*
* Write your logic to manage the data
* like storing data in database
*/

// POST Data
$data['First Name'] = $_POST['firstName'];
$data['Last Name'] = $_POST['lastName'];
$data['Date of Birth'] = $_POST['dob'];
$data['Employee Code'] = $_POST['employeeCode'];
$data['Licence Nubmer'] = $_POST['employeelicenceNumber'];


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
$sql = "INSERT INTO `details_of_employee` ( `First_Name`, `Last_Name`, `Date_of_birth`, `Employee_Code`, `Licence_Number`) VALUES ('" . $data['First Name'] . "', '" . $data['Last Name'] . "', '" . $data['Date of Birth'] . "', '" . $data['Employee Code'] . "', '" . $data['Licence Nubmer'] . "');";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "data inserted";
} else {
    echo "failed";
    echo mysqli_error($conn);
}


//
exit;

?>

