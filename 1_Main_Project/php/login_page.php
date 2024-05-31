<?php
session_start();
if (isset($_SESSION['userName'])) {
    header("location: welcome.php");
} else {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        include "libraries/_dbconnect.php";

        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['userPassword'];
        echo $userEmail . $userPassword;
        $sql1 = "SELECT * FROM `login_verify` WHERE userEmail = '$userEmail'";
        $sqlPass = "SELECT `password` FROM `login_verify` WHERE userEmail = '$userEmail'";
        $resultPassword = mysqli_query($conn, $sqlPass);
        $password = mysqli_fetch_row($resultPassword);
        $resultUser =  mysqli_query($conn, $sql1);

        $ciphering_value = "AES-128-CTR";
        $encryption_key = "rickSteR";
        $options = 0;
        $encryption_iv = '1234567891011121';

        if (isset($password[0])) {
            $decrypted_password = openssl_decrypt($password[0], $ciphering_value, $encryption_key, $options, $encryption_iv);
        }

        $numUser = mysqli_num_rows($resultUser);
        if ($numUser == 1) {
            if ($userPassword == $decrypted_password && $userPassword != "") {
                $sqlName = "SELECT `name` FROM `login_verify` WHERE userEmail = '$userEmail'";
                $result = mysqli_query($conn, $sqlName);
                $name = mysqli_fetch_row($result);
                echo "<pre>";
                print_r($name);
                $encrypted_useremail   = openssl_encrypt($userEmail, $ciphering_value, $encryption_key);
                $_SESSION['loggedin'] = true;
                $_SESSION['useremail'] = $encrypted_useremail;
                $_SESSION['userName'] = $name[0];
                header("location: welcome.php");
            } else {

                $_SESSION['error'] = "Password Incorrect!";
                $_SESSION['loggedin'] = false;
                $_SESSION['useremail'] = NULL;
            }
        } else {
            $_SESSION['error'] = "User not found!";
            $_SESSION['loggedin'] = false;
            $_SESSION['useremail'] = NULL;
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <title>Document</title>

    <!-- <link rel="stylesheet" href="../css/index.css"> -->
    <style>
        .perent1 {
            display: flex;
            align-items: center;
            height: 100vh;
            justify-content: center;

        }

        .loginBox {
            background-color: #d0cdf152;
            border-radius: 50px;
            padding: 50px;
            width: 300px;
            /* overflow: hidden; */

        }

        .error {
            color: red;
        }

        input.error {
            color: var(--bs-body-color);
        }



        .btn-primary1 {
            background-color: rgb(0, 38, 77);
            /* padding: 2px; */
            color: white;
            border: #212529 2px solid;
            transition: ease-in 300ms;
            padding: 0;
            margin: 0;
            background-color: #d0cdf100;
            /* background-color: #d0cdf152; */
            border: none;
            width: 100%;
        }
        
        .btn-primary1:hover {
            /* background-color: rgb(58, 83, 116); */
            background-color: #d0cdf100;
            color: white;
        }

        body {
            background-image: url(../img/background.png);
            /* background-size: cover; */
            /* object-fit: fill; */
            background-size: cover;
        }

        .logoOfLogin {
            width: min-content;
            margin: auto;
            margin-top: -120px;
            margin-bottom: 30px;
        }

        .input-group-text {
            background-color: rgb(0, 38, 77);
            color: white;
            border-radius: 0;
            margin: 0;
            border: none;
        }

        .input-group {
            padding: 0;
            border-radius: 0;
            border: none;
            color: white;
            margin: 0;
        }

        .form-control {
            margin: 0;
            border: none;
            border-radius: 0;
            background-color: rgb(58, 83, 116);
            color: white;
        }

        .form-control::placeholder {
            color: white;
        }
        .loginbox1{
            background-color: #d0cdf191;
            border-radius: 25px;
            padding: 50px;
            width: 350px;
            z-index: 1;
            padding-bottom: 20px;
            box-shadow: inherit 10px;
        }
        .icons{
            background-color: #d0cdf152;
            border-radius: 0 0 10px 10px;
            /* will-change: 70%; */
            padding: 10px;
            padding-top: 11px;
            /* width: 300px; */
            width: 275px;
            margin-top: -10px;
            display: flex;
            justify-content: space-around;
            z-index: -1;
            margin: 0 auto;

        }
        .signup{
            display: flex;
            justify-content: end;
            margin-right: 10px;
            color: white;
        }
        .signup a{
            
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            transition: ease-in 300ms;
            border-radius: 5px;

        } 
        .input-group>.form-control:focus{
            background-color: rgb(34, 48, 67,1);
            color: white;

        }
    </style>
</head>

<body>


    <div class="container">
        <div class="perent1">

            <!-- <div class="d"></div> -->
            <div class="loginBox2">
                <form id="loginForm" name="loginForm" method="post">
                    <div class="loginbox1">

                        <div class="logoOfLogin">
                            <img src="../img/loginLogo.png" alt="" style="width: 120px;">
                        </div>

                        <div class="loginINfo">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                <input type="text" id="userEmail" name="userEmail" class="form-control" placeholder="Email Address" aria-label="Email Address" aria-describedby="basic-addon1">
                            </div>
                            <label id="userEmail-error" class="error" for="userEmail"></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                <input type="password" id="userPassword" name="userPassword" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                            </div>
                            <label id="userPassword-error" class="error" for="userPassword"></label>
                            <div id="emailHelp" class="form-text error">
                                <?php
                                if (isset($_SESSION['error'])) {
                                    echo $_SESSION['error'];
                                }
                                ?>
                            </div>
                            <div class="signup">
                                <a href="signup.php" class="TagOfSignUp">sign Up</a>

                            </div>

                        </div>
                    </div>

                    <div class="icons">
                        <button type="submit" id="editFormsubmitButton" class="btn btn-primary1">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <!-- <script src="../js/index.js"></script> -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="../js/login_page.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script> -->
</body>

</html>