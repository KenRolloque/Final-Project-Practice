<?php
    include("C:/xampp/htdocs/web/PHP/connect_db.php");
    $sql = " SELECT * FROM data_table ORDER  BY data_id DESC";
    $result = $conn->query($sql);
    $conn->close();
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
                                // LOOP TILL END OF DATA
                                while($rows=$result->fetch_assoc())
                                {
                            ?>
                            <tr>
                                <!-- FETCHING DATA FROM EACH
                                    ROW OF EVERY COLUMN -->
                                <th scope = "row"><?php echo $rows['data_id'];?></th>
                                <td><?php echo $rows['data_date'];?></td>
                                <td><?php echo $rows['data_times'];?></td>
                                
                            </tr>
                            <?php
                                }
                            ?>

    
    
</body>
</html>