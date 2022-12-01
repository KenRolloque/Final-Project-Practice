<!-- 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;700&family=Montserrat:wght@500&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
     
    <link rel="stylesheet" href="login.css?v=


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <section id="left-section">
            
            <h2>Smart Door Lock</h2>
            <img src="14.-Technology.svg" alt="">
    </section>


    <section id="login-form">
    
       
            <h3> Welcome Back Admin!

                <p>Log in to Continue</p>
            </h3>
            
            <h2 class="welcome-back"> Welcome Back

                <p class="smart-door-lock"> Smart Door Lock</p>
            </h2>
            
        
            <form action="check_admin.php" method ="post">

                <div class="input_icons">
                    <span>
                        <i class="fa fa-user icon"></i>
                        <input type="text" name="ad_name" id="ad_name" placeholder="Username"> <br><br>
                    </span>
                </div>

                <div class="input_icons">
                    <i class="fa fa-lock icon"></i>
                    <input type="password" name="ad_password" id="ad_password" placeholder="Password">
                </div>

                <span id = "lines"> 
                    <span></span>
                    <span></span>
                </span>
                
                
                    <input type="submit" value="LOGIN">
                

                <h4 class="invalid-result">Invalid Username or Password. Please try again. </h4>
                <h4 class="valid-result"></h4>

            </form>
    </section>
    
</body>
</html> -->

<?php

    include("../connect_db.php");
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
     
    <link rel="stylesheet" href="login.css?v=
    <?php
        echo time();
    ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <section id="left-section">
            
            <h2>Smart Door Lock</h2>
            <img src="14.-Technology.svg" alt="">
    </section>


    <section id="login-form">
    
       
            <h3> Welcome Back Admin!

                <p>Log in to Continue</p>
            </h3>
            
            <h2 class="welcome-back"> Welcome Back
                <p class="smart-door-lock"> Smart Door Lock</p>
            </h2>
            
            <?php include("check_admin.php"); ?>

            <form action=" <?= $_SERVER['PHP_SELF']; ?>" method ="post">

                
                <div class="input_icons">

                    <i class="fa fa-user icon"></i>
                    <input type="text" name="ad_name" id="ad_name" placeholder="Username"> <br><br>      
                </div>
                <h4 id="invalid-name"><?= $error_name ?></h4>
                <br>
                
                
                <div class="input_icons">
                    <i class="fa fa-lock icon"></i>
                    <input type="password" name="ad_password" id="ad_password" placeholder="Password">
                </div>
                <h4 id="invalid-pass"><?= $error_pass ?></h4>
                <br><br>

                <span id = "lines"> 
                    <span></span>
                    <span></span>
                </span>
                <br>
                <br>
                
                
                    <input type="submit" value="LOGIN">
                

                <h4 id="invalid-result"><?= $error_all ?> </h4>
                <h4 class="valid-result"></h4>

            </form>
    </section>
    
</body>
</html>