<?php

    include ("connect.php");
    $timeFile = "C:/xampp/htdocs/sample/API/sensor/time/time.txt";

    $open = fopen($timeFile,'r');
    mysqli_query($con, "SET SESSION sql_mode = 'NO_ZERO_DATE'");

    while (!feof($open)){

            $getTextLine = fgets($open);
            $explode_line = explode('|',$getTextLine,2);

            $date = @$explode_line[0];
            $time = @$explode_line[1];



            $qry = "INSERT INTO sensor_data (data_date,data_time) VALUES ('$date','$time')";
            $del = "DELETE FROM sensor_data WHERE data_date = 0000-00-00";
            mysqli_query($con,$qry);
            mysqli_query($con,$del);

            file_put_contents("API/sensor/time/time.txt", "");

            //http://localhost/sample/force_details.php
    }

    fclose($open);

   // header("Location: connect.php")
    /*
    $timeFile = "C:/xampp/htdocs/sampletime.txt";

    $openFile = fopen($timeFile, 'r') or die ("File not Found: ". mysql_error());
    fwrite($openFile,"");
    fclose($openFile);

    //mysql_select_db("iot");
    $result = mysqli_query($con,"LOAD DATA INFILE '$openFile'"."INTO TABLE force_sensor LINES TERMINATED BY '\n'");
    
    if (!$result){

        die("Could not load. ".mysql_error());

    }
    */
?>