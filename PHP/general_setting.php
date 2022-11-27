<?php

    include("connect_db.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
}


        $getId = $_SESSION['user_id'];

        $sql = " SELECT * FROM user_table WHERE users_id = $getId";
        $result = $conn->query($sql);
        $conn->close();

        while($rows=$result->fetch_assoc()){
            
            $_SESSION['street'] = $rows['user_street'];
            $_SESSION['munip'] = $rows['user_municipality'];
            $_SESSION['prov'] = $rows['user_province'];
            $_SESSION['country'] = $rows['user_country'];
            $_SESSION['phone'] = $rows['user_contact'];

            $_SESSION['fname'] = $rows['user_fname'];
            $_SESSION['lname'] = $rows['user_lname'];
  

        } 

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Setting</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;700&family=Montserrat:wght@500&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <link rel="stylesheet" href="../CSS/general_setting.css?v=
    <?php
        echo time();
    ?>">
  



</head>
<body>

   <div class="container">

            <div class="setting-container">
                
                <h1> General Setting</h1>
                <span>
                    <i class="fa fa-user"></i>  
                    <?php echo "<p>".$_SESSION['fname']." ".$_SESSION['lname']."</p>"?>
                </span>

                <span>
                    <i class="fa fa-home"></i>
                    <?php echo "<p>".$_SESSION['username']."</p>"?>
                </span>

                <span>
                    <i class="material-icons">local_phone</i>
                    <?php echo "<p>".$_SESSION['phone']."</p>"?>
                </span>
                <span>
                    <i class="material-icons">location_on</i>
                    <?php echo "<p>".$_SESSION['street'].", ".$_SESSION['munip'].", ". $_SESSION['prov'].", ". $_SESSION['country']."</p>"?>

                </span>  
                
                <span class="buttons-container">
                    <button type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal"> Edit </button>
                    <button type="submit">Back</button>
                </span>
            </div>



   </div>

    
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form action="">



                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                          </div>

                    </form>
 
          
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save </button>
                </div>
            </div>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>