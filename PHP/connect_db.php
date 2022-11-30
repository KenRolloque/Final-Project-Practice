<?php


$server_name = "localhost";
$username = "root";
$password = "";
$database = "user_db";

$path = $_SERVER['DOCUMENT_ROOT'];


$conn = new mysqli($server_name,$username,$password,$database);

if (!$conn){

    die ('Connection Failed: '.mysqli_connect_error());

}

?>