<?php

    include("connection.php");
    echo $_SERVER['DOCUMENT_ROOT']; 
    # Create Database
    $cr_database = "CREATE DATABASE IF NOT EXISTS user_db";

    # Verify Database
    if (mysqli_query($conn,$cr_database)){
        echo "Database Created<br>";
    }else{
        echo "Error creating Database".mysqli_error($conn);
    } 


    # Create Table for user
    $table  = "CREATE TABLE IF NOT EXISTS user_table(
            users_id INT(4) AUTO_INCREMENT PRIMARY KEY NOT NULL,
            user_fname VARCHAR(30) NOT NULL,
            user_lname VARCHAR(30) NOT NULL,
            user_username VARCHAR(30) NOT NULL,
            user_password VARCHAR(30) NOT NULL,
            user_contact VARCHAR(30) NOT NULL,
            user_street VARCHAR(30) NOT NULL,
            user_municipality VARCHAR(30) NOT NULL,
            user_province VARCHAR(30) NOT NULL,
            user_country VARCHAR(30) NOT NULL

    ) AUTO_INCREMENT = 1001";

    
    mysqli_select_db($conn,"user_db");
    # Verify Creationg of Table
    if (mysqli_query($conn,$table)){

            echo "Database and Table were created successfully<br>";
    }else{
        echo "Error creating Database and Table<br>".mysqli_error($conn);
    }

    # Create Table for channel_table
    $channel_table  = "CREATE TABLE IF NOT EXISTS channel_table(
        channel INT(4) AUTO_INCREMENT PRIMARY KEY NOT NULL,
        users_id INT(4),
        channel_id VARCHAR(100) NOT NULL,
        channel_api VARCHAR(100) NOT NULL,
        channel_write VARCHAR(100) NOT NULL,    
        status_field VARCHAR(300) NOT NULL,
        intr_field VARCHAR(300) NOT NULL,
        FOREIGN KEY (users_id) REFERENCES user_table(users_id)


    ) AUTO_INCREMENT = 2001";


    # Verify Creationg of Table
    if (mysqli_query($conn,$channel_table)){

        echo "Database and Table were created successfully<br>";
    }else{
        echo "Error creating Database and Table<br>".mysqli_error($conn);
    }



    $door_table  = "CREATE TABLE IF NOT EXISTS door_table(
        door_id INT(4) AUTO_INCREMENT PRIMARY KEY NOT NULL,
        users_id INT(4),
        FOREIGN KEY (users_id) REFERENCES user_table(users_id)


    ) AUTO_INCREMENT = 3001";


    # Verify Creationg of Table
    if (mysqli_query($conn,$door_table)){

        echo "Database and Table were created successfully<br>";
    }else{
        echo "Error creating Database and Table<br>".mysqli_error($conn);
    }



    $door_status_table  = "CREATE TABLE IF NOT EXISTS door_status_table(

        door_status_id INT(4) AUTO_INCREMENT PRIMARY KEY NOT NULL,
        door_id INT(4),
        door_status_date DATE NOT NULL,
        door_status_time TIME NOT NULL,
        door_status VARCHAR(10) NOT NULL,
    
        FOREIGN KEY (door_id) REFERENCES door_table (door_id)

    ) AUTO_INCREMENT = 4001";


    # Verify Creationg of Table
    if (mysqli_query($conn,$door_status_table)){

        echo "Database and Table were created successfully<br>";
    }else{
        echo "Error creating Database and Table<br>".mysqli_error($conn);
    }


    $door_intr_table  = "CREATE TABLE IF NOT EXISTS door_intr_table(

        door_intr_id INT(4) AUTO_INCREMENT PRIMARY KEY NOT NULL,
        door_id INT(4),
        door_status_date DATE NOT NULL,
        door_status_time TIME NOT NULL,
    
        FOREIGN KEY (door_id) REFERENCES door_table (door_id)

    ) AUTO_INCREMENT = 5001";


    # Verify Creationg of Table
    if (mysqli_query($conn,$door_intr_table)){

        echo "Database and Table were created successfully<br>";
    }else{
        echo "Error creating Database and Table<br>".mysqli_error($conn);
    }





    // $data_table = "CREATE TABLE IF NOT EXISTS data_table(

    //     data_id INT(4) AUTO_INCREMENT NOT NULL,
    //     data_user_id  INT NOT NULL,
    //     data_date DATE NOT NULL,
    //     data_times time NOT NULL,
    //     PRIMARY KEY(data_id),
    //     FOREIGN KEY (data_user_id) REFERENCES users_table(users_id)

    // )AUTO_INCREMENT = 2001";


    // #Select Database
    // mysqli_select_db($conn,'user_db');

    
    // if (mysqli_query($conn,$data_table)){

    //     echo "Database and Table were created successfully<br>";
    // }else{
    //     echo "Error creating Database and Table<br>".mysqli_error($conn);
    // }

    // $door_table = "CREATE TABLE IF NOT EXISTS door_table (

    //         door_id INT(4) NOT NULL,
    //         data_user_id INT NOT NULL,
    //         door_date DATE NOT NULL,
    //         door_time time NOT NULL,
    //         door_status varchar(10) NOT NULL,
           
    //         FOREIGN KEY (data_user_id) REFERENCES users_table(users_id)

    // )";

    // mysqli_select_db($conn,'user_db');

    // if (mysqli_query($conn,$door_table)){

    //     echo "Database and Table were created successfully<br>";
    // }else{
    //     echo "Error creating Database and Table<br>".mysqli_error($conn);
    // }

?>