<?php

include("connect_db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>
    table,tr,th,td{
        border: 1px solid black;
        border-collapse: collapse;
    }

    table{
        width: 60%;
    }

</style>

</head>

<body>
    <?php
        $sql = "SELECT * FROM data_table WHERE data_user_id = 1001 ORDER BY data_id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_GET['q']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_id, $data_date, $data_times);
        $stmt->fetch();
        $stmt->close();

        echo "<table>";
            echo "<tr>";
                    echo "<th> ID </th>";
                    echo "<th> Date </th>";
                    echo "<th> Time </th>";
            echo "</tr>";

            echo "<tr>";
                    echo "<td>".$user_id."</th>";
                    echo "<td>".$data_date."</th>";
                    echo "<td>".$data_times."</th>";
            echo "</tr>";

        echo "</table>";


    ?>
    
</body>
</html>