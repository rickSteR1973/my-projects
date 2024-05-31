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
echo "<pre>";
$techarray = array();
$techarray1 = array();
while($row =mysqli_fetch_assoc($result)){
    // print_r($row);
    
    $techarray[] = $row;
    $techarray1[] = array(
        $row['sno'],
        $row['First_Name'],
        $row['Last_Name'],
        $row['Date_of_birth'],
        $row['Employee_Code'],
        $row['Licence_Number'],
        


    );
}
echo "<pre>";
print_r($techarray);
print_r($techarray1);
echo json_encode($techarray);