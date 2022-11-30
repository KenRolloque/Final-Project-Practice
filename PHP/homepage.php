<?php

    include("connect_db.php");
    session_start();

    if(!isset($_SESSION['check_session'])){
        header('Location:index.php');
        exit();
    }
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){

        setInterval(function(){
            $(".modal-body2").load("display_frame.php");
            $(".modal-body").load("intrusion_table.php");
            $("#status").load("lock_status.php");
           
            //refresh();
        },3000);

      });

</script>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Home Door Lock</title>

    <link rel="stylesheet" href="../CSS/style.css?v=
    <?php
        echo time();
    ?>
    ">
    <link rel="stylesheet" href="../CSS/navigation.css?v=
    <?php
        echo time();
        ?>
    ">
    <link rel="stylesheet" href="../CSS/control.css?v=
    <?php
        echo time();
        ?>
    ">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;700&family=Montserrat:wght@500&family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <!-- ICONS -->

    <META HTTP-EQUIV="Pragma" CONTENT="no-cache" /> <META HTTP-EQUIV="Expires" CONTENT="-1" />

</head>
<body>


    <header>
        <nav>
            

           <a><i class="fa fa-home" style="font-size: 25px;"></i></a> 
           <a href="general_setting.php"><i class="fa fa-gear" style="font-size: 25px;"></i></a>
           <a ><i class="fa fa-info-circle" style="font-size: 25px;"></i></a>
           <a href="logout.php">
            <?php
           // session_destroy();
            ?>
            
           <i class="fa fa-sign-out" style="font-size: 25px;"></i></a>
        </nav>

    </header>

    
    <section id="control">
        
        <h1 id="client-name">
            <?php
            echo $_SESSION['username'];
            ?>

            <span>Smart Door Lock</span>
            <span id="status"> 
                    <?php
                        include("lock_status.php");
                    ?>
            </span>
        </h1>

        <form action="control_door.php" method="post" id = "buttons">

                <button type = 'submit' name = 'lock' id="lock-button" >
                    <div id ="lock-icon"> 
                        <img src="../button icon/icons8-lock-500 (1).png" alt=""> 
                    </div>

                    <p class="lock">Lock</p>
                </button>


                <button type = 'submit' name = 'unlock' id="unlock-button" >
                    <div id ="lock-icon"> 
                        <img src="../button icon/icons8-unlock-64.png" alt=""> 
                    </div>
                    
                    <p class="lock">Unlock</p>
                </button>
              
        </form>

    </section>

    <section id="dashboard">
        
        <h3> Activity Log</h3>

        <div class = "container">
            
            <span class="container-1">
            <!-- <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/1917506/charts/3?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe> -->
            <?php

                include("intr_frame.php");
            ?>
                <!-- <h6>List of Intrusion</h6> -->

                <!-- Button trigger modal -->
                <button type="button" id="intrusion_id" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Intrusion Log
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Instrusion Log</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                    <!-- Table-->
                    <?php
                          include("intrusion_table.php");
                    ?>

                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        
                    </div>
                    </div>
                </div>
                </div>             

            </span>

            <span class="container-2">
                    <!-- <h6>List of Intrusion</h6> -->
                    <?php

                    include("display_frame.php");
                    ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    Door Status Log
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Door Status Log</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body2">


                    <!-- Table-->
                    <?php
                    include("door_status.php");
                    ?>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        
                    </div>
                    </div>
                </div>
                </div>  

            </span>
     
        </div>

    </section>


    <script type="text/javascript">
            $(document).ready(function () {
            $(document).on('click', '.btn-success', function () {
            $.ajax({
            url: 'intrusion_table.php',
            method: "GET",
            dataType: 'json',
            success: function(response) {
            $('#table_data').html(response);
            }
            });
            });
            });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>