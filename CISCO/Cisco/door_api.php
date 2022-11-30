<?php

   // include("sample/connect.php");

   // header('Content-Type: text/html; charset=utf-8');
    include("d:/xampp/htdocs/web/PHP/connect_db.php");

   if($_SERVER['REQUEST_METHOD']=='POST'){ // GATHER DATA
        
        if(isset($_POST['status']) && isset($_POST['door_id']) && isset($_POST['date']) && isset($_POST['time'])) {

            $get_status = $_POST['status'];

            $get_date = $_POST['date'];
            $to_date = strtotime($get_date);
            $actual_date = date("Y-m-d",$to_date);

            $get_time = $_POST['time'];
            $to_time =strtotime($get_time);
            $actual_time = date("H:i:s",$to_time);

            echo $actual_date. "<br>".$actual_time;
            echo "Data has been Added";

           $door_id = $_POST['door_id'];
           $user_id = 1001;

            $insert_date = "INSERT INTO door_status_table (
                door_id, 
                door_status_date, 
                door_status_time,
                door_status	
                
                )VALUES (
                '$door_id', 
                '$actual_date',
                '$actual_time',
                '$get_status'
            )"; 
        
            if (mysqli_query($conn, $insert_date)){
        
                echo "Data Added <br>";
        
            }else{
                echo "No Data Added";
            }

        }else{

            http_response_code(403);
            echo "method denied";

        }

    }else{

        echo "NO DATA FOUND";

       
    }
?>