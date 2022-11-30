<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    include("../connect_db.php");


    $table = "CREATE TABLE IF NOT EXISTS admin_table(

        admin_id INT (4) AUTO_INCREMENT PRIMARY KEY NOT NULL,
        admin_name varchar(30) NOT NULL,
        admin_pass varchar(30) NOT NULL

    ) AUTO_INCREMENT = 9001";

    mysqli_select_db($conn,"user_db");

    if (mysqli_query($conn,$table)){
        echo "Database and Table were created successfully<br>";
    }else{
        echo "Error creating Database and Table<br>".mysqli_error($conn);
    }

    $name = "Admin 345";
    $password ="password";


    $insert_data = "INSERT INTO admin_table (

        admin_name,
        admin_pass

    ) VALUES (

        '$name',
        '$password'

    )";

    if (mysqli_query($conn,$insert_data)){

        echo "Data Added <br>";

    }else{
        echo "No Data Added";
    }

 





?>