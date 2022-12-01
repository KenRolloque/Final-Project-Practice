<?php

    $server_name = "localhost";
    $username = "root";
    $password = "";
    $database = "iot";

    // Create Connection
    $con = mysqli_connect($server_name, $username,$password,$database);

    // Check Connection

    if (!$con){
            die("Connection Failed: ".mysqli_connect_error());
    }

    echo "Connected Successfuly"
?>