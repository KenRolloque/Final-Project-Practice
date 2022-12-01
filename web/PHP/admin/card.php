<?php

    include("../connect_db.php");
 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }


    $sql = " SELECT * FROM user_table ORDER  BY users_id DESC";
    $result = $conn->query($sql);
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;700&family=Montserrat:wght@500&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="card.css?v=
    <?php
        echo time();
    ?>">
    
    <title>Card</title>
</head>
<body>
<section id= "section-2">

    <?php
    while ($rows=$result->fetch_assoc()){

    
        if ($rows['users_id']%2 != 0){

    ?>
        <div class="card" style="width: 25rem;">
                    <div class ="card-header">
                    <p class="house-name"> <?php echo $rows['user_username']?></p>
                    </div>
                <div class="card-body" id="card-body">

                    <div>
                        <div id ="card-1">
                            <span> <i class="fa fa-user"></i> <p class='l_name'> <?php echo $rows['user_fname']." ".$rows['user_lname'] ?></p></span>
                            <span>  <i class="fa fa-home" id="home"></i><p class='l_name'> <?php echo $rows['users_id']?></p></span>
                            <span> <i class="material-icons">location_on</i><p class='l_name'> <?php echo $rows['user_street'].", ".$rows['user_municipality'].", ".$rows['user_province'].", ".$rows['user_country']?></p></span>
                            <span>  <i class="material-icons" id = "phone">local_phone</i><p class='l_name'><?php echo $rows['user_contact']?></p></span>
                            <button id ="channel_but" type="button" onclick = showChannel()> Channel Info</button>
                        </div>

                        <div id ="card-2">


                            <?php 

                                $a = $rows['users_id'];
                                $get_channel ="SELECT * FROM channel_table WHERE users_id = '$a '";
                                $get_result = $conn->query($get_channel);
                                while ($x=$get_result->fetch_assoc()){

                            ?>

                                <span>Channel ID:<p><?php echo $x['channel_id'] ?></p> </span>
                                <span>Channel API <p><?php echo $x['channel_api'] ?></p></span>


                            <?php
                                }
                            ?>

                                <button id ="channel_but" type="button" onclick = showUser()> User Info</button>
                        </div>
                    </div>
                </div>
        </div>

    <?php
    }}
    ?>
    </section>
    

    <script>

        function showChannel(){

            document.getElementById("card-2").style.display = "inline-flex";
            document.getElementById("card-1").style.display = "none";

        }

        function showUser(){

            document.getElementById("card-2").style.display = "none";
            document.getElementById("card-1").style.display = "inline-flex";

        }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>