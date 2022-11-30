<?php

$server_name = "localhost";
$username = "root";
$password = "";


$conn = new mysqli($server_name,$username,$password);

if (!$conn){

    die ('Connection Failed: '.mysqli_connect_error());

}

echo "Connected Successfully";


?>