<?php
    include ("connect_db.php");    
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


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    
    <?php
    
       $getData = $_SESSION['door'];


        $sql = " SELECT * FROM door_intr_table WHERE door_id = '$getData' ORDER  BY door_id DESC";
        $result = $conn->query($sql);
        $conn->close();
    ?>
                    <table class="table table-striped" id = "table_data">



                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                           
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                // LOOP TILL END OF DATA
                                while($rows=$result->fetch_assoc())
                                {
                            ?>
                            <tr>
                                <!-- FETCHING DATA FROM EACH
                                    ROW OF EVERY COLUMN -->
                                <th scope = "row"><?php echo $rows['door_intr_id'];?></th>
                                <td><?php echo $rows['door_status_date'];?></td>
                                <td><?php echo $rows['door_status_time'];?></td>
                                
                            </tr>
                            <?php
                                }
                            ?>

                        </tbody>
                        </table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>