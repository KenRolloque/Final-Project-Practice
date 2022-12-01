<?php

include("../connect_db.php");
 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}


$sql = mysqli_query($conn,"SELECT COUNT(users_id) as 'num' FROM user_table");
$data= mysqli_fetch_assoc($sql);


echo $data['num'];


?>
