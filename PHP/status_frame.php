    
<?php
        include("connect_db.php");
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        

    <?php

        $getUser = $_SESSION['user_id'];
        $get_channel = "";

        $sql = " SELECT * FROM channel_table WHERE users_id = '$getUser'";
        $result = $conn->query($sql);
        $conn->close();

        while($rows=$result->fetch_assoc()){

           $get_channel = $rows['status_field'];
        
        }    
      
        echo $get_channel;



    ?>



</body>
</html>