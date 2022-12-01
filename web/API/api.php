<?php

   // include("sample/connect.php");
    //include('../connect.php');

    header('Content-Type: text/html; charset=utf-8');

    if($_SERVER['REQUEST_METHOD']=='POST'){ // GATHER DATA
        // isset check if variable is set not null     
        if(isset($_POST['name']) && isset($_POST['date'])&& isset($_POST['time'])) {

  
            file_put_contents("sensor/" .$_POST['name']. "/time.txt", $_POST['date'].'|'.$_POST['time'].PHP_EOL, FILE_APPEND);
            echo "Data has been Added";

        }else{

            http_response_code(403);
            echo "method denied";

        }

    }else{

        echo "NO DATA FOUND";
    }
?>