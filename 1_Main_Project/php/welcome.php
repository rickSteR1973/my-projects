<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $_SESSION['useremail'] ?></title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <link rel="stylesheet" href="../css/welcome.css">

    <style>

    </style>
</head>

<body>
    <header class="">
        <nav class="navBar1">
            <div class="container navBar1">
                <div class="c-1">
                    Logo
                </div>

                <div class="c-2">
                    <span id="name_of_user">
                        <?php
                        echo  $_SESSION['userName']; ?><i class="bi bi-person-circle" style="margin: 0 5px;"></i>
                    </span>
                    <a href="logout.php" class="btn btn-danger"><i class="bi bi-box-arrow-right"></i></a>


                </div>
            </div>
        </nav>
    </header>

    <!--------------------------------------------------------------------------------------------------------- 
    CRUD            CRUD            CRUD            CRUD            CRUD            CRUD            CRUD
    ----------------------------------------------------------------------------------------------------------->

    <section id="crud">
        <div class="container main">
            <?php
                require "first.php"
            ?>


        </div>
    </section>
</body>

</html>