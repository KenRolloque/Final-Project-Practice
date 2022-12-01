
<?php

include("../connect_db.php");
session_start();

if(!isset($_SESSION['check_session'])){
    header('Location:admin_index.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;700&family=Montserrat:wght@500&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> 
    
    
    
    <link rel="stylesheet" href="admin.css?v=
    <?php
        echo time();
    ?>">
</head>
<body>
    <!-- <nav>
        <ul>
            <li><a><i class="fa fa-home" style ='font-size:22px;'></i></a> </li>
            <li><a><i class="fa fa-gear" style ='font-size:22px;'></i></a></li>
            <li><a><i class="fa fa-info-circle" style ='font-size:22px;'></i></a></li>
        </ul>
    </nav> -->

    <section class="section-1">
        <span>
            <h2 id="admin_name"> Administrator</h2>
            <h5 class= "h_reg"> Registered User: <span> <?php include("count_user.php"); ?></span> </h5>
            <h5 class = h_smart> Smart Door Lock </h5>
        </span>

        <span>
            <button type ="button" id= "add_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <a href="register.php">
                    <i class="material-icons" id="group-add" style =" font-size: 25px;">group_add</i> 
                </a>
            </button>

            <button type ="button" id="log_out_bttn"><a href="admin_index.php">
                    <i class='fas fa-sign-out-alt'></i>
                    </a>
            </button>
        </span>

       
    </section>


    <section class="container-1">
    <?php include("card.php");?>
    </section>

    <section class="container-2">
    <?php include("card2.php");?>    
    </section>
 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>