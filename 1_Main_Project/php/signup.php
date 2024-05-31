<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    include "libraries/_dbconnect.php";
    $ciphering_value = "AES-128-CTR";
    $encryption_key = "rickSteR";
    $options = 0;
    $encryption_iv = '1234567891011121';

    $userEmail = $_POST['userEmail'];
    // $userEmail = "admin@admin.com";
    $userPassword = $_POST['userPassword'];
    $userName =  $_POST['userName'];

    $sql = "SELECT * FROM `login_verify` WHERE `userEmail` = '$userEmail'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    // echo "num". $num;
    if ($num !=0) {
        $_SESSION['errorUser'] = "already user have account.";
    } else {

        $encrypted_password  = openssl_encrypt($userPassword, $ciphering_value, $encryption_key, $options, $encryption_iv);
        
        // $encrypted_name  = openssl_encrypt($userName, $ciphering_value, $encryption_key);

        $sqlmain = "INSERT INTO `login_verify` (`id`, `userEmail`, `password`, `name`, `date`) VALUES (NULL, '$userEmail', '$encrypted_password', '$userName', current_timestamp());";
        $result = mysqli_query($conn, $sqlmain);
        print_r($result);
        if ($result) {
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $userEmail;
            $_SESSION['userName'] = $userName;
            $_SESSION['errorUser'] = NULL;
            header("location: welcome.php");
        } else {
            echo "error occured. Try again." ;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="../JS/signup.js"></script>
    <style>
        .perent1{
            display: flex;
            align-items: center;
            height: 100vh;
            justify-content: center;

        }

        .loginBox {
            width: 300px;
            
        }

        .error {
            color: red;
        }

        input.error {
            color: var(--bs-body-color);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="perent1">

            <div class="loginBox">
                <form id="loginForm" name="loginForm" method="post" class="needs-validation" action="signup.php">
                    <h5>Pease Login to start</h5>

                    <div class="mb-3">
                        <label for="userName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" name="userName">
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">User Email Address</label>
                        <input type="email" class="form-control" id="userEmail" name="userEmail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text error"><?php if (isset($_SESSION['errorUser'])) {
                                                                        echo $_SESSION['errorUser'];
                                                                        # code...
                                                                    } ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userPassword" name="userPassword">
                    </div>
                    <div class="mb-3">
                        <label for="userCpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="userCpassword" name="userCpassword">
                    </div>

                    <button type="submit" id="editFormsubmitButton" class="btn btn-primary">Submit</button>
                </form>
            </div>


        </div>
    </div>
</body>

</html>