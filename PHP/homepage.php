<?php

    include("connect_db.php");
    session_start();

    if(!isset($_SESSION['check_session'])){
        header('Location:index.php');
        exit();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Home Door Lock</title>

    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/navigation.css">
    <link rel="stylesheet" href="../CSS/control.css">


    <!-- FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;700&family=Montserrat:wght@500&family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <!-- ICONS -->

    <META HTTP-EQUIV="Pragma" CONTENT="no-cache" /> <META HTTP-EQUIV="Expires" CONTENT="-1" />

</head>
<body>


    <header>
        <nav>
            

           <a><i class="fa fa-home" style="font-size: 25px;"></i></a> 
           <a href="general_setting.html"><i class="fa fa-gear" style="font-size: 25px;"></i></a>
           <a ><i class="fa fa-info-circle" style="font-size: 25px;"></i></a>
           <a href="logout.php"><i class="fa fa-sign-out" style="font-size: 25px;"></i></a>
        </nav>

    </header>

    
    <section id="control">
        
        <h1 id="client-name">
            <?php
            echo $_SESSION['username'];
            ?>

            <span>Smart Door Lock</span>
            <span id="status"> Status: <span> Locked</span></span>
        </h1>

        <div id="buttons">


            <div id="lock-button">
                <div id ="lock-icon"> <img src="./button icon/icons8-lock-500 (1).png" alt=""></div>
                <p class="lock"> LOCK</p>
            </div>
    
            <div id="unlock-button">
                <div id ="lock-icon"> <img src="./button icon/icons8-unlock-64.png" alt=""></div>
                <p class="lock"> UNLOCK</p>
            </div>
        </div>

    </section>

    <section id="dashboard">
        
        <h3> Activity Log</h3>

        <?php 
            $hold_id = $_SESSION['users_id']; 

            $result = mysqli_query($conn, "SELECT * FROM data_table WHERE data_user_id = '$hold_id' ORDER BY data_id DESC");
        ?>
        <table>
            <tr>
                 <th>Id</th>
                 <th>Date</th>
                 <th>Time</th>
            </tr>

            <!-- <tr>
                <td>as</td>
                <td>s</td>
                <td>s</td>
            </tr> -->

            
            <?php
            while ($res = mysqli_fetch_array($result)){
               
                echo "<tr>";
                echo "<td style = 'text-align:center'>".$res['data_user_id']."</td>";
                echo "<td style = 'text-align:center ; color :#B81212'>".$res['data_date']."</td>";
                echo "<td style = 'text-align:center; color :#15BC8A'>".$res['data_times']."</td>";
                echo "</tr>";
            }
    
        ?>

        </table>


    </section>
    
</body>
</html>