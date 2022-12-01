
<?php


    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    include("connect_db.php");


        $getId = $_SESSION['user_id'];

        $sql = " SELECT * FROM user_table WHERE users_id = $getId";
        $result = $conn->query($sql);
       

        while($rows=$result->fetch_assoc()){
            $_SESSION['username'] = $rows['user_username'];
            $_SESSION['password'] = $rows['user_password'];
            $_SESSION['street'] = $rows['user_street'];
            $_SESSION['munip'] = $rows['user_municipality'];
            $_SESSION['prov'] = $rows['user_province'];
            $_SESSION['country'] = $rows['user_country'];
            $_SESSION['phone'] = $rows['user_contact'];
            $_SESSION['fname'] = $rows['user_fname'];
            $_SESSION['lname'] = $rows['user_lname'];

        } 

?>
<?php

function go_index(){

    header("location:index.php",  true,  301 );  exit;
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

            <?php include("edit.php"); ?>
            <form method="post" class= "setting-container" action=" <?= $_SERVER['PHP_SELF']; ?>">
                <h1> General Setting</h1>
                <p id ="p_confirm"> Invalid Password </p>
                <span>
                    <i class="fa fa-user"></i>  
                    <input type="text" name="f_name" readonly value= "<?php echo $_SESSION['fname']." ".$_SESSION['lname']?>">
                </span>

                <span class ="change">
                    <span>
                        <i class="fa fa-home"></i>
                        <input type="text" name="u_name" id ="u_name" readonly value= "<?php echo $_SESSION['username']?>">      
                    </span>
                    <span id ="error_status"><?= $empty_name ?> </span>
                </span>
                

                <span class ="change">
                    <span>
                        <i class="fa fa fa-lock"></i>
                        <input type="password" name="pass" id ="pass" readonly value= "<?php echo $_SESSION['password']?>">      
                    </span>
                    <span id ="error_status"><?= $empty_pass?> </span>
                </span>
                
                
                <span>
                    <i class="material-icons">local_phone</i>
                    <input type="text" name="contact" readonly value= "<?php echo $_SESSION['phone']?>">
                </span>
                <span>
                    <i class="material-icons">location_on</i>
                    <input type="text" name="contact" readonly value= "<?php echo $_SESSION['street'].", ".$_SESSION['munip'].", ". $_SESSION['prov'].", ". $_SESSION['country']?>">
                </span>  
                
                <span class="buttons-container">
                    <button type="submit" id = "save_but"> Save </button>
                    <button type = "button" id = "edit_but" data-bs-toggle="modal" data-bs-target="#exampleModal"> Edit </button>
                    <button id = "back_but"> <a href ="homepage.php ">Back</a></button>
                    <button id = "cancel_but"> <a href ="homepage.php ">Cancel</a></button>
                </span>

            </div>
            </form>


   

    
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Confirm Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form method = "post">

                          <div class="mb-3">

                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name = "conf_pass">
                           
                          </div>

                   
 
          
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Save </button>
                </div>
                </form>
            </div>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



    <!-- VERIFY THE PASSWORD-->



<script type="text/javascript">

            function actButton(){

                document.getElementById("u_name").style.borderColor = "#15BC8A";
                document.getElementById("pass").style.borderColor = "#15BC8A";
                document.getElementById("save_but").style.display = "block";
                document.getElementById("back_but").style.display ="none"
                document.getElementById("edit_but").style.display = "none";
                document.getElementById("cancel_but").style.display = "block";
                document.getElementById("u_name").readOnly = false;
                document.getElementById("pass").readOnly = false;

            }

            function show_pstatus(){

                document.getElementById("p_confirm").style.display = "block";

             }       

</script>

<?php

            if(!isset($_POST['conf_pass'])){

            
            }else if ($_POST['conf_pass'] == ""){
                echo '<script type="text/javascript"> show_pstatus(); </script>';

            }
            else{

                if ($_SESSION['password'] == $_POST['conf_pass']){
                    echo '<script type="text/javascript"> actButton(); </script>';
                }else{
            }}


            // if(isset($_POST['pass']) && isset($_POST['u_name'])){

            //     $new_pass = $_POST['pass'];
            //     $new_name = $_POST['u_name'];
            //     $user = $_SESSION['user_id'];   

            //     $new_update = "UPDATE user_table  SET user_username = '$new_name', user_password = '$new_pass' WHERE users_id ='$user'";
            //     $result = $conn->query($new_update);
            //     $conn->close(); 

            //     echo "<script> alert('Updated Successfully') </script>";
            //     echo "<script> location.replace('index.php'); </script>";
            // }
?>


    
</body>
</html>