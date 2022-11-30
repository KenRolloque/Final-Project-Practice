<?php

    include("connect_db.php");
    session_start();

    // if(!isset($_SESSION['check_session'])){
    //     header('Location:index.php');
    //     exit();
    // }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;700&family=Montserrat:wght@500&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
     
    <link rel="stylesheet" href="../CSS/login.css?v=
    <?php
        echo time();
    ?>
    ">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php 

        $name = "";
        $pass ="";

        if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(empty($_POST['username']) && empty($_POST['password'])){
                
                 $name ="Please Fill the Username Field";
                 $pass ="Please Fill the Password Field";
                }
                if($_POST['usertname'] =="" && $_POST['password'] ){
                    
                }
        }
       
?>

    <section id="left-section">
            
            <h2>Smart Door Lock</h2>
            <img src="../login/14.-Technology.svg" alt="">
    </section>


    <section id="login-form">
    
       
            <h3> Welcome Back!

                <p>Log in to Continue</p>
            </h3>
            
            <h2 class="welcome-back"> Welcome Back

                <p class="smart-door-lock"> Smart Door Lock</p>
            </h2>
            
        
            <form method ="POST" actions =" <?= $_SERVER['PHP_SELF']; ?>">

                
                <div class="input_icons">
                    <i class="fa fa-user icon"></i>
                    <input type="text" name="username" id="username" placeholder="Username"> <br><br>
                </div>
                <h4 id="invalid_name"><?= $name ?></h4>
               
                <br>
                

                <div class="input_icons">
                    <i class="fa fa-lock icon"></i>
                    <input type="password" name="password" id="password" placeholder="Password">
          
                </div>
                <h4 id="invalid_pass"><?= $pass ?></h4>
                <br> 
                <br>

                <span id = "lines"> 
                    <span></span>
                    <span></span>
                </span>
                <br><br>
                
                
                    <input type="submit" value="LOGIN">
                

                <h4 id="invalid-result">Invalid Username or Password. Please try again. </h4>
                <h4 class="valid-result"></h4>

            </form>
    </section>
    
   <script>



   </script> 


</body>
</html>