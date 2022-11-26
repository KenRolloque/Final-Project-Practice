<?php

    include("connection.php");

    # Create Database
    $cr_database = "CREATE DATABASE IF NOT EXISTS user_db";

    # Verify Database
    if (mysqli_query($conn,$cr_database)){
        echo "Database Created<br>";
    }else{
        echo "Error creating Database".mysqli_error($conn);
    } 


    # Create Table
    $table  = "CREATE TABLE IF NOT EXISTS users_table(
            users_id INT(4) AUTO_INCREMENT PRIMARY KEY NOT NULL,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            username VARCHAR(30) NOT NULL,
            user_password VARCHAR(30) NOT NULL

    ) AUTO_INCREMENT = 1001";

    
    mysqli_select_db($conn,"user_db");
    # Verify Creationg of Table
    if (mysqli_query($conn,$table)){

            echo "Database and Table were created successfully<br>";
    }else{
        echo "Error creating Database and Table<br>".mysqli_error($conn);
    }


    $data_table = "CREATE TABLE IF NOT EXISTS data_table(

        data_id INT(4) AUTO_INCREMENT NOT NULL,
        data_user_id  INT NOT NULL,
        data_date DATE NOT NULL,
        data_times time NOT NULL,
        PRIMARY KEY(data_id),
        FOREIGN KEY (data_user_id) REFERENCES users_table(users_id)

    )AUTO_INCREMENT = 2001";


    #Select Database
    mysqli_select_db($conn,'user_db');

    
    if (mysqli_query($conn,$data_table)){

        echo "Database and Table were created successfully<br>";
    }else{
        echo "Error creating Database and Table<br>".mysqli_error($conn);
    }

    $door_table = "CREATE TABLE IF NOT EXISTS door_table (

            door_id INT(4) NOT NULL,
            data_user_id INT NOT NULL,
            door_date DATE NOT NULL,
            door_time time NOT NULL,
            door_status varchar(10) NOT NULL,
           
            FOREIGN KEY (data_user_id) REFERENCES users_table(users_id)

    )";

    mysqli_select_db($conn,'user_db');

    if (mysqli_query($conn,$door_table)){

        echo "Database and Table were created successfully<br>";
    }else{
        echo "Error creating Database and Table<br>".mysqli_error($conn);
    }

?>