<?php
    include ("connect_db");

    $sql = " SELECT * FROM data_table";
    $result = $conn->query($sql);
    $conn->close();






    // LOOP TILL END OF DATA
    while($rows=$result->fetch_assoc())
    {

    echo "<tr>";
    echo "<th scope = "row">".$rows['data_id']."</th>";
    echo "<td>".$rows['data_date']."</td>";
    echo "<td>".$rows['data_times']."</td>";
    echo "</tr>";
    }



?>