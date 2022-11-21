<?php

   // include("sample/connect.php");
   include("connect_db.php");

   // header('Content-Type: text/html; charset=utf-8');

    if($_SERVER['REQUEST_METHOD']=='POST'){ // GATHER DATA
        // isset check if variable is set not null     
        if(isset($_POST['date'])&& isset($_POST['time'])) {

            $get_date = $_POST['date'];
            $to_date = strtotime($get_date);
            $actual_date = date("Y-m-d",$to_date);

            $get_time = $_POST['time'];
            $to_time =strtotime($get_time);
            $actual_time = date("H:i:s",$to_time);

            echo $actual_date. "<br>".$actual_time;
            echo "Data has been Added";

            $name = $_POST['name'];

            $insert_date = "INSERT INTO data_table (data_user_id, data_date, data_times) VALUES (
                '$name', '$actual_date','$actual_time'
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