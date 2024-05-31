<?php

$IOED= $_POST['empId'];
$data['First Name'] = $_POST['firstName'];
$data['Last Name'] = $_POST['lastName'];
$data['Date of Birth'] = $_POST['dob'];
$data['Employee Code'] = $_POST['employeeCode'];
$data['Licence Nubmer'] = $_POST['employeelicenceNumber'];

// $IOED= "1";
// $data['First Name'] = "F";
// $data['Last Name'] = "F";
// $data['Date of Birth'] = "F";
// $data['Employee Code'] = "F";
// $data['Licence Nubmer'] = "F";


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

$sql = "UPDATE `details_of_employee` SET `First_Name` = '".$data['First Name']."', `Last_Name` = '".$data['Last Name']."', `Date_of_birth` = '".$data['Date of Birth']."', `Employee_Code` = '".$data['Employee Code']."', `Licence_Number` = '".$data['Licence Nubmer']."' WHERE `details_of_employee`.`sno` = ".$IOED.";";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "data inserted";
} else {
    echo "failed";
    echo mysqli_error($conn);
}


exit;

?>