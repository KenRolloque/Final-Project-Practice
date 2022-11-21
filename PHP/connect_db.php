<?php


$server_name = "localhost";
$username = "root";
$password = "";
$database = "user_db";
 

$conn = new mysqli($server_name,$username,$password,$database);

if (!$conn){

    die ('Connection Failed: '.mysqli_connect_error());

}

//echo "Connected Successfully";





?>