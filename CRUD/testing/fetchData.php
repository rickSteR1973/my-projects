<?php
    // Database connection info 
    $dbDetails = array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db'   => 'crud'
    );

    
    // DB table to use 
    $table = 'customer';

    // Table's primary key 
    $primaryKey = 'id';

    // Array of database columns which should be read and sent back to DataTables. 
    // The `db` parameter represents the column name in the database.  
    // The `dt` parameter represents the DataTables column identifier. 
    $columns = array(
        array('db' => 'Id', 'dt' => 0),
        array('db' => 'FirstName', 'dt' => 1),
        array('db' => 'LastName',  'dt' => 2),
        array('db' => 'City',      'dt' => 3),
        array('db' => 'Country',   'dt' => 4),
        array('db' => 'Phone',     'dt' => 5),
        
    );

    // Include SQL query processing class 
    require 'ssp.class.php';

    // Output data as json format 
   
    
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
$sql ="SELECT * FROM `customer`";
$result = mysqli_query($conn, $sql);

if ($result) {
    // echo "data inserted";
} else {
    // echo "failed";
    // echo mysqli_error($conn);
}

//create an array
// echo "<pre>";
$techarray = array();
$techarray1 = array();
$response = array();
$response = array(
    
    "draw" => 1,
    "recordsFiltered" => 51,
    "recordsTotal" => 51
    
);
while($row =mysqli_fetch_assoc($result)){
    // print_r($row);
    
    $techarray[] = $row;
    $techarray1[] = array(
        $row['Id'],
        $row['FirstName'],
        $row['LastName'],
        $row['City'],
        $row['Country'],
        $row['Phone'],
        


    );
}
$data = array(
    "data" => $techarray1
);
 $response = array_merge($response,$data);
// echo "<pre>";
// echo "<pre>";
    // print_r( SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));
// print_r($techarray);
echo json_encode(
    SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
);
echo "<pre>";
echo json_encode($response);
print_r($response);
// print_r($techarray1);
// echo gettype( $response);
// echo gettype( SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));

    
    ?>   