<?php

    include("connect_db.php");

    


    $get_status = mysqli_query($conn,"SELECT door_status FROM door_table WHERE door_id = 3001");
    
    while($res = mysqli_fetch_array($get_status)){

        // echo $res['door_id']."<br>";
        // echo $res['data_user_id']."<br>";
        // echo $res['door_date']."<br>";
        // echo $res['door_time']."<br>";
        echo $res['door_status']."<br>";
        file_put_contents("web/CISCO/cisco/status.txt".$res['door_status'].PHP_EOL, FILE_APPEND);


    }



?>